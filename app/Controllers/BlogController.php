<?php

namespace App\Controllers;

use App\Models\BlogModel;

class BlogController extends BaseController
{
    protected $blogModel;

    public function __construct()
    {
        $this->blogModel = new BlogModel();
    }

    // List all blogs
    public function index()
    {
        $data = [
            'blogs' => $this->blogModel->getAllBlogs(),
            'title' => 'Blog'
        ];
        return view('blog/index', $data);
    }

    // Show single blog
    public function show($slug)
    {
        $blog = $this->blogModel->getBlogBySlug($slug);
        if (!$blog) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        $data = [
            'blog' => $blog,
            'title' => $blog['title']
        ];
        return view('blog/show', $data);
    }
}