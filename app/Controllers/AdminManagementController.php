<?php

namespace App\Controllers;
use App\Models\AdminModel;
use CodeIgniter\Controller;

class AdminManagementController extends Controller
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        helper(['form', 'url']);
    }

    // Show list of all admins
    public function index()
    {
        $data['admins'] = $this->adminModel->findAll();
        return view('admin/index', $data);
    }

    // Show form to create a new admin
    public function create()
    {
        return view('admin/create');
    }

    // Handle storing new admin data
    public function store()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'username' => 'required|min_length[3]',
            'password' => 'required|min_length[5]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->adminModel->save([
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('admin/admin-management')->with('success', 'Admin Added Successfully!');
    }

    // Delete an admin by ID
    public function delete($id)
    {
        $this->adminModel->delete($id);
        return redirect()->to('admin/admin-management')->with('success', 'Admin Deleted Successfully!');
    }
}
