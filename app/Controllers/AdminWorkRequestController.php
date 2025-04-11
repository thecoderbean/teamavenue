<?php

namespace App\Controllers;

use App\Models\WorkRequestModel;
use CodeIgniter\Controller;

class AdminWorkRequestController extends Controller
{
    protected $WorkRequestModel;
    protected $session;

    public function __construct()
    {
        $this->WorkRequestModel = new WorkRequestModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        // Check if the user is logged in (using the existing admin session)
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $data['workRequests'] = $this->WorkRequestModel->getAllWorkRequests();
        return view('admin/users_management', $data);
    }
}