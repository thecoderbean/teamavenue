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
                        <a href="dashboard" ><i class="fa fa-desktop "></i>Dashboard </a>
                    </li>
                   

                    <li>
                        <a href="work-requests"><i class="fa fa-users "></i>Users Management  </a>
                    </li>
                    <li>
                        <a href="blog-management"><i class="fa fa-rss "></i>Blog Management  </a>
                    </li>


                    <li class="active-link">
                        <a href="service-management"><i class="fa fa-cogs "></i>Service Management</a>
                    </li>
                    <li>
                        <a href="staff-management"><i class="fa fa-user"></i>Staff Management</a>
                    </li>

                    <li>
                        <a href="admin-management"><i class="fa fa-lock "></i>Admin Management </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit "></i>My Link Five </a><span class="badge">deactivated</span>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>SERVICE MANAGEMENT</h2>
                        <a href="<?= base_url('admin/service-management/add') ?>" class="btn btn-primary">Add New Service</a>
                        <?php if (session()->getFlashdata('message')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Alt Text</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($services as $service): ?>
                                    <tr>
                                        <td><?= $service['id'] ?></td>
                                        <td><?= $service['title'] ?></td>
                                        <td><?= $service['alt_text'] ?></td>
                                        <td>
                                            <?php if ($service['image_path']): ?>
                                                <img src="<?= base_url($service['image_path']) ?>" alt="<?= $service['alt_text'] ?>" style="max-width: 100px;">
                                            <?php else: ?>
                                                No Image
                                            <?php endif; ?>
                                        </td>
                                        <td><?= $service['description'] ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/service-management/delete/' . $service['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
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