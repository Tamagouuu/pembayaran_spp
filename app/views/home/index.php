<?php require_once(PARTIAL_PATH . "/home/header.php") ?>


<h1 class="h2 font-weight-bold">Halo, <span class="text-primary"><?= $_SESSION['username'] ?></span></h1>


<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Laporan Simple Pembayaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <?php foreach ($data['bulan'] as $bulan) : ?>
                            <th><?= ucfirst($bulan)  ?></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <?php foreach ($data['bulan'] as $bulan) : ?>
                            <th><?= ucfirst($bulan)  ?></th>
                        <?php endforeach ?>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['bulan'] as $key => $bulan) : ?>
                        <?php if (in_array($key, $data['bulan_dibayar'])) : ?>
                            <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                        <?php else : ?>
                            <td class="text-center"><i class="fas fa-times-circle text-danger"></i></td>
                        <?php endif ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4 mt-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail History Pembayaran</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tanggal Bayar</th>
                        <th>Bulan dibayar</th>
                        <th>Tahun dibayar</th>
                        <th>Petugas</th>
                        <th>Tahun Ajaran</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tanggal Bayar</th>
                        <th>Bulan dibayar</th>
                        <th>Tahun dibayar</th>
                        <th>Petugas</th>
                        <th>Tahun Ajaran</th>
                        <th>Nominal</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['pembayaran'] as $pembayaran) : ?>
                        <tr>
                            <td><?= $pembayaran['tanggal_bayar'] ?></td>
                            <td><?= ucfirst($data['bulan'][$pembayaran['bulan_dibayar']]) ?></td>
                            <td><?= $pembayaran['tahun_dibayar'] ?></td>
                            <td><?= $pembayaran['nama_petugas'] ?></td>
                            <td><?= $pembayaran['tahun_ajaran'] ?></td>
                            <td><?= $pembayaran['nominal'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once(PARTIAL_PATH . "/home/footer.php") ?>