<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Sign In')); ?>

    <?= $this->include('partials/head-css') ?>

</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row justify-content-center ">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center my-4">
                            <div class="text-center mb-3">
                                <a href="">
                                    <img src="<?= base_url('classflow.svg') ?>" alt="" width="175" height="75">
                                </a>
                            </div>
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign up to your account</h2>
                        </div>
                        <form action="" method="post" id="registerForm">
                            <div class="row g-3">
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="firstname" name="firstname" value="Yuttapoom" placeholder="">
                                        <label for="firstname">Firstname</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="lastname" name="lastname" value="Haphanom" placeholder="">
                                        <label for="lastname">Lastname</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="tel" name="tel" value="0999999999" placeholder="">
                                        <label for="tel">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="room" class="form-control" id="room" name="room" value="00" placeholder="">
                                        <label for="room">Room</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="username" name="username" value="AUUNNG" placeholder="">
                                        <label for="username">Username</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="pass" name="pass" value="12345678" placeholder="">
                                        <label for="pass">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="confirmPass" name="confirmPass" value="12345678" placeholder="">
                                        <label for="confirmPass">Password</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="button" class="btn btn-primary" onclick="register()">Sign up</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= $this->include('partials/vendor-scripts') ?>

    <!-- particles js -->
    <script src="/assets/libs/particles.js/particles.js"></script>
    <!-- particles app js -->
    <script src="/assets/js/pages/particles.app.js"></script>
    <!-- password-addon init -->
    <script src="/assets/js/pages/password-addon.init.js"></script>
    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        function register() {
            var fd = new FormData(jQuery('form#registerForm')[0]);
            var url = "<?= base_url('register/register') ?>";
            console.log(url);
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
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        }).then(() => {
                            window.location.href = "<?= base_url('/login') ?>";
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