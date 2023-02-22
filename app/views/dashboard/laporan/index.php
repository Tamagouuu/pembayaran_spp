<?php require_once(PARTIAL_PATH . '/dashboard/header.php') ?>


<?= Components::headingPage('Generate Laporan') ?>

<div class="card shadow mb-4 mt-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Filter</h6>
    </div>

    <div class="card-body">
        <form action="" class="form-filter">
            <div class="form-group row">
                <div class="col-md-6">
                    <label><small class="font-weight-bold">Dari tanggal</small></label>
                    <input type="date" class="form-control form-control-user date mb-2" name="tanggal_mulai" required>
                    <label><small class="font-weight-bold">Sampai tanggal</small></label>
                    <input type="date" class="form-control form-control-user date mb-2" name="tanggal_akhir" required>
                </div>
                <div class="col-md-6">
                    <label><small class="font-weight-bold">Kelas</small></label>
                    <select class="custom-select mb-2" required name="kelas">
                        <option selected value="all">Semua Kelas</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
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

<div class="card shadow mb-4 mt-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Result</h6>
    </div>

    <div class="card-body">
        <?php foreach ($data['sortedData'] as $key => $d) : ?>
            <?php $identitas = explode('|', $key) ?>
            <div class="table-responsive">
                <table class="table table-bordered printable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th style="vertical-align: top;">Tanggal Bayar</th>
                            <th><?= $identitas[2] ?> - Kelas <?= $identitas[1] ?> <br> <?= $identitas[0] ?></th>
                            <th style="vertical-align: top;">Petugas</th>
                            <th style="vertical-align: top;">Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($d as $e) : ?>
                                <td><?= $tanggal_bayar ?></td>
                            <?php endforeach ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php endforeach ?>
    </div>
</div>

<script>
    const form = document.querySelector('.form-filter');
    const tanggalMulai = document.querySelector('input[name="tanggal_mulai"]');
    const tanggalAkhir = document.querySelector('input[name="tanggal_akhir"]');
    const kelas = document.querySelector('select[name="kelas"]');
    const jurusan = document.querySelector('select[name="jurusan"]');
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        window.location.href = `http://localhost/pembayaran_spp/public/dashboard/generatelaporan/${tanggalMulai.value}/${tanggalAkhir.value}/${kelas.value}/${jurusan.value}`
    })
</script>

<?php require_once(PARTIAL_PATH . '/dashboard/footer.php') ?>