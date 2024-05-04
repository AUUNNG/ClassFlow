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
        <h1>Subject</h1>
        <?php if (empty($datas)) { ?>
            <div class="rounded bg-light d-flex flex-column justify-content-center align-items-center" style="height: 200px;">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSubjectForm">Add Subject</button>
                <?php echo $datas['0']; ?>
            </div>
        <?php } else { ?>
            <div class="row p-3 g-3 mt-3 rounded bg-light">
                <?php foreach ($datas as $data) : ?>
                <div class="col-xxl-6 col-lg-6">
                    <div class="card card-body mb-0">
                        <div class="d-flex flex-row">
                            <div class="avatar-md mb-3">
                                <div class="avatar-title bg-primary-subtle text-primary fs-17 rounded">
                                    <i class="ri-book-2-line"></i>
                                </div>
                            </div>
                            <div class="ms-4">
                                <h1 class=""><?= esc($data->subject_name); ?></h1>
                                <span class=""><?= esc($data->subject_code); ?></span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addSubject()">Details</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php } ?>
    </div>



    <div class="modal fade" id="addSubjectForm" tabindex="-1" aria-labelledby="addSubjectFormLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="addSubjectFormLabel">Add Subject</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="addSubjectForm">
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject_code" name="subject_code" value="อ31101" placeholder="">
                                    <label for="subject_code">Subject Code</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject_name" name="subject_name" value="อุ้ง" placeholder="">
                                    <label for="subject_name">Subject Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="button" class="btn btn-primary" onclick="addSubject()">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">

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

        function addSubject() {
            var fd = new FormData(jQuery('form#addSubjectForm')[0]);
            var url = "<?= base_url('subject/test') ?>";
            // var url = "<?= base_url('subject/addSubject') ?>";
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
                            location.reload();
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