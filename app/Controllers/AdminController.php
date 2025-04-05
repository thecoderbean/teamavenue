<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\WorkRequestModel; // Ensure this matches the correct file
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Email\Email;

class AdminController extends Controller
{
    protected $AdminModel;
    protected $WorkRequestModel;
    protected $session;
    protected $email;

    public function __construct()
    {
        $this->AdminModel = new AdminModel();
        $this->WorkRequestModel = new WorkRequestModel(); // Use the resolved model
        $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();
    }

    // [Existing methods: index, login, dashboard, logout remain unchanged]

    public function usersManagement()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $searchTerm = $this->request->getGet('search');
        if ($searchTerm) {
            $data['workRequests'] = $this->WorkRequestModel->search($searchTerm);
        } else {
            $data['workRequests'] = $this->WorkRequestModel->findAll();
        }

        return view('admin/users_management', $data);
    }

    public function exportExcel()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $workRequests = $this->WorkRequestModel->exportData();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Name');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Phone');
        $sheet->setCellValue('E1', 'Services');
        $sheet->setCellValue('F1', 'Created At');

        $row = 2;
        foreach ($workRequests as $request) {
            $sheet->setCellValue('A' . $row, $request['id']);
            $sheet->setCellValue('B' . $row, $request['name']);
            $sheet->setCellValue('C' . $row, $request['email']);
            $sheet->setCellValue('D' . $row, $request['phone']);
            $sheet->setCellValue('E' . $row, implode(', ', json_decode($request['services'], true)));
            $sheet->setCellValue('F' . $row, $request['created_at']);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="work_requests.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    public function deleteRequest($id)
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $this->WorkRequestModel->delete($id);
        return redirect()->to('/admin/users-management')->with('message', 'Request deleted successfully');
    }

    public function editRequest($id)
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/admin');
        }

        $data['request'] = $this->WorkRequestModel->find($id);
        if ($this->request->getMethod() === 'post') {
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
                'services' => json_encode($this->request->getPost('services') ?? [])
            ];
            $this->WorkRequestModel->update($id, $data);
            return redirect()->to('/admin/users-management')->with('message', 'Request updated successfully');
        }
        return view('admin/edit_request', $data);
    }

    public function sendEmail($id)
    {
        $request = $this->WorkRequestModel->find($id);
        $this->email->setTo($request['email']);
        $this->email->setSubject('Work Request Update');
        $this->email->setMessage("Hello " . $request['name'] . ",\n\nYour work request has been reviewed. Contact us at +919496646800 for further details.\n\nBest,\nTeam Avenue");
        if ($this->email->send()) {
            return $this->response->setJSON(['success' => true, 'message' => 'Email sent successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to send email']);
        }
    }
}