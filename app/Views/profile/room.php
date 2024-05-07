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
                    <li class="breadcrumb-item active" aria-current="page">Change Room</li>
                </ol>
            </nav>
            <h1>Change Room</h1>
            <form method="post" class="mt-3" id="roomForm">
                <div class="row g-3">
                    <div class="col-sm-12">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="room" name="room" placeholder="" value="<?= session()->get('room'); ?>">
                            <label for="room">Room</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary" onclick="updateRoom()">Update</button>
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

    <!-- Dashboard init -->
    <script src="/assets/js/pages/dashboard-ecommerce.init.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.js"></script>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        jQuery(document).ready(function() {});

        function updateRoom() {
            var fd = new FormData(jQuery('form#roomForm')[0]);
            var url = "<?= base_url('profile/updateRoom') ?>";
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