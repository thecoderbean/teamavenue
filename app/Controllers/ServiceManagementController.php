<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use CodeIgniter\Controller;

class ServiceManagementController extends Controller
{
    protected $ServiceModel;
    protected $session;
    protected $uploadPath = 'assets/img/'; // Relative to public/

    public function __construct()
    {
        $this->ServiceModel = new ServiceModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $data['services'] = $this->ServiceModel->getAllServices();
        return view('admin/service_management', $data);
    }

    public function showUploadForm()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        return view('admin/add_service');
    }

    public function addService()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        if (!$this->request->is('post')) {
            return redirect()->back()->with('error', 'Invalid Request.');
        }

        // Validate
        if (!$this->validate([
            'title' => 'required|min_length[3]',
            'description' => 'required|min_length[5]',
            'alt_text' => 'required|min_length[3]',
            'image' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Validation failed. Please check inputs.');
        }

        // Get fields
        $title = $this->request->getPost('title');
        $alt_text = $this->request->getPost('alt_text');
        $description = $this->request->getPost('description');
        $file = $this->request->getFile('image');

        $image_path = null;
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move($this->uploadPath, $newName); // <<<<<< CORRECT MOVE
            $image_path = $this->uploadPath . $newName;
        }

        // Save to database
        $this->ServiceModel->save([
            'title' => $title,
            'alt_text' => $alt_text,
            'description' => $description,
            'image_path' => $image_path,
        ]);

        return redirect()->to('/admin/service-management')->with('success', 'Service added successfully!');
    }
    public function deleteService($id)
    {
    if (!$this->session->get('isLoggedIn')) {
        return redirect()->to('/admin');
    }

    $service = $this->ServiceModel->find($id);

    if (!$service) {
        return redirect()->to('/admin/service-management')->with('error', 'Service not found.');
    }

    // Delete image file if exists
    if (!empty($service['image_path'])) {
        $imageFullPath = FCPATH . $service['image_path']; // FCPATH = public/

        if (file_exists($imageFullPath)) {
            unlink($imageFullPath);
        }
    }

    // Delete the record from DB
    $this->ServiceModel->delete($id);

    return redirect()->to('/admin/service-management')->with('success', 'Service deleted successfully!');
    }

}
