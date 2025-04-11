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
                   

                    <li class="active-link">
                        <a href="work-requests"><i class="fa fa-users "></i>Users Management  </a>
                    </li>
                    <li>
                        <a href="blog-management"><i class="fa fa-rss "></i>Blog Management  </a>
                    </li>


                    <li>
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
                    <h2>WORK REQUESTS MANAGEMENT</h2>
                </div>
            </div>
            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <!-- Search Input and Export Button -->
                    <div style="margin-bottom: 20px;">
                        <input type="text" id="searchInput" class="form-control" placeholder="Search by Name, Email, or Phone" style="width: 300px; display: inline-block; margin-right: 10px;">
                        <button id="exportBtn" class="btn btn-primary">Export to Excel</button>
                    </div>
                    <!-- Table -->
                    <table class="table table-striped" id="workRequestsTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Services</th>
                                <th>Created At</th>
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
   <!-- XLSX Library for Excel Export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<!-- Custom JavaScript for Search and Export -->
<script>
    // Search Functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('#workRequestsTable tbody tr');

        rows.forEach(row => {
            const name = row.cells[1].textContent.toLowerCase();
            const email = row.cells[2].textContent.toLowerCase();
            const phone = row.cells[3].textContent.toLowerCase();

            if (name.includes(searchTerm) || email.includes(searchTerm) || phone.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Export to Excel Functionality
    document.getElementById('exportBtn').addEventListener('click', function() {
        const table = document.getElementById('workRequestsTable');
        const wb = XLSX.utils.table_to_book(table, { sheet: "Work Requests" });
        XLSX.writeFile(wb, 'Work_Requests.xlsx');
    });
</script> 
   
</body>
</html>