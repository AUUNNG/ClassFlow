<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title' => 'Form Select')); ?>

    <?= $this->include('partials/head-css') ?>

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    <div class="col-lg-4 col-md-6">
                        <div class="mb-3">
                            <label for="choices-multiple-remove-button" class="form-label text-muted">With remove button</label>
                            <p class="text-muted">Set <code>data-choices data-choices-removeItem multiple</code> attribute.</p>
                            <select class="form-control" id="choices-multiple-remove-button" data-choices data-choices-removeItem name="choices-multiple-remove-button" multiple>
                                <option value="Choice 1" selected>Choice 1</option>
                                <option value="Choice 2">Choice 2</option>
                                <option value="Choice 3">Choice 3</option>
                                <option value="Choice 4">Choice 4</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page-content -->


            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>

    <!-- prismjs plugin -->
    <script src="/assets/libs/prismjs/prism.js"></script>

    <script src="/assets/js/app.js"></script>

</body>

</html>