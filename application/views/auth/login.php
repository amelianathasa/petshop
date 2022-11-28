<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tiedye Pet Gallery</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/template'); ?>/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('assets/template'); ?>/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?= base_url('assets/template'); ?>/images/logo.svg" alt="logo">
                            </div>
                            <h4>Welcome to Tiedye Pet Gallery</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" role="form" method="post" action="<?= base_url('auth'); ?>">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>" autocomplete="off">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password" autocomplete="off">
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" name="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Don't have an account? <a href="register.html" class="text-primary">Create</a>
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
    <script src="<?= base_url('assets/template'); ?>/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('assets/template'); ?>/js/off-canvas.js"></script>
    <script src="<?= base_url('assets/template'); ?>/js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets/template'); ?>/js/template.js"></script>
    <script src="<?= base_url('assets/template'); ?>/js/settings.js"></script>
    <script src="<?= base_url('assets/template'); ?>/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>