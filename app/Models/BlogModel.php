<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'content', 'thumbnail', 'featured_video', 'created_at'];
    protected $useTimestamps = false;

    // Generate slug from title
    public function generateSlug($title)
    {
        return url_title($title, '-', true);
    }

    // Get all blogs
    public function getAllBlogs()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }

    // Get blog by slug
    public function getBlogBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }
}