<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav mt-3">
            <a class="nav-link" href="user_index.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'user_regist') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-circle-plus"></i></div>
                    Dashboard
                    </a>
            <a class="nav-link" href="user_regist.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'user_regist') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-circle-plus"></i></div>
                    Registrasi Pelanggan
                    </a>
                <a class="nav-link" href="user_tagihan.php">
                    <div class="sb-nav-link-icon <?php echo strpos($_SERVER['REQUEST_URI'], 'user_tagihan') ? 'text-primary' : ''; ?>"><i class="fa-solid fa-layer-group"></i></div>
                    Data Tagihan
                </a>

                <a class="nav-link mt-4" href="logout.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                    Log Out
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?= $_SESSION['login_u']['nama']; ?>
        </div>
    </nav>
</div>