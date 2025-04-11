<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\TestBlogModel;

class TestBlogController extends Controller
{
    public function index()
    {
        $model = new TestBlogModel();
        
        $data['posts'] = $model->findAll();
        
        return view('test_blog', $data);
    }
}