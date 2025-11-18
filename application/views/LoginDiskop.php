<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DISKOP UMKN PROV JAMBI</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url(); ?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/<?= base_url(); ?>assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-center py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?= base_url(); ?>assets/images/diskop/logo_koperasi.png" alt="logo">
                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" enctype="multipart/form-data" method="post" action="<?= base_url('LoginDiskopController/cek') ?>">
                                <span>
                                    <?php if ($this->session->flashdata('message')) {
                                        echo $this->session->flashdata('message');
                                    } ?>
                                </span>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="nip" placeholder="NIP" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password" autocomplete="off">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url(); ?>vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url(); ?>assets/js/off-canvas.js"></script>
    <script src="<?= base_url(); ?>assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url(); ?>assets/js/template.js"></script>
    <script src="<?= base_url(); ?>assets/js/settings.js"></script>
    <script src="<?= base_url(); ?>assets/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>