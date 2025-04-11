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
                    <li>
                        <a href="<?= base_url('admin/staff-management') ?>"><i class="fa fa-user"></i>Staff Management</a>
                    </li>
                    <li class="active-link">
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
                    <div class="col-md-6 offset-md-3">
                        <h2>Add New Admin</h2>
                        <?php if(session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                                    <p><?= esc($error) ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="<?= base_url('admin-management/store') ?>">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required value="<?= old('username') ?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success">Add Admin</button>
                            <a href="<?= base_url('admin-management') ?>" class="btn btn-secondary">Back</a>
                        </form>
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