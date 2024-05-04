<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Dashboard')); ?>

    <!-- jsvectormap css -->
    <link href="/assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="/assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include('partials/head-css') ?>

</head>

<body>

    <?= $this->include('teacher/partials/navbar') ?>

    <div id="space" class="my-1 my-md-5" style="height: 1px;"></div>
    <div class="container">
        <div class="card p-5">
            <h1>Profile</h1>
            <nav class="navbar">
                <ul class="navbar-nav w-100">
                    <li class="nav-item fs-5">
                        <a href="<?= base_url('profile/general') ?>" class="nav-link d-flex justify-content-between p-4">
                            <span>General</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                        <hr class="m-0">
                    </li>
                    <li class="nav-item fs-5">
                        <a href="<?= base_url('profile/room') ?>" class="nav-link d-flex justify-content-between p-4">
                            <span>Change Room</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                        <hr class="m-0">
                    </li>
                    <li class="nav-item fs-5">
                        <a href="<?= base_url('profile/tel') ?>" class="nav-link d-flex justify-content-between p-4">
                            <span>Change Phone Number</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                        <hr class="m-0">
                    </li>
                    <li class="nav-item fs-5">
                        <a href="<?= base_url('profile/password') ?>" class="nav-link d-flex justify-content-between p-4">
                            <span>Change Password</span>
                            <i class="ri-arrow-right-line"></i>
                        </a>
                        <hr class="m-0">
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <?= $this->include('partials/vendor-scripts') ?>

    <!-- apexcharts -->
    <script src="/assets/libs/apexcharts/apexcharts.min.js"></script>

    <!--Swiper slider js-->
    <script src="/assets/libs/swiper/swiper-bundle.min.js"></script>

    <!--Swiper slider js-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Dashboard init -->
    <script src="/assets/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.js"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        jQuery(document).ready(function() {});
    </script>
</body>

</html>