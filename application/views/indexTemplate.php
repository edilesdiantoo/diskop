<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DISKOP UMKM</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= base_url(); ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url(); ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= base_url(); ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/js/select.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>vendors/mdi/css/materialdesignicons.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/favicon.png" />

  <style type="text/css">
    .nav-tabs {
      border: 0;
    }

    .nav-item {
      border: 0;
    }

    .tab-content {
      border: 0;
    }

    .nav-tabs .nav-link {
      border-top: 0;
      border-right: 0;
      border-left: 0;
      border-bottom: 0;
      background-color: transparent;
    }

    .nav-tabs .nav-link.active {
      border-top: 0;
      border-right: 0;
      border-left: 0;
      border-bottom: 2px solid #4B49AC;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php $this->load->view('partials/Navbar'); ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php $this->load->view('Partials/Sidebar'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <?php $this->load->view($content); ?>


        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php $this->load->view('Partials/Footer'); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url(); ?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?= base_url(); ?>vendors/chart.js/Chart.min.js"></script>
  <script src="<?= base_url(); ?>vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="<?= base_url(); ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="<?= base_url(); ?>assets/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?= base_url(); ?>assets/js/off-canvas.js"></script>
  <script src="<?= base_url(); ?>assets/js/hoverable-collapse.js"></script>
  <script src="<?= base_url(); ?>assets/js/template.js"></script>
  <script src="<?= base_url(); ?>assets/js/settings.js"></script>
  <script src="<?= base_url(); ?>assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url(); ?>assets/js/dashboard.js"></script>
  <script src="<?= base_url(); ?>assets/js/Chart.roundedBarCharts.js"></script>
  <script src="<?= base_url(); ?>assets/js/data-table.js"></script>
  <!-- End custom js for this page-->
</body>

</html>