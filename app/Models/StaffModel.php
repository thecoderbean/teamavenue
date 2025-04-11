<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffModel extends Model
{
    protected $table = 'staff';
    protected $allowedFields = ['name', 'position', 'image_path'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    public function getAllStaff()
    {
        return $this->findAll();
    }

    public function deleteStaff($id)
    {
        return $this->delete($id);
    }
}