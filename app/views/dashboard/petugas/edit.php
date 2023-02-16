<?php require_once(PARTIAL_PATH . '/dashboard/header.php') ?>

<?= Components::headingPage('Petugas') ?>

<?php Flasher::flash() ?>

<div class="card shadow my-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Petugas</h6>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="p-1">
                    <form action="<?= BASEURL ?>/dashboard/updatepetugas" method="POST" class="user">
                        <input type="hidden" name="id" value="<?= $data['petugas']['id'] ?>">
                        <input type="hidden" name="pengguna_id" value="<?= $data['petugas']['pengguna_id'] ?>">
                        <div class="form-group">
                            <label><small class="font-weight-bold">Nama Petugas</small></label>
                            <input type="text" class="form-control form-control-user br-10" name="nama" value="<?= $data['petugas']['nama'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label><small class="font-weight-bold">Username</small></label>
                            <input type="text" class="form-control form-control-user br-10" name="username" value="<?= $data['petugas']['username'] ?>" required>
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