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
    <div class="container card p-5">
        <h1>Profile</h1>
        <form method="post" class="mt-3">
            <div class="row g-3">
                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="">
                        <label for="firstname">First Name</label>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="">
                        <label for="lastname">Last Name</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="username" name="username" placeholder="">
                        <label for="username">Username</label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating">
                        <input type="tel" class="form-control" id="tel" name="tel" placeholder="">
                        <label for="tel">Telophone</label>
                        <div class="form-text">ไม่จำเป็น</div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-floating">
                        <input type="room" class="form-control" id="room" name="room" placeholder="">
                        <label for="room">Room</label>
                        <div class="form-text">ห้องประจำชั้น</div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="d-grid">
                        <button type="button" class="btn btn-primary" onclick="">Submit</button>
                    </div>
                </div>
            </div>
        </form>
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
</body>

</html>