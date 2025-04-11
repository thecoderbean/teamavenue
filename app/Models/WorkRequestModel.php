<?php

namespace App\Models;

use CodeIgniter\Model;

class WorkRequestModel extends Model
{
    protected $table = 'work_requests';
    protected $allowedFields = ['name', 'email', 'phone', 'services'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    public function getAllWorkRequests()
    {
        return $this->findAll();
    }
}