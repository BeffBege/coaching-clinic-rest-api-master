<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/iconfonts/mdi/css/materialdesignicons.css">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="../assets/css/demo_1/style.css">
    <!-- Layout style -->
    <link rel="shortcut icon" href="../asssets/images/favicon.ico" />
  </head>
  <body class="header-fixed">
<div class="container" style="margin-top:100px; border-radius:20px;">
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center" style="font-weight: bold;">REGISTER</h4>
                    <hr>
                    <?php if (session()->getFlashdata('success')) { ?>
                        <div class="alert alert-success text-center">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                    <?php } ?>

                    <?php if (session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger text-center">
                            <?php foreach (session()->getFlashdata('error') as $field => $error) : ?>
                                <p><?= $error ?></p>
                            <?php endforeach ?>
                        </div>
                    <?php } ?>

                    <?= form_open('register'); ?>
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Register</button>
                    </div>
                    <?= form_close(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
<footer class="footer">
          <div class="row">
            <div class="col-sm-6 text-center text-sm-right order-sm-1">
              <!-- <ul class="text-gray">
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">Privacy Policy</a></li>
              </ul> -->
            </div>
            <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
              <small class="text-muted d-block">Copyright © 2020 <a href="http://www.uxcandy.co" target="_blank">Krisdiansyah Aji</a>. All rights reserved</small>
              
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- page content ends -->
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="../assets/vendors/js/core.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="../assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendors/chartjs/Chart.min.js"></script>
    <script src="../assets/js/charts/chartjs.addon.js"></script>
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="../assets/js/template.js"></script>
    <script src="../assets/js/dashboard.js"></script>
    <!-- endbuild -->
  </body>
</html>
