<?= $this->include('partials/main') ?>

<head>

    <?php echo view('partials/title-meta', array('title'=>'Wallet Connect')); ?>

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

                    <?php echo view('partials/page-title', array('pagetitle'=>'NFT Marketplace', 'title'=>'Wallet Connect')); ?>

                    <div class="row justify-content-center">
                        <div class="col-xl-5">
                            <div class="text-center mb-4">
                                <h4 class="fw-bold">Your current wallet</h4>
                                <p class="text-muted fs-13">WalletConnect is a convenient open source tool that enables a mobile wallet to easily connect to decentralized web applications, and interact with them from your phone.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-3">
                            <div class="card text-center">
                                <div class="card-body py-5 px-4">
                                    <img src="/assets/images/nft/wallet/metamask.png" alt="" height="55" class="mb-3 pb-2">
                                    <h5 class="fw-bold">Metamask</h5>
                                    <p class="text-muted pb-1">MetaMask is a software cryptocurrency wallet used to interact with the Ethereum blockchain.</p>
                                    <a href="#!" class="btn btn-danger">Change Wallet</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-5">
                            <div class="text-center mb-4">
                                <h4 class="fw-bold">Connect with one of our other available wallet providers.</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-3">
                            <div class="card text-center">
                                <div class="card-body py-5 px-4">
                                    <img src="/assets/images/nft/wallet/metamask.png" alt="" height="55" class="mb-3 pb-2">
                                    <h5 class="fw-bold">Metamask</h5>
                                    <p class="text-muted pb-1">MetaMask is a software cryptocurrency wallet used to interact with the Ethereum blockchain.</p>
                                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card text-center">
                                <div class="card-body py-5 px-4">
                                    <img src="/assets/images/nft/wallet/coinbase.png" alt="" height="55" class="mb-3 pb-2">
                                    <h5 class="fw-bold">Coinbase Wallet</h5>
                                    <p class="text-muted pb-1">Coinbase Wallet is a software product that gives you access to a wide spectrum.</p>
                                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card text-center">
                                <div class="card-body py-5 px-4">
                                    <img src="/assets/images/nft/wallet/kukai.png" alt="" height="55" class="mb-3 pb-2">
                                    <h5 class="fw-bold">Kukai Wallet</h5>
                                    <p class="text-muted pb-1">Kukai is a seamless browser-based wallet that allows users to store, transfer, and delegate.</p>
                                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card text-center">
                                <div class="card-body py-5 px-4">
                                    <img src="/assets/images/nft/wallet/binance.png" alt="" height="55" class="mb-3 pb-2">
                                    <h5 class="fw-bold">Binance</h5>
                                    <p class="text-muted pb-1">Binance offers a relatively secure, versatile way to invest in and trade cryptocurrencies.</p>
                                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card text-center">
                                <div class="card-body py-5 px-4">
                                    <img src="/assets/images/nft/wallet/enjin.png" alt="" height="55" class="mb-3 pb-2">
                                    <h5 class="fw-bold">Enjin Wallet</h5>
                                    <p class="text-muted pb-1">Enjin is a store of value that can be used in the non-fungible token (NFT) marketplace.</p>
                                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card text-center">
                                <div class="card-body py-5 px-4">
                                    <img src="/assets/images/nft/wallet/alpha.png" alt="" height="55" class="mb-3 pb-2">
                                    <h5 class="fw-bold">Alpha Wallet</h5>
                                    <p class="text-muted pb-1">AlphaWallet uses the TokenScript framework, which makes tokens become “smart”.</p>
                                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card text-center">
                                <div class="card-body py-5 px-4">
                                    <img src="/assets/images/nft/wallet/math.png" alt="" height="55" class="mb-3 pb-2">
                                    <h5 class="fw-bold">Math Wallet</h5>
                                    <p class="text-muted pb-1">Math DApp Factory gives users tools that can simplify the development of exchanges, games</p>
                                    <a href="#!" class="btn btn-soft-info">Connect Wallet</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <?= $this->include('partials/customizer') ?>

    <?= $this->include('partials/vendor-scripts') ?>

    <!-- App js -->
    <script src="/assets/js/app.js"></script>
</body>

</html>