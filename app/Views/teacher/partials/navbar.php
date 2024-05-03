<nav class="navbar card fixed-top navbar-light d-none d-md-block m-0 p-3">
    <div class="container">
        <a class="navbar-brand d-none d-md-flex" href="/teacher">
            <img src="<?= base_url('classflow.svg') ?>" alt="" width="" height="30px">
        </a>
        <div class="d-flex justify-content-between mx-auto mx-md-0" style="width:550px;">
            <a class="d-flex align-items-center nav-link" href="/teacher">
                <i class="ri-home-line me-2"></i>
                <span class="fs-6"> Home </span>
            </a>
            <a class="d-flex align-items-center nav-link" href="/profile">
                <i class="ri-user-line me-2"></i>
                <span class="fs-6"> Profile </span>
            </a>
            <a class="d-flex align-items-center nav-link" href="/subject">
                <i class="ri-book-2-line me-2"></i>
                <span class="fs-6"> Subject </span>
            </a>
            <a class="d-flex align-items-center nav-link" href="/check">
                <i class="ri-calendar-check-line me-2"></i>
                <span class="fs-6">Check</span>
            </a>
            <a class="d-flex align-items-center nav-link" href="/classroom">
                <i class="ri-file-user-line me-2"></i>
                <span class="fs-6">Classroom</span>
            </a>
            <a class="d-flex align-items-center nav-link" type="button" onclick="logout()">
                <i class="ri-logout-box-r-line me-2"></i>
                <span class="fs-6"> Logout </span>
            </a>
        </div>
    </div>
</nav>
<nav class="navbar card fixed-bottom navbar-light d-block d-md-none m-0 p-3">
    <div class="container">
        <div class="d-flex justify-content-between mx-auto mx-md-0" style="width:500px;">
            <a class="d-flex flex-column align-items-center nav-link active" href="/teacher">
                <i class="ri-home-line"></i>
                <span class="fs-6"> Home </span>
            </a>
            <a class="d-flex flex-column align-items-center nav-link" href="/profile">
                <i class="ri-user-line"></i>
                <span class="fs-6"> Profile </span>
            </a>
            <a class="d-flex flex-column align-items-center nav-link" href="/subject">
                <i class="ri-book-2-line"></i>
                <span class="fs-6"> Subject </span>
            </a>
            <a class="d-flex flex-column align-items-center nav-link" href="/check">
                <i class="ri-calendar-check-line"></i>
                <span class="fs-6">Check</span>
            </a>
            <a class="d-flex flex-column align-items-center nav-link" href="/classroom">
                <i class="ri-file-user-line"></i>
                <span class="fs-6">Classroom</span>
            </a>
            <a class="d-flex flex-column align-items-center nav-link" type="button" onclick="logout()">
                <i class="ri-logout-box-r-line"></i>
                <span class="fs-6"> Logout </span>
            </a>
        </div>
    </div>
</nav>
<script src="jquery-3.7.1.min.js"></script>
<script>
    jQuery$(document).ready(function() {});

    function logout() {
        Swal.fire({
            title: "คำเตือน!",
            text: "ต้องการออกจากระบบหรือไม่?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "ออกจากระบบ",
            cancelButtonText: "ยกเลิก",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('/logout') ?>';
            }
        });
    }
</script>