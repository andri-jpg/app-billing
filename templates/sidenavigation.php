<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav mt-3">
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'home') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-layer-group"></i></div>
                    Data Paket
                </a>
                <a class="nav-link" href="data_pelanggan.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'barang_masuk') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-circle-plus"></i></div>
                    Data Pelanggan
                </a>
                <a class="nav-link" href="list_tagihan.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'list_tagihan') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-circle-minus"></i></div>
                    List Tagihan
                </a>
                <a class="nav-link" href="konfirmasi.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'konfirmasi') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-circle-minus"></i></div>
                    Konfirmasi Tagihan
                </a>
                <a class="nav-link" href="history_tagihan.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'history_tagihan') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-clock"></i></div>
                    History Tagihan
                </a>
                <a class="nav-link mt-4" href="logout.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                    Log Out
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo $_SESSION['email']; ?>
        </div>
    </nav>
</div>