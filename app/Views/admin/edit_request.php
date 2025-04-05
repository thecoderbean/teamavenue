<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Request - TeamAvenues.com</title>
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
                        <img src="<?= base_url('asset/assets/img/logo.png') ?>" />
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
                        <a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-desktop"></i>Dashboard <span class="badge">Included</span></a>
                    </li>
                    <li class="active-link">
                        <a href="<?= base_url('admin/users-management') ?>"><i class="fa fa-users"></i>Users Management <span class="badge">Included</span></a>
                    </li>
                    <li>
                        <a href="<?= base_url('admin/blog-management') ?>"><i class="fa fa-rss"></i>Blog Management <span class="badge">Included</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cogs"></i>Service Management</a>
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
                        <h2>EDIT WORK REQUEST</h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <form method="post" action="<?= base_url('admin/edit-request/' . $request['id']) ?>">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?= $request['name'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?= $request['email'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="<?= $request['phone'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Services</label>
                                <?php $services = json_decode($request['services'], true); ?>
                                <select name="services[]" class="form-control" multiple required>
                                    <option value="training" <?= in_array('training', $services) ? 'selected' : '' ?>>Training</option>
                                    <option value="stock_brokering" <?= in_array('stock_brokering', $services) ? 'selected' : '' ?>>Stock Brokering</option>
                                    <option value="tax_filing" <?= in_array('tax_filing', $services) ? 'selected' : '' ?>>Tax Filing</option>
                                    <option value="financial_planning" <?= in_array('financial_planning', $services) ? 'selected' : '' ?>>Financial Planning</option>
                                    <option value="dmat_account" <?= in_array('dmat_account', $services) ? 'selected' : '' ?>>Dmat Account</option>
                                    <option value="live_support" <?= in_array('live_support', $services) ? 'selected' : '' ?>>Live Market Support</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
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
    <script src="<?= base_url('asset/assets/js/jquery-1.10.2.js') ?>"></script>
    <script src="<?= base_url('asset/assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('asset/assets/js/custom.js') ?>"></script>
</body>
</html>