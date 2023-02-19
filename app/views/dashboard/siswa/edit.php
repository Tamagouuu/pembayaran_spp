<?php require_once(PARTIAL_PATH . '/dashboard/header.php') ?>

<?= Components::headingPage('Siswa') ?>

<?php Flasher::flash() ?>

<div class="card shadow my-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Siswa</h6>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="p-1">
                    <form action="<?= BASEURL ?>/dashboard/updatesiswa" method="POST" class="user">
                        <input type="hidden" value="<?= $data['siswa']['id'] ?>" name="id">
                        <input type="hidden" value="<?= $data['siswa']['pengguna_id'] ?>" name="pengguna_id">
                        <div class="form-group">
                            <label><small class="font-weight-bold">NISN</small></label>
                            <input type="number" class="form-control form-control-user br-10" name="nisn" value="<?= $data['siswa']['nisn'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label><small class="font-weight-bold">NIS</small></label>
                            <input type="number" class="form-control form-control-user br-10" name="nis" value="<?= $data['siswa']['nis'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label><small class="font-weight-bold">Nama Siswa</small></label>
                            <input type="text" class="form-control form-control-user br-10" name="nama" value="<?= $data['siswa']['nama'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label><small class="font-weight-bold">Username</small></label>
                            <input type="text" class="form-control form-control-user br-10" name="username" value="<?= $data['siswa']['username'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label><small class="font-weight-bold">Alamat</small></label>
                            <input type="text" class="form-control form-control-user br-10" name="alamat" value="<?= $data['siswa']['alamat'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label><small class="font-weight-bold">Telepon</small></label>
                            <input type="number" class="form-control form-control-user br-10" name="telepon" value="<?= $data['siswa']['telepon'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label><small class="font-weight-bold">Kelas</small></label>
                            <select class="custom-select" required name="kelas_id">
                                <option selected disabled value="">--- Kelas ---</option>
                                <?php foreach ($data['kelas'] as $kelas) : ?>
                                    <option value="<?= $kelas['id'] ?>" <?= ($data['siswa']['kelas_id'] == $kelas['id']) ? 'selected' : '' ?>><?= $kelas['nama'] . ' - ' . $kelas['kompetensi_keahlian'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><small class="font-weight-bold">Pembayaran</small></label>
                            <select class="custom-select" required name="pembayaran_id">
                                <option selected disabled value="">--- Pembayaran ---</option>
                                <?php foreach ($data['pembayaran'] as $pembayaran) : ?>
                                    <option value="<?= $pembayaran['id'] ?>" <?= ($pembayaran['id'] == $data['siswa']['pembayaran_id']) ? "selected" : '' ?>><?= $pembayaran['nominal'] . ' - ' . $pembayaran['tahun_ajaran'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success btn-icon-split float-right">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Edit Data</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once(PARTIAL_PATH . '/dashboard/footer.php') ?>