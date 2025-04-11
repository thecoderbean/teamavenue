<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ServiceModel;
use App\Models\StaffModel;
use App\Models\WorkRequestModel;

class WorkRequestController extends Controller
{
    protected $serviceModel;
    protected $staffModel;
    protected $workRequestModel;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        $this->staffModel = new StaffModel();
        $this->workRequestModel = new WorkRequestModel();
    }

    public function index()
    {
        $data['services'] = $this->serviceModel->getAllServices();
        $data['staff'] = $this->staffModel->getAllStaff();
        return view('index', $data);
    }

    public function submit()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'name'    => 'required|min_length[3]|max_length[100]',
            'email'   => 'required|valid_email',
            'phone'   => 'required|numeric|min_length[10]|max_length[15]',
            'services' => 'permit_empty', // services optional
        ];

        if (!$this->validate($rules)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validation->getErrors()
                ])->setStatusCode(400);
            }
            return redirect()->back()->withInput()->with('error', 'Please correct the errors: ' . implode(', ', $validation->getErrors()));
        }

        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'phone'    => $this->request->getPost('phone'),
            'services' => json_encode($this->request->getPost('services') ?? []),
        ];

        if ($this->workRequestModel->insert($data)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Success, Our team will contact you soon!'
                ]);
            }
            return redirect()->to('/')->with('message', 'Work request submitted successfully!');
        } else {
            $dbError = $this->workRequestModel->db->error();
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to submit request: ' . $dbError['message']
                ])->setStatusCode(500);
            }
            return redirect()->back()->with('error', 'Failed to submit request: ' . $dbError['message']);
        }
    }
}