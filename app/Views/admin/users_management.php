<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Users Management - TeamAvenues.com</title>
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
                        <h2>USERS MANAGEMENT</h2>
                    </div>
                </div>
                <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchInput" placeholder="Search by name, email, or phone" value="<?= $this->request->getGet('search') ?>">
                            <span class="input-group-btn">
                                <button class="btn btn-default" id="searchBtn">Search</button>
                            </span>
                        </div>
                        <br />
                        <a href="<?= base_url('admin/export-excel') ?>" class="btn btn-success">Export to Excel</a>
                        <?php if (session()->getFlashdata('message')): ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
                        <?php endif; ?>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Services</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($workRequests as $request): ?>
                                    <tr>
                                        <td><?= $request['id'] ?></td>
                                        <td><?= $request['name'] ?></td>
                                        <td><?= $request['email'] ?></td>
                                        <td><?= $request['phone'] ?></td>
                                        <td><?= implode(', ', json_decode($request['services'], true)) ?></td>
                                        <td><?= $request['created_at'] ?></td>
                                        <td>
                                            <a href="mailto:<?= $request['email'] ?>" class="btn btn-info btn-sm">Email</a>
                                            <a href="tel:<?= $request['phone'] ?>" class="btn btn-warning btn-sm">Call</a>
                                            <a href="<?= base_url('admin/edit-request/' . $request['id']) ?>" class="btn btn-primary btn-sm">Edit</a>
                                            <a href="<?= base_url('admin/delete-request/' . $request['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                            <button class="btn btn-success btn-sm" onclick="sendEmail(<?= $request['id'] ?>)">Send Custom Email</button>
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
    <script>
        document.getElementById('searchBtn').addEventListener('click', function() {
            const searchTerm = document.getElementById('searchInput').value;
            window.location.href = '<?= base_url('admin/users-management') ?>?search=' + encodeURIComponent(searchTerm);
        });

        function sendEmail(id) {
            fetch('<?= base_url('admin/send-email/') ?>' + id, {
                method: 'POST'
            })
            .then(response => response.json())
            .then(data => alert(data.message))
            .catch(error => alert('Error: ' + error.message));
        }
    </script>
</body>
</html>