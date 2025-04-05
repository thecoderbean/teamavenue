<?php

namespace App\Controllers;

use App\Models\WorkRequestModel;
use CodeIgniter\Controller;

class WorkRequestController extends Controller
{
    protected $WorkRequestModel;

    public function __construct()
    {
        $this->WorkRequestModel = new WorkRequestModel();
    }

    public function index()
    {
        return view('index'); // Make sure your form is in 'index.php'
    }

    public function submit()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name'    => 'required|min_length[3]|max_length[100]',
            'email'   => 'required|valid_email',
            'phone'   => 'required|numeric|min_length[10]|max_length[15]',
            'services'=> 'permit_empty', // services optional
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Validation failed',
                'errors'  => $validation->getErrors()
            ])->setStatusCode(400);
        }

        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'phone'    => $this->request->getPost('phone'),
            'services' => json_encode($this->request->getPost('services') ?? []),
        ];

        if ($this->WorkRequestModel->insert($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Success, Our team will contact you soon!'
            ]);
        } else {
            $dbError = $this->WorkRequestModel->db->error();
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to submit request: ' . $dbError['message']
            ])->setStatusCode(500);
        }
    }
}
