<?php

namespace App\Models;

use CodeIgniter\Model;

class TestModel extends Model
{
    protected $table = 'test_table';
    protected $allowedFields = ['name', 'email', 'phone'];
    protected $returnType = 'array';
    protected $useTimestamps = false; // Set to true if you want to use created_at/updated_at
}