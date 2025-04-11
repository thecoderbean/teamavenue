<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TeamAvenues.com - Blog Management</title>
    <link href="<?= base_url('asset/assets/css/bootstrap.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('asset/assets/css/font-awesome.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('asset/assets/css/custom.css') ?>" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="<?= base_url('assets/img/logo.png') ?>" />
                    </a>
                </div>
                <span class="logout-spn">
                    <a href="<?= base_url('admin/logout') ?>" style="color:#fff;">LOGOUT</a>
                </span>
            </div>
        </div>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-desktop"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/work-requests') ?>"><i class="fa fa-users"></i>Work Requests <span class="badge">Included</span></a>
                    </li>
                    <li class="active-link">
                        <a href="<?= base_url('admin/blog-management') ?>"><i class="fa fa-rss"></i>Blog Management <span class="badge">Included</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/service-management') ?>"><i class="fa fa-cogs"></i>Service Management</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user"></i>Staff Management</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-lock"></i>Admin Management</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i>My Link Five</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>BLOG MANAGEMENT</h2>
                        <a href="<?= base_url('admin/blog-management/create') ?>" class="btn btn-primary mb-3">Create New Blog</a>
                    </div>
                </div>
                <hr />
                <?php if (session()->has('message')): ?>
                    <div class="alert alert-success"><?= session('message') ?></div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($blogs as $blog): ?>
                                    <tr>
                                        <td><?= esc($blog['id']) ?></td>
                                        <td><?= esc($blog['title']) ?></td>
                                        <td><?= esc($blog['slug']) ?></td>
                                        <td><?= esc($blog['created_at']) ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/blog-management/edit/' . $blog['id']) ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="<?= base_url('admin/blog-management/delete/' . $blog['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="row">
            <div class="col-lg-12">
                © 2014 yourdomain.com | Design by: <a href="http://binarytheme.com" style="color:#fff;" target="_blank">www.binarytheme.com</a>
            </div>
        </div>
    </div>
    <script src="<?= base_url('asset/assets/js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('asset/assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('asset/assets/js/custom.js') ?>"></script>
</body>
</html>