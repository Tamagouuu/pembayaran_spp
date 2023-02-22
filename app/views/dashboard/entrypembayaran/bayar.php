<?php require_once(PARTIAL_PATH . '/dashboard/header.php') ?>

<?php

$tahun_bayar = explode('/', $data['siswa']['tahun_ajaran']);

?>


<?= Components::headingPage('Bayar SPP') ?>

<?php Flasher::flash() ?>


<div class="card d-inline-block p-3 px-4 shadow">
    <h2 class="h3 text-primary font-weight-bold"><?= $data['siswa']['nama'] ?></h2>
    <p class="mb-0" data-siswa="<?= $data['siswa']['id'] ?>"><small>NISN : <?= $data['siswa']['nisn'] ?></small></p>
    <p class="mb-0"><small>Kelas : <?= $data['siswa']['nama_kelas'] ?></small></p>
    <p class="mb-0" data-pembayaran="<?= $data['siswa']['pembayaran_id'] ?>"><small>Tahun Ajaran : <?= $data['siswa']['tahun_ajaran'] ?></small></p>
</div>



<div class="card shadow my-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Bulan</h6>
    </div>

    <div class="card-body">
        <div class="row justify-content-center">
            <?php foreach ($data['bulan'] as $key => $bulan) : ?>
                <div class="col-xl-3 col-md-3 col-sm-4 mb-3">
                    <div class="card border-top-primary shadow h-100 pt-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $bulan ?></div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= formatRupiah($data['siswa']['nominal']) ?></div>
                                </div>
                            </div>
                        </div>
                        <?php if (in_array($key, $data['bulan_dibayar'])) : ?>
                            <button class="btn btn-secondary btn-bayar py-1" disabled>Sudah Bayar</button>
                        <?php else : ?>
                            <button class="btn btn-primary btn-bayar py-1" data-bulan="<?= $key ?>" data-nominal="<?= $data['siswa']['nominal'] ?>" data-tahun="<?= ($key >= 6 && $key <= 12) ? $tahun_bayar[0]  : $tahun_bayar[1] ?>">Bayar</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<div class="card shadow my-1 d-inline-block" style="min-width:280px">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Pembayaran</h6>
    </div>

    <div class="card-body">
        <h3 class="h5 font-weight-bold">Total Bayar</h3>
        <h2 class="h4 font-weight-bold text-primary total-bayar">Rp. 0,-</h2>
        <button class="btn btn-primary rounded-pill btn-process-bayar" data-toggle="modal" data-target="#bayarModal" disabled>Bayar Cuy</button>
    </div>
</div>

<div class="modal fade" id="bayarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pembayaran</h5>
                <button class="close close-modal-bayar" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body payment-modal">

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary btn-submit-bayar">Bayar</button>
            </div>
        </div>
    </div>
</div>

<script>
    const buttons = document.querySelectorAll('.btn-bayar');
    const textTotal = document.querySelector('.total-bayar');
    const buttonPay = document.querySelector('.btn-process-bayar');
    const paymentModal = document.querySelector('.payment-modal');
    const buttonPayModal = document.querySelector('.btn-submit-bayar');

    const f = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    });
    let totalBayar = 0;
    let bulanBayar = [];

    function getMonthName(monthNumber) {
        const date = new Date();
        date.setMonth(monthNumber - 1);

        return date.toLocaleString('id-ID', {
            month: 'long',
        });
    }

    function deleteBulanModal(event, bulan) {
        const cardBulan = document.querySelector(`.btn-bayar[data-bulan="${bulan}"]`);
        event.target.parentElement.parentElement.parentElement.parentElement.remove()
        deleteBulan(cardBulan);

        if (!bulanBayar.length) {
            document.querySelector('.close-modal-bayar').click()
        }
    }

    function deleteBulan(e) {
        totalBayar -= parseInt(e.dataset.nominal)
        if (totalBayar <= 0) {
            buttonPay.disabled = true
        }
        e.classList.remove('bayar')
        e.classList.remove('btn-warning')
        e.classList.add('btn-primary')
        e.innerText = "Bayar"
        bulanBayar = bulanBayar.filter((b) => {
            return b.bulan != e.dataset.bulan
        })
        textTotal.innerText = f.format(totalBayar);
    }

    textTotal.innerText = f.format(0);

    buttonPayModal.addEventListener('click', async (e) => {
        const formData = new FormData();

        formData.append('pembayaran_id', document.querySelector('[data-pembayaran]').dataset.pembayaran)
        formData.append('siswa_id', document.querySelector('[data-siswa]').dataset.siswa)

        bulanBayar.forEach((e) => {
            formData.append(e.bulan, JSON.stringify(e));
        })

        buttonPayModal.disabled = true;

        await fetch("http://localhost/pembayaran_spp/public/dashboard/processbayar/", {
            method: "POST",
            body: formData
        }).then(data => data.json()).then((data) => {
            window.location.href = "http://localhost/pembayaran_spp/public/dashboard/entrypembayaran"
        })
    })

    buttons.forEach((e) => {
        e.addEventListener('click', () => {
            if (e.classList.contains('bayar')) {
                deleteBulan(e);
            } else {
                buttonPay.disabled = false
                e.classList.remove('btn-primary')
                e.classList.add('bayar')
                e.classList.add('btn-warning')
                e.innerText = "Batal Bayar"
                totalBayar += parseInt(e.dataset.nominal)
                textTotal.innerText = f.format(totalBayar)
                bulanBayar.push({
                    bulan: e.dataset.bulan,
                    nominal: e.dataset.nominal,
                    tahun: e.dataset.tahun
                });

                let data = ``;

                bulanBayar.forEach((e) => {
                    data += `<div class="card mb-2">
                    <div class="card-body p-3">
                        <div class="row no-gutters align-items-center">
                            <div class="col-9">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">${getMonthName(e.bulan)}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${f.format(e.nominal)}</div>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <button class="btn btn-danger px-2 py-0 rounded-pill" onclick="deleteBulanModal(event,${e.bulan})">×</button>
                            </div>
                        </div>
                    </div>
                </div>`
                })
                paymentModal.innerHTML = data;
            }
        })
    })
</script>

<?php require_once(PARTIAL_PATH . '/dashboard/footer.php') ?>