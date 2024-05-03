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
        <div class="rounded bg-light d-flex flex-column justify-content-center align-items-center" style="height: 200px;">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSubjectForm">Add Subject</button>
        </div>
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
            <div class="card-header">
                <h4 class="card-title mb-0">Add, Edit &amp; Remove</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                                <button class="btn btn-soft-danger" onclick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th class="sort desc" data-sort="customer_name">Customer</th>
                                    <th class="sort" data-sort="email">Email</th>
                                    <th class="sort" data-sort="phone">Phone</th>
                                    <th class="sort" data-sort="date">Joining Date</th>
                                    <th class="sort" data-sort="status">Delivery Status</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ10</a></td>
                                    <td class="customer_name">Timothy Smith</td>
                                    <td class="email">timothysmith@velzon.com</td>
                                    <td class="phone">973-277-6950</td>
                                    <td class="date">13 Dec, 2021</td>
                                    <td class="status"><span class="badge bg-success-subtle text-success text-uppercase">Active</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ3</a></td>
                                    <td class="customer_name">Robert McMahon</td>
                                    <td class="email">robertmcmahon@velzon.com</td>
                                    <td class="phone">786-253-9927</td>
                                    <td class="date">12 Jan, 2021</td>
                                    <td class="status"><span class="badge bg-success-subtle text-success text-uppercase">Active</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ4</a></td>
                                    <td class="customer_name">Michael Morris</td>
                                    <td class="email">michaelmorris@velzon.com</td>
                                    <td class="phone">805-447-8398</td>
                                    <td class="date">19 May, 2021</td>
                                    <td class="status"><span class="badge bg-danger-subtle text-danger text-uppercase">Block</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ1</a></td>
                                    <td class="customer_name">Mary Cousar</td>
                                    <td class="email">marycousar@velzon.com</td>
                                    <td class="phone">580-464-4694</td>
                                    <td class="date">06 Apr, 2021</td>
                                    <td class="status"><span class="badge bg-success-subtle text-success text-uppercase">Active</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ5</a></td>
                                    <td class="customer_name">Kevin Dawson</td>
                                    <td class="email">kevindawson@velzon.com</td>
                                    <td class="phone">213-741-4294</td>
                                    <td class="date">14 Mar, 2021</td>
                                    <td class="status"><span class="badge bg-success-subtle text-success text-uppercase">Active</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ2</a></td>
                                    <td class="customer_name">Jeff Taylor</td>
                                    <td class="email">jefftaylor@velzon.com</td>
                                    <td class="phone">863-577-5537</td>
                                    <td class="date">15 Feb, 2021</td>
                                    <td class="status"><span class="badge bg-success-subtle text-success text-uppercase">Active</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ9</a></td>
                                    <td class="customer_name">Herbert Stokes</td>
                                    <td class="email">herbertstokes@velzon.com</td>
                                    <td class="phone">312-944-1448</td>
                                    <td class="date">20 Jul, 2021</td>
                                    <td class="status"><span class="badge bg-danger-subtle text-danger text-uppercase">Block</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);" class="fw-medium link-primary">#VZ7</a></td>
                                    <td class="customer_name">Glen Matney</td>
                                    <td class="email">glenmatney@velzon.com</td>
                                    <td class="phone">02 Nov, 2021</td>
                                    <td class="date">515-395-1069</td>
                                    <td class="status"><span class="badge bg-success-subtle text-success text-uppercase">Active</span></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="noresult" style="display: none;">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any orders for you search.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2" style="display: flex;">
                            <a class="page-item pagination-prev disabled" href="javascript:void(0);">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0">
                                <li class="active"><a class="page" href="#" data-i="1" data-page="8">1</a></li>
                                <li><a class="page" href="#" data-i="2" data-page="8">2</a></li>
                            </ul>
                            <a class="page-item pagination-next" href="javascript:void(0);">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- end card -->
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
            var url = "<?= base_url('subject/addSubject') ?>";
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