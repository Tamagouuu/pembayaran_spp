<?php require_once(PARTIAL_PATH . '/dashboard/header.php') ?>


<?= Components::headingPage('Pembayaran', 'createpembayaran') ?>

<?php Flasher::flash() ?>

<div class="card shadow mb-4 mt-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Pembayaran</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['pembayaran'] as $pembayaran) : ?>
                        <tr>
                            <td><?= $pembayaran['tahun_ajaran'] ?></td>
                            <td><?= $pembayaran['nominal'] ?></td>
                            <td>
                                <?= Components::editButton("/dashboard/editpembayaran/{$pembayaran['id']}") ?>
                                <?= Components::deleteButton("/dashboard/deletepembayaran/{$pembayaran['id']}") ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once(PARTIAL_PATH . '/dashboard/footer.php') ?>