<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    protected $AdminModel;
    protected $session;

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        // Check if already logged in
        if ($this->session->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('admin/login');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $this->AdminModel->where('username', $username)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            $this->session->set([
                'isLoggedIn' => true,
                'username' => $admin['username'],
                'adminId' => $admin['id']
            ]);
            return $this->response->setJSON(['success' => true, 'message' => 'Login successful', 'redirect' => '/admin/dashboard']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Invalid username or password'])->setStatusCode(401);
        }
    }

    public function dashboard()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }
        return view('admin/dashboard', ['username' => $this->session->get('username')]);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/admin');
    }
}