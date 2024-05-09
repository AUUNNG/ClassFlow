<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Dashboard')); ?>

    <?= $this->include('partials/head-css') ?>

</head>

<body>

    <?= $this->include('teacher/partials/navbar') ?>
    <div class="d-none">
        <?= $this->include('partials/menu') ?>
    </div>

    <div id="space" class="my-1 my-md-5" style="height: 1px;"></div>
    <div class="container card p-5">
        <button type="button" class="btn btn-primary" onclick="test()">test</button>
        <h1>Subject</h1>
        <?php if (empty($subjects)) { ?>
            <div class="rounded bg-light d-flex flex-column justify-content-center align-items-center" style="height: 200px;">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSubjectForm">Add Subject</button>
                <?php echo $subjects['0']; ?>
            </div>
        <?php } else { ?>
            <div class="table-responsive table-card mt-3 mb-1">
                <table class="table align-middle table-nowrap" id="customerTable">
                    <thead class="table-light">
                        <tr>
                            <th class="sort" data-sort="customer_name">Subject Code</th>
                            <th class="sort" data-sort="email">Subject Name</th>
                            <th class="sort" data-sort="phone">Update By</th>
                            <th class="sort" data-sort="action">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list form-check-all">
                        <?php foreach ($subjects as $subject) : ?>
                        <tr>
                            <td id="subject_code"><?= $subject->subject_code ?></td>
                            <td id="subject_name"><?= $subject->subject_name ?></td>
                            <td id="user_update"><?= $subject->firstname . " " . $subject->lastname ?></td>
                            <td>
                                <div class="row row-cols-2 g-1">
                                    <div class="col d-grid">
                                        <button class="btn btn-sm btn-primary edit-item-btn" data-bs-toggle="modal" data-bs-target="#showModal">Update</button>
                                    </div>
                                    <div class="col d-grid">
                                        <a class="btn btn-sm btn-secondary remove-item-btn" href="<?= base_url('subject/access/'); ?><?= $subject->subject_id ?>">Access</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="noresult" style="display: none">
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
        <?php } ?>
    </div>

    <div class="modal fade" id="updateSubjectAccessForm" tabindex="-1" aria-labelledby="updateSubjectAccessFormLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="updateSubjectAccessFormLabel">Update Access</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="updateSubjectAccessForm">
                        <input type="text" class="form-control" id="subject_id" name="subject_id" value="" hidden>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="form">
                                    <div class="form-text">Updated By</div>
                                    <input type="text" class="form-control form-control-lg" id="user_update" name="user_update" value="" placeholder="" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form">
                                    <div class="form-text">Last Updated Time</div>
                                    <input type="text" class="form-control form-control-lg" id="update_date" name="update_date" value="" placeholder="" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="button" class="btn btn-primary" onclick="updateSubjectAccess()">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateSubjectForm" tabindex="-1" aria-labelledby="updateSubjectFormLabel" aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="updateSubjectFormLabel">Update Subject</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="updateSubjectForm">
                        <input type="text" class="form-control" id="subject_id" name="subject_id" value="" hidden>
                        <div class="row g-3">
                            <div class="col-6">
                                <div class="form">
                                    <div class="form-text">Updated By</div>
                                    <input type="text" class="form-control form-control-lg" id="user_update" name="user_update" value="" placeholder="" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form">
                                    <div class="form-text">Last Updated Time</div>
                                    <input type="text" class="form-control form-control-lg" id="update_date" name="update_date" value="" placeholder="" disabled>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg" id="subject_code" name="subject_code" value="" placeholder="">
                                    <label for="subject_code">Subject Code</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-lg" id="subject_name" name="subject_name" value="" placeholder="">
                                    <label for="subject_name">Subject Name</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="button" class="btn btn-primary" onclick="updateSubject()">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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

    <?= $this->include('partials/vendor-scripts') ?>

    <!-- prismjs plugin -->
    <script src="/assets/libs/prismjs/prism.js"></script>

    <!-- App js -->
    <script src="/assets/js/app.js"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
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

        function test() {
            var url = "<?= base_url('subject/test') ?>";
            $.ajax({
                url: url,
                method: "POST",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown);
                }
            });
        }

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

        function updateSubjectAccessForm(id) {
            var url = "<?= base_url('subject/updateSubjectAccessForm') ?>";
            $.ajax({
                url: url,
                method: "POST",
                data: {
                    'id': id
                },
                dataType: "json",
                success: function(response) {
                    // console.log(response);

                    $('#user_id option').each(function() {
                        var optionValue = $(this).val(); // ดึงค่า value ของ option
                        // ตรวจสอบว่ามีค่า optionValue ที่ตรงกับ response.data.subjects_access.user_id หรือไม่
                        var isSelected = response.data.subjects_access.some(function(item) {
                            return item.user_id === optionValue;
                        });
                        // ถ้ามีค่าตรงกัน ให้เพิ่ม attribute selected ให้กับ option
                        if (isSelected) {
                            $(this).attr('selected', 'selected');
                        }
                    });

                    if (response.status) {
                        var form = jQuery('form#updateSubjectAccessForm')
                        form.find('input#subject_id').val(response.data.subjects_access['0'].subject_id);
                        form.find('input#user_update').val(response.data.subjects_access['0'].firstname + " " + response.data.subjects_access['0'].lastname);
                        form.find('input#update_date').val(response.data.subjects_access['0'].update_date);
                    } else {
                        console.error("Error retrieving user data:", response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown);
                    // Handle general AJAX errors
                }
            });
        }

        function updateSubjectForm(id) {
            var url = "<?= base_url('subject/updateSubjectForm') ?>";
            $.ajax({
                url: url,
                method: "POST",
                data: {
                    'id': id
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        var form = jQuery('form#updateSubjectForm');

                        // เติมชื่อครูที่เป็น teacher ใน select
                        var select = form.find('select#teacher_id');
                        select.empty(); // เคลียร์ option เดิมทั้งหมด

                        // วนลูปเพื่อเพิ่ม option สำหรับครูที่เป็น teacher
                        $.each(response.data, function(index, item) {
                            select.append($('<option>', {
                                value: item.user_id,
                                text: item.firstname + ' ' + item.lastname
                            }));
                        });

                        // เซ็ตค่าให้ฟอร์มอื่น ๆ ตามต้องการ
                        form.find('input#user_update').val(response.data[0].firstname + " " + response.data[0].lastname);
                        form.find('input#update_date').val(response.data[0].update_date);
                        form.find('input#subject_id').val(response.data[0].subject_id);
                        form.find('input#subject_code').val(response.data[0].subject_code);
                        form.find('input#subject_name').val(response.data[0].subject_name);
                    } else {
                        console.error("Error retrieving user data:", response.message);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown);
                    // Handle general AJAX errors
                }
            });
        }

        function updateSubject() {
            var url = "<?= base_url('subject/updateSubject') ?>";
            var form = jQuery('form#updateSubjectForm')
            var subject_id = form.find('input#subject_id').val();
            var subject_code = form.find('input#subject_code').val();
            var subject_name = form.find('input#subject_name').val();
            var fd = {
                'subject_id': subject_id,
                'subject_code': subject_code,
                'subject_name': subject_name,
            };
            $.ajax({
                url: url,
                method: "POST",
                data: fd,
                dataType: "json",
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
            });
        }

        function updateSubjectAccess() {
            var url = "<?= base_url('subject/updateSubjectAccess') ?>";
            var form = jQuery('form#updateSubjectAccessForm')
            var teacher_id = form.find('select#teacher_id').val();
            var subject_id = form.find('input#subject_id').val();
            var fd = {
                'subject_id': subject_id,
                'teacher_id': teacher_id
            };
            $.ajax({
                url: url,
                method: "POST",
                data: fd,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                }
            });
        }
    </script>
</body>

</html>