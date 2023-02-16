<?php require_once(PARTIAL_PATH . "/home/header.php") ?>

<div class="jumbotron jumbotron-fluid rounded-lg bg-gradient-primary">
    <div class="container text-white text-center ">
        <h1 class="display-4">Jalan<span class="font-weight-bold">Kuy</span></h1>
        <p style="max-width:500px" class="lead mx-auto">Merupakan platform yang disediakan untuk memesan ticket pesawat dan kereta</p>
    </div>
</div>


<!-- Content Column -->
<!-- Project Card Example -->
<?php Flasher::flash() ?>
<div class="card shadow mb-4 pb-2">
    <div class="card-header py-3 mb-2">
        <h6 class="m-0 font-weight-bold text-primary">Pemesanan</h6>
    </div>
    <div class="card-body py-2">
        <h2 class="text-primary text-center font-weight-bold">Pilih Rute</h2>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <label><small class="font-weight-bold text-primary">Rute Awal</small></label>
                <select class="custom-select" required name="rute_awal">
                    <?php foreach ($data['rute'] as $key => $rute) : ?>
                        <option value="<?= $key ?>"><?= $key ?></option>
                    <?php endforeach  ?>
                </select>
            </div>
            <div class=" col-sm-6">
                <label><small class="font-weight-bold text-primary">Rute Akhir</small></label>
                <select class="custom-select" required name="rute_akhir" disabled>
                    <option selected disabled value="">--- Rute Akhir ---</option>
                </select>
            </div>
        </div>
        <button class="btn btn-primary btn-user btn-block rounded-pill" id="btn-search" disabled>
            Cari Perjalanan
        </button>
        <hr>
        <div class="row transport-available"></div>
    </div>
</div>

<script>
    const ruteAwal = document.querySelector('select[name="rute_awal"]');
    const ruteAkhir = document.querySelector('select[name="rute_akhir"]');
    const btnSearch = document.querySelector('#btn-search');
    const transportAvailable = document.querySelector('.transport-available');

    let data = null;

    function fetchDataRute(rute) {
        return fetch(`http://localhost/ticketing/public/home/fetchruteakhir/${rute}`, {
            method: "POST"
        }).then(response => response.json());
    }

    ruteAwal.addEventListener('change', async () => {
        if (ruteAwal.value) {
            let options = `<option selected disabled value="">--- Rute Akhir ---</option>`;
            data = await fetchDataRute(ruteAwal.value);
            ruteAkhir.disabled = false;
            Object.keys(data).forEach(e => {
                options += `<option value="${e}">${e}</option>`;
            })
            ruteAkhir.innerHTML = options;
        }
    })

    ruteAkhir.addEventListener('change', () => {
        if (ruteAkhir.value) {
            btnSearch.disabled = false;
        }
    })

    btnSearch.addEventListener('click', () => {
        let rute = data[`${ruteAkhir.value}`];
        console.log(rute);
        let cards = "";
        const f = new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        });
        rute.forEach(e => {
            cards += `
            <a href="" class="col-xl-3 col-md-6 mb-4 text-decoration-none">
                <div class="card border-left-primary shadow-sm h-100 py-1">
                    <div class="card-body py-2">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    ${e.keterangan}</div>
                                <div class="h6 font-weight-bold text-gray-800">${e.rute_awal} - ${e.rute_akhir}</div>
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">${e.tanggal_berangkat}</div>
                                <div class="text-xs font-weight-bold text-muted text-uppercase">Berangkat : ${e.jam_berangkat}</div>
                                <div class="text-xs font-weight-bold text-muted text-uppercase">Tiba : ${e.jam_tiba}</div>
                                <hr class="my-2">
                                <div class="text-xs font-weight-bold text-muted text-uppercase mt-1">Harga</div>
                                <div class="h6 font-weight-bold text-primary mb-0">${f.format(e.harga)}</div>
                            </div>
                            <div class="col-auto text-center">
                                <i class="fas fa-${(e.type_keterangan == "Pesawat") ? 'plane' : 'subway'} fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>`
        });
        transportAvailable.innerHTML = cards;
    })
</script>

<?php require_once(PARTIAL_PATH . "/home/footer.php") ?>