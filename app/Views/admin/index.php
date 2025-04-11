<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TeamAvenues.com</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?= base_url('asset/assets/css/bootstrap.css') ?>" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?= base_url('asset/assets/css/font-awesome.css') ?>" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?= base_url('asset/assets/css/custom.css') ?>" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
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
                        <a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-desktop"></i>Dashboard </a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/work-requests') ?>"><i class="fa fa-users"></i>Work Requests <span class="badge">Included</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/blog-management') ?>"><i class="fa fa-rss"></i>Blog Management <span class="badge">Included</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/service-management') ?>"><i class="fa fa-cogs"></i>Service Management</a>
                    </li>
                    <li class="active-link">
                        <a href="<?= base_url('admin/staff-management') ?>"><i class="fa fa-user"></i>Staff Management</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-lock"></i>Admin Management</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit"></i>My Link Five</a><span class="badge">Upcomming</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Admin Management</h2>
                        <a href="<?= base_url('admin/admin-management/create') ?>" class="btn btn-primary" style="margin-bottom:20px;">Add New Admin</a>
                        <?php if(session()->getFlashdata('success')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Username</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($admins)): ?>
                                        <?php foreach($admins as $admin): ?>
                                            <tr>
                                                <td><?= esc($admin['id']) ?></td>
                                                <td><?= esc($admin['username']) ?></td>
                                                <td>
                                                    <a href="<?= base_url('admin-management/delete/'.$admin['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this admin?')">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="3" class="text-center">No Admins Found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
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
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?= base_url('asset/assets/js/jquery-1.10.2.js') ?>"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?= base_url('asset/assets/js/bootstrap.min.js') ?>"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="<?= base_url('asset/assets/js/custom.js') ?>"></script>
</body>
</html>