<?php

namespace App\Controllers;

use App\Models\StaffModel;
use CodeIgniter\Controller;

class StaffManagementController extends Controller
{
    protected $staffModel;
    protected $session;
    protected $uploadPath = 'assets/img/'; // Same as services

    public function __construct()
    {
        $this->staffModel = new StaffModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $data['staff'] = $this->staffModel->getAllStaff();
        return view('admin/staff_management', $data);
    }

    public function showUploadForm()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        return view('admin/add_staff');
    }

    public function addStaff()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        if (!$this->request->is('post')) {
            return redirect()->back()->with('error', 'Invalid Request.');
        }

        // Validate
        if (!$this->validate([
            'name' => 'required|min_length[3]',
            'position' => 'required|min_length[3]',
            'image' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Validation failed. Please check inputs.');
        }

        // Get fields
        $name = $this->request->getPost('name');
        $position = $this->request->getPost('position');
        $file = $this->request->getFile('image');

        $image_path = null;
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move($this->uploadPath, $newName);
            $image_path = $this->uploadPath . $newName;
        }

        // Save to database
        $this->staffModel->save([
            'name' => $name,
            'position' => $position,
            'image_path' => $image_path,
        ]);

        return redirect()->to('/admin/staff-management')->with('success', 'Staff member added successfully!');
    }

    public function deleteStaff($id)
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $staff = $this->staffModel->find($id);

        if (!$staff) {
            return redirect()->to('/admin/staff-management')->with('error', 'Staff member not found.');
        }

        // Delete image file if exists
        if (!empty($staff['image_path'])) {
            $imageFullPath = FCPATH . $staff['image_path']; // FCPATH = public/

            if (file_exists($imageFullPath)) {
                unlink($imageFullPath);
            }
        }

        // Delete the record from DB
        $this->staffModel->delete($id);

        return redirect()->to('/admin/staff-management')->with('success', 'Staff member deleted successfully!');
    }
}   