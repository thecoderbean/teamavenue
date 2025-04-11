<?php

namespace App\Models;

use CodeIgniter\Model;

class TestBlogModel extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'content', 'thumbnail', 'featured_video', 'created_at'];
    protected $returnType = 'array';
    protected $useTimestamps = false; // Disable timestamps for this test
}