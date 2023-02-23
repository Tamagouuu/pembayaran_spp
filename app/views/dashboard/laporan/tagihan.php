<?php require_once(PARTIAL_PATH . '/dashboard/header.php') ?>


<?= Components::headingPage('Laporan Tagihan') ?>

<div class="card shadow mb-4 mt-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Filter</h6>
    </div>

    <div class="card-body">
        <form action="" class="form-filter">
            <div class="form-group row">
                <div class="col-md-6">
                    <label><small class="font-weight-bold">Kelas</small></label>
                    <select class="custom-select mb-2" required name="kelas">
                        <option selected value="all">Semua Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label><small class="font-weight-bold">Kompetensi Keahlian</small></label>
                    <select class="custom-select mb-2" required name="jurusan">
                        <option selected value="all">Semua Kompetensi Keahlian</option>
                        <?php foreach ($data['jurusan'] as $jurusan) : ?>
                            <option value="<?= $jurusan ?>"><?= $jurusan ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block rounded-pill">Generate Laporan</button>
        </form>
    </div>
</div>

<?php if (isset($data['sortedData'])) : ?>
    <div class="card shadow mb-4 mt-2">
        <div class="card-header py-2 d-flex align-items-center justify-content-between">
            <h6 class="m-0 py-2 font-weight-bold text-primary d-inline-block">Result</h6>
            <?php if (count($data['sortedData']) != 0) : ?>
                <a href="<?= BASEURL  ?>" class="btn btn-success btn-circle btn-sm my-1">
                    <i class="fas fa-print"></i>
                </a>
            <?php endif ?>
        </div>
        <div class="card-body">
            <?php if (count($data['sortedData']) != 0) : ?>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama Siswa</th>
                                <?php foreach ($data['bulan'] as $bulan) : ?>
                                    <th><?= ucfirst($bulan)  ?></th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama Siswa</th>
                                <?php foreach ($data['bulan'] as $bulan) : ?>
                                    <th><?= ucfirst($bulan)  ?></th>
                                <?php endforeach ?>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($data['sortedData'] as $key => $d) : ?>
                                <tr>
                                    <?php $identitas = explode('|', $key) ?>
                                    <td><span class="font-weight-bold text-primary"><?= $identitas[0] ?></span> <br> Kelas <?= $identitas[1] ?> - <?= $identitas[2] ?></td>
                                    <?php foreach ($data['bulan'] as $key => $bulan) : ?>
                                        <?php if (in_array($key, $d)) : ?>
                                            <td class="text-center"><i class="fas fa-check-circle text-success"></i></td>
                                        <?php else : ?>
                                            <td class="text-center"><i class="fas fa-times-circle text-danger"></i></td>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            <?php else : ?>
                <h3 class="font-weight-bold">Data tidak ditemukan</h3>
            <?php endif; ?>
        </div>
    </div>
<?php endif ?>

<script>
    const form = document.querySelector('.form-filter');
    const kelas = document.querySelector('select[name="kelas"]');
    const jurusan = document.querySelector('select[name="jurusan"]');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        window.location.href = `http://localhost/pembayaran_spp/public/dashboard/laporantagihan/${kelas.value}/${jurusan.value}`
    })
</script>

<?php require_once(PARTIAL_PATH . '/dashboard/footer.php') ?>