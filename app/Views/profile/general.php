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
                    <li class="breadcrumb-item active" aria-current="page">General</li>
                </ol>
            </nav>
            <h1>General</h1>
            <form method="post" class="mt-3" id="profileForm">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="" value="<?= esc($datas['0']->firstname) ?>">
                            <label for="firstname">First Name</label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="" value="<?= esc($datas['0']->lastname) ?>">
                            <label for="lastname">Last Name</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?= esc($datas['0']->username) ?>">
                            <label for="username">Username</label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary" onclick="updateGeneral()">Update</button>
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
        jQuery(document).ready(function() {
        });

        jQuery(function() {
            jQuery('input#username').keyup(function() {
                this.value = this.value.toLocaleUpperCase();
            });
            jQuery('input#firstname, input#lastname').keyup(function(event) {
                var textBox = event.target;
                var start = textBox.selectionStart;
                var end = textBox.selectionEnd;
                textBox.value = textBox.value.charAt(0).toUpperCase() + textBox.value.slice(1);
                textBox.setSelectionRange(start, end);
            });
        });

        function updateGeneral() {
            var fd = new FormData(jQuery('form#profileForm')[0]);
            var url = "<?= base_url('profile/updateGeneral') ?>";
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