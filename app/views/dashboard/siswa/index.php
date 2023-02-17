<?php require_once(PARTIAL_PATH . '/dashboard/header.php') ?>


<?= Components::headingPage('Siswa', 'createsiswa') ?>

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
                        <th>Username</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Tahun Ajaran</th>
                        <th>Nominal Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NISN</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Username</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Tahun Ajaran</th>
                        <th>Nominal Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['siswa'] as $siswa) : ?>
                        <tr>
                            <td><?= $siswa['nisn'] ?></td>
                            <td><?= $siswa['nis'] ?></td>
                            <td><?= $siswa['nama'] ?></td>
                            <td><?= $siswa['username'] ?></td>
                            <td><?= $siswa['alamat'] ?></td>
                            <td><?= $siswa['telepon'] ?></td>
                            <td><?= $siswa['nama_kelas'] ?></td>
                            <td><?= $siswa['kompetensi_keahlian'] ?></td>
                            <td><?= $siswa['tahun_ajaran'] ?></td>
                            <td><?= $siswa['nominal'] ?></td>
                            <td>
                                <?= Components::editButton("/dashboard/editsiswa/{$siswa['id']}") ?>
                                <?= Components::deleteButton("/dashboard/deletesiswa/{$siswa['pengguna_id']}") ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once(PARTIAL_PATH . '/dashboard/footer.php') ?>