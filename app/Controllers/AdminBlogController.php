<?php

namespace App\Controllers;

use App\Models\BlogModel;
use CodeIgniter\Controller;

class AdminBlogController extends Controller
{
    protected $blogModel;
    protected $session;
    protected $uploadPath = 'uploads/blogs/'; // Relative to public/

    public function __construct()
    {
        $this->blogModel = new BlogModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $data = [
            'blogs' => $this->blogModel->getAllBlogs()
        ];
        return view('admin/blog_list', $data);
    }

    public function create()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        return view('admin/create_blog');
    }

    public function store()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required|min_length[3]',
            'content' => 'required',
            'thumbnail' => 'uploaded[thumbnail]|is_image[thumbnail]|max_size[thumbnail,2048]',
            'featured_video' => 'permit_empty|valid_url'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('thumbnail');
        $thumbnailName = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $thumbnailName = $file->getRandomName();
            $file->move(FCPATH . $this->uploadPath, $thumbnailName);
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => $this->blogModel->generateSlug($this->request->getPost('title')),
            'content' => $this->request->getPost('content'),
            'thumbnail' => $thumbnailName,
            'featured_video' => $this->request->getPost('featured_video'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->blogModel->save($data);
        return redirect()->to('admin/blog-management')->with('message', 'Blog created successfully.');
    }

    public function edit($id)
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $blog = $this->blogModel->find($id);
        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('admin/edit', ['blog' => $blog]);
    }

    public function update($id)
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $validation = \Config\Services::validation();
        $validation->setRules([
            'title' => 'required|min_length[3]',
            'content' => 'required',
            'thumbnail' => 'permit_empty|is_image[thumbnail]|max_size[thumbnail,2048]',
            'featured_video' => 'permit_empty|valid_url'
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $blog = $this->blogModel->find($id);
        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $file = $this->request->getFile('thumbnail');
        $thumbnailName = $blog['thumbnail'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $thumbnailName = $file->getRandomName();
            $file->move(FCPATH . $this->uploadPath, $thumbnailName);

            if ($blog['thumbnail'] && file_exists(FCPATH . $this->uploadPath . $blog['thumbnail'])) {
                unlink(FCPATH . $this->uploadPath . $blog['thumbnail']);
            }
        }

        $data = [
            'id' => $id,
            'title' => $this->request->getPost('title'),
            'slug' => $this->blogModel->generateSlug($this->request->getPost('title')),
            'content' => $this->request->getPost('content'),
            'thumbnail' => $thumbnailName,
            'featured_video' => $this->request->getPost('featured_video')
        ];

        $this->blogModel->save($data);
        return redirect()->to('admin/blog-management')->with('message', 'Blog updated successfully.');
    }

    public function delete($id)
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $blog = $this->blogModel->find($id);
        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if ($blog['thumbnail'] && file_exists(FCPATH . $this->uploadPath . $blog['thumbnail'])) {
            unlink(FCPATH . $this->uploadPath . $blog['thumbnail']);
        }

        $this->blogModel->delete($id);
        return redirect()->to('admin/blog-management')->with('message', 'Blog deleted successfully.');
    }
}
