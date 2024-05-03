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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('rolecheck') ?>">
                            <i class="ri-home-5-fill"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?= base_url('profile') ?>">Profile</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Change Phone Number</li>
                </ol>
            </nav>
            <h1>Change Phone Number</h1>
            <form method="post" class="mt-3" id="telForm">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <div class="form-floating">
                            <input type="tel" class="form-control" id="currentTel" name="currentTel" placeholder="">
                            <label for="currentTel">Current Phone Number</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-floating">
                            <input type="tel" class="form-control" id="tel" name="tel" placeholder="" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                            <label for="tel">New Phone Number</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary" onclick="updateTel()">Update</button>
                        </div>
                    </div>
                </div>
            </form>
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

        function updateTel() {
            var fd = new FormData(jQuery('form#telForm')[0]);
            var url = "<?= base_url('profile/updateTel') ?>";
            $.ajax({
                url: url,
                method: "POST",
                data: fd,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        Swal.fire({
                            title: "ดำเนินการสำเร็จ!",
                            text: "บันทึกข้อมูลเรียบร้อยแล้ว",
                            icon: "success",
                            timer: 500,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        }).then(() => {
                            // window.location.href = "<?= base_url('/login') ?>";
                        });
                    } else {
                        Swal.fire("เกิดข้อผิดพลาด", response.message, "error");
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown);
                }
            });
        }
    </script>
</body>

</html>