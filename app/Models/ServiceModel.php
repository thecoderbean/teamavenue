<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = 'services';
    protected $allowedFields = ['title', 'alt_text', 'image_path', 'description'];
    protected $returnType = 'array';
    protected $useTimestamps = true;

    public function getAllServices()
    {
        return $this->findAll();
    }

    public function deleteService($id)
    {
        return $this->delete($id);
    }
}