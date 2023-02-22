<?php require_once(PARTIAL_PATH . '/dashboard/header.php') ?>

<?= Components::headingPage('Dashboard') ?>
<h2 class="h3 mb-3 text-gray-800">Howdy, <b><?= $_SESSION['username'] ?></b></h2>

<a href="http://localhost/pembayaran_spp/public/dashboard/entrypembayaran" class="btn btn-primary btn-icon-split mb-4 mr-2">
    <span class="icon text-white-50">
        <i class="fas fa-money-bill"></i>
    </span>
    <span class="text">Entry Pembayaran</span>
</a>
<a href="http://localhost/pembayaran_spp/public/dashboard/historypembayaran" class="btn btn-success btn-icon-split mb-4 mr-2">
    <span class="icon text-white-50">
        <i class="fas fa-history"></i>
    </span>
    <span class="text">History Pembayaran</span>
</a>
<a href="http://localhost/pembayaran_spp/public/dashboard/entrypembayaran" class="btn btn-info btn-icon-split mb-4 mr-2">
    <span class="icon text-white-50">
        <i class="fas fa-file-signature"></i>
    </span>
    <span class="text">Generate Laporan</span>
</a>


<!-- Content Row -->
<div class="row">
    <a class="col-xl-3 col-md-6 mb-4 text-decoration-none" href="<?= BASEURL ?>/dashboard/kelas">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kelas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-door-open fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a class="col-xl-3 col-md-6 mb-4 text-decoration-none" href="<?= BASEURL ?>/dashboard/pembayaran">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pembayaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-receipt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a class="col-xl-3 col-md-6 mb-4 text-decoration-none" href="<?= BASEURL ?>/dashboard/petugas">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Petugas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
    <a class="col-xl-3 col-md-6 mb-4 text-decoration-none" href="<?= BASEURL ?>/dashboard/siswa">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

<?php require_once(PARTIAL_PATH . '/dashboard/footer.php') ?>