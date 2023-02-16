<?php require_once(PARTIAL_PATH . '/dashboard/header.php') ?>

<?= Components::headingPage('Pembayaran') ?>

<?php Flasher::flash() ?>

<div class="card shadow my-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pembayaran</h6>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col">
                <div class="p-1">
                    <form action="<?= BASEURL ?>/dashboard/updatepembayaran" method="POST" class="user">
                        <input type="hidden" name="id" value="<?= $data['pembayaran']['id'] ?>">
                        <div class="form-group">
                            <label><small class="font-weight-bold">Tahun ajaran</small></label>
                            <input type="text" class="form-control form-control-user br-10" name="tahun_ajaran" value="<?= $data['pembayaran']['tahun_ajaran'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label><small class="font-weight-bold">Nominal</small></label>
                            <input type="number" class="form-control form-control-user br-10" name="nominal" value="<?= $data['pembayaran']['nominal'] ?>" required>
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