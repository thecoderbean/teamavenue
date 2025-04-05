<?php

namespace App\Controllers;

use App\Models\TestModel;
use CodeIgniter\Controller;

class TestController extends Controller
{
    protected $TestModel;

    public function __construct()
    {
        $this->TestModel = new TestModel(); // Initialize the model
    }

    public function index()
    {
        return view('test_form'); // Load the form view
    }

    public function submit()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
        ];

        // Log the data being received
        log_message('debug', 'Received Data: ' . json_encode($data));

        // Validate data (basic check)
        if (empty($data['name']) || empty($data['email']) || empty($data['phone'])) {
            return $this->response->setJSON(['success' => false, 'message' => 'All fields are required'])->setStatusCode(400);
        }

        // Attempt to insert
        if ($this->TestModel->insert($data)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Data inserted successfully']);
        } else {
            $dbError = $this->TestModel->db->error();
            log_message('error', 'Database Error: ' . json_encode($dbError));
            return $this->response->setJSON(['success' => false, 'message' => 'Insert failed: ' . $dbError['message']]);
        }
    }
}