<?php require_once(PARTIAL_PATH . '/dashboard/header.php') ?>


<?= Components::headingPage('History Pembayaran') ?>

<?php Flasher::flash() ?>

<div class="card shadow mb-4 mt-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Siswa</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['siswa'] as $siswa) : ?>
                        <tr>
                            <td><?= $siswa['nisn'] ?></td>
                            <td><?= $siswa['nis'] ?></td>
                            <td><?= $siswa['nama'] ?></td>
                            <td>
                                <a href="<?= BASEURL . '/dashboard/detailhistory/' . $siswa['id'] ?>" class="btn btn-primary rounded-pill"><i class="fas fa-history mr-2"></i>Lihat History</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once(PARTIAL_PATH . '/dashboard/footer.php') ?>