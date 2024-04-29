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
                                    <img src="classflow.svg" alt="" width="175" height="75">
                                </a>
                            </div>
                            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Sign up to your account</h2>
                        </div>
                        <div class="">
                            <form action="" method="post" id="registerForm">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="username" name="username" value="admin" placeholder="">
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
                                        <div class="d-grid">
                                            <button type="button" class="btn btn-primary" onclick="login()">Sign in</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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

        function login() {
            var username = jQuery('input#username').val();
            var pass = jQuery('input#pass').val();
            var url = "<?= base_url('login') ?>";
            // console.log(username, pass, url);
            console.log(url);
            $.ajax({
                url: url,
                method: "POST",
                data: {
                    'username': username,
                    'pass': pass,
                },
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        Swal.fire({
                            title: "ดำเนินการสำเร็จ!",
                            text: response.message,
                            icon: "success",
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        }).then((result) => {
                            location.reload();
                        });
                    } else {
                        Swal.fire("มีปัญหาในการเข้าสู่ระบบ", response.message, "error");
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