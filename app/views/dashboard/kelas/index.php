<?php require_once(PARTIAL_PATH . '/dashboard/header.php') ?>


<?= Components::headingPage('Kelas', 'createkelas') ?>

<?php Flasher::flash() ?>

<div class="card shadow mb-4 mt-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Kelas</h6>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nama Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nama Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($data['kelas'] as $kelas) : ?>
                        <tr>
                            <td><?= $kelas['nama'] ?></td>
                            <td><?= $kelas['kompetensi_keahlian'] ?></td>
                            <td>
                                <?= Components::editButton("/dashboard/editkelas/{$kelas['id']}") ?>
                                <?= Components::deleteButton("/dashboard/deletekelas/{$kelas['id']}") ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once(PARTIAL_PATH . '/dashboard/footer.php') ?>