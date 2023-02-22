<?php

class Dashboard extends Controller
{

    public function __construct()
    {
        if (!$_SESSION['is_logged_in']) {
            redirect('/login');
        }

        if ($_SESSION['role'] != 'admin') {
            if ($_SESSION['role'] != 'petugas') {
                redirect('/login');
            }
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->view('dashboard/index', $data);
    }

    public function kelas()
    {
        $data['title'] = 'Kelas';
        $data['datatable'] = true;
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $this->view('dashboard/kelas/index', $data);
    }

    public function createKelas()
    {
        $data['title'] = 'Kelas';
        $this->view('dashboard/kelas/create', $data);
    }

    public function storeKelas()
    {
        preventRequest();
        if ($this->model('Kelas_model')->addKelas($_POST) > 0) {
            Flasher::setFlash('Data berhasil', 'ditambahkan', 'success');
            redirect('/dashboard/kelas');
        } else {
            Flasher::setFlash('Data gagal', 'ditambahkan', 'danger');
            redirect('/dashboard/kelas');
        }
    }

    public function deleteKelas($id)
    {
        preventRequest();
        if ($this->model('Kelas_model')->deleteKelas($id) > 0) {
            Flasher::setFlash('Data berhasil', 'dihapus', 'success');
            redirect('/dashboard/kelas');
        } else {
            Flasher::setFlash('Data gagal', 'dihapus', 'danger');
            redirect('/dashboard/kelas');
        }
    }

    public function editKelas($id)
    {
        $data['title'] = 'Kelas';
        $data['kelas'] = $this->model('Kelas_model')->getKelasByID($id);
        $this->view('dashboard/kelas/edit', $data);
    }

    public function updateKelas()
    {
        preventRequest();
        if ($this->model('Kelas_model')->updateKelas($_POST) > 0) {
            Flasher::setFlash('Data berhasil', 'diubah', 'success');
            redirect('/dashboard/kelas');
        } else {
            Flasher::setFlash('Data gagal', 'diubah', 'danger');
            redirect('/dashboard/kelas');
        }
    }

    public function pembayaran()
    {
        Middleware::setAllowed('admin');
        $data['title'] = 'Pembayaran';
        $data['datatable'] = true;
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $this->view('dashboard/pembayaran/index', $data);
    }

    public function createPembayaran()
    {
        Middleware::setAllowed('admin');
        $data['title'] = 'Pembayaran';
        $this->view('dashboard/pembayaran/create', $data);
    }

    public function storePembayaran()
    {
        Middleware::setAllowed('admin', 'POST');
        if ($this->model('Pembayaran_model')->addPembayaran($_POST) > 0) {
            Flasher::setFlash('Data berhasil', 'ditambahkan', 'success');
            redirect('/dashboard/pembayaran');
        } else {
            Flasher::setFlash('Data gagal', 'ditambahkan', 'danger');
            redirect('/dashboard/pembayaran');
        }
    }

    public function deletePembayaran($id)
    {
        Middleware::setAllowed('admin', 'POST');
        if ($this->model('Pembayaran_model')->deletePembayaran($id) > 0) {
            Flasher::setFlash('Data berhasil', 'dihapus', 'success');
            redirect('/dashboard/pembayaran');
        } else {
            Flasher::setFlash('Data gagal', 'dihapus', 'danger');
            redirect('/dashboard/pembayaran');
        }
    }

    public function editPembayaran($id)
    {
        Middleware::setAllowed('admin');
        $data['title'] = 'Pembayaran';
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranByID($id);
        $this->view('dashboard/pembayaran/edit', $data);
    }

    public function updatePembayaran()
    {
        Middleware::setAllowed('admin', 'POST');
        if ($this->model('Pembayaran_model')->updatePembayaran($_POST) > 0) {
            Flasher::setFlash('Data berhasil', 'diubah', 'success');
            redirect('/dashboard/pembayaran');
        } else {
            Flasher::setFlash('Data gagal', 'diubah', 'danger');
            redirect('/dashboard/pembayaran');
        }
    }

    public function petugas()
    {
        Middleware::setAllowed('admin');
        $data['title'] = 'Petugas';
        $data['datatable'] = true;
        $data['petugas'] = $this->model('Petugas_model')->getPetugasJoinPengguna();
        $this->view('dashboard/petugas/index', $data);
    }

    public function createPetugas()
    {
        Middleware::setAllowed('admin');
        $data['title'] = 'Petugas';
        $this->view('dashboard/petugas/create', $data);
    }

    public function storePetugas()
    {
        Middleware::setAllowed('admin', 'POST');
        if ($this->model('Petugas_model')->addPetugas($_POST) > 0) {
            Flasher::setFlash('Data berhasil', 'ditambahkan', 'success');
            redirect('/dashboard/petugas');
        } else {
            Flasher::setFlash('Data gagal', 'ditambahkan', 'danger');
            redirect('/dashboard/petugas');
        }
    }

    public function deletePetugas($id)
    {
        Middleware::setAllowed('admin', 'POST');
        if ($this->model('Pengguna_model')->deletePengguna($id) > 0) {
            Flasher::setFlash('Data berhasil', 'dihapus', 'success');
            redirect('/dashboard/petugas');
        } else {
            Flasher::setFlash('Data gagal', 'dihapus', 'danger');
            redirect('/dashboard/petugas');
        }
    }

    public function editPetugas($id)
    {
        Middleware::setAllowed('admin');
        $data['title'] = 'Petugas';
        $data['petugas'] = $this->model('Petugas_model')->getPetugasByID($id);
        $this->view('dashboard/petugas/edit', $data);
    }

    public function updatePetugas()
    {
        Middleware::setAllowed('admin', 'POST');
        if ($this->model('Petugas_model')->updatePetugas($_POST) > 0) {
            Flasher::setFlash('Data berhasil', 'diubah', 'success');
            redirect('/dashboard/petugas');
        } else {
            Flasher::setFlash('Data gagal', 'diubah', 'danger');
            redirect('/dashboard/petugas');
        }
    }

    public function siswa()
    {
        Middleware::setAllowed('admin');
        $data['title'] = 'Siswa';
        $data['datatable'] = true;
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswaJoin();
        $this->view('dashboard/siswa/index', $data);
    }

    public function createSiswa()
    {
        Middleware::setAllowed('admin');

        $data['title'] = 'Siswa';
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $this->view('dashboard/siswa/create', $data);
    }

    public function storeSiswa()
    {
        Middleware::setAllowed('admin', 'POST');

        if ($this->model('Siswa_model')->addSiswa($_POST) > 0) {
            Flasher::setFlash('Data berhasil', 'ditambahkan', 'success');
            redirect('/dashboard/siswa');
        } else {
            Flasher::setFlash('Data gagal', 'ditambahkan', 'danger');
            redirect('/dashboard/siswa');
        }
    }

    public function deleteSiswa($id)
    {
        Middleware::setAllowed('admin', 'POST');

        if ($this->model('Pengguna_model')->deletePengguna($id) > 0) {
            Flasher::setFlash('Data berhasil', 'dihapus', 'success');
            redirect('/dashboard/siswa');
        } else {
            Flasher::setFlash('Data gagal', 'dihapus', 'danger');
            redirect('/dashboard/siswa');
        }
    }

    public function editSiswa($id)
    {
        Middleware::setAllowed('admin');
        $data['title'] = 'Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByID($id);
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $this->view('dashboard/siswa/edit', $data);
    }

    public function updateSiswa()
    {
        Middleware::setAllowed('admin', 'POST');

        if ($this->model('Siswa_model')->updateSiswa($_POST) > 0) {
            Flasher::setFlash('Data berhasil', 'diedit', 'success');
            redirect('/dashboard/siswa');
        } else {
            Flasher::setFlash('Data gagal', 'diedit', 'danger');
            redirect('/dashboard/siswa');
        }
    }

    public function entryPembayaran()
    {
        $data['title'] = 'Entry Pembayaran';
        $data['datatable'] = true;
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswaJoin();
        $this->view('/dashboard/entrypembayaran/index', $data);
    }

    public function bayar($id)
    {
        $data['title'] = 'Entry Pembayaran';
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByID($id);
        $data['transaksi'] = $this->model('Transaksi_model')->getBulanTransaksiByIdSiswa($id, $data['siswa']['pembayaran_id']);
        $data['bulan_dibayar'] = [];
        foreach ($data['transaksi'] as $t) {
            array_push($data['bulan_dibayar'], $t['bulan_dibayar']);
        }
        $data['bulan'] = [7 => 'juli', 8 => 'agustus', 9 => 'september', 10 => 'oktober', 11 => 'november', 12 => 'desember', 1 => 'januari', 2 => 'februari', 3 => 'maret', 4 => 'april', 5 => 'mei', 6 => 'juni'];
        $this->view('/dashboard/entrypembayaran/bayar', $data);
    }

    public function processBayar()
    {
        $data = array_map(function ($j) {
            return json_decode($j, true);
        }, $_POST);

        if ($this->model('Transaksi_model')->addTransaksi($data) > 0) {
            Flasher::setFlash('Data berhasil', 'ditambahkan', 'success');
            echo json_encode("success");
            // redirect('/dashboard/entrypembayaran');
        } else {
            Flasher::setFlash('Data gagal', 'ditambahkan', 'danger');
            echo json_encode("error");
            // redirect('/dashboard/entrypembayaran');
        }
    }

    public function historyPembayaran()
    {
        $data['title'] = 'History';
        $data['datatable'] = true;
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswaJoin();
        $this->view('dashboard/historypembayaran/index', $data);
    }

    public function detailHistory($id)
    {
        $data['title'] = 'Detail History';
        $data['datatable'] = true;
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByID($id);
        $data['pembayaran'] = $this->model('Transaksi_model')->getTransaksiJoin($id);
        $data['bulan'] = [7 => 'juli', 8 => 'agustus', 9 => 'september', 10 => 'oktober', 11 => 'november', 12 => 'desember', 1 => 'januari', 2 => 'februari', 3 => 'maret', 4 => 'april', 5 => 'mei', 6 => 'juni'];
        $data['transaksi'] = $this->model('Transaksi_model')->getBulanTransaksiByIdSiswa($id, $data['siswa']['pembayaran_id']);
        $data['bulan_dibayar'] = [];
        foreach ($data['transaksi'] as $t) {
            array_push($data['bulan_dibayar'], $t['bulan_dibayar']);
        }
        $this->view('dashboard/historypembayaran/detail', $data);
    }

    public function generateLaporan($start = null, $end = null, $kelas = null, $jurusan = null)
    {
        $data['title'] = 'Generate Laporan';
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['jurusan'] = [];
        foreach ($data['kelas'] as $k) {
            if (!in_array($k['kompetensi_keahlian'], $data['jurusan'])) {
                array_push($data['jurusan'], $k['kompetensi_keahlian']);
            }
        }

        if ($start && $end) {
            $data['sortedData'] = [];
            $data['transaksiFiltered'] = $this->model('Transaksi_model')->getTransaksiFilter($start, $end . ' 23:59:59', $kelas, $jurusan);

            // echo "<pre>";
            // var_dump($data['transaksiFiltered']);
            // echo "</pre>";
            foreach ($data['transaksiFiltered'] as $d) {
                $data['sortedData'][$d['nama'] . '|' . $d['nama_kelas'] . '|' . $d['nisn']][] = $d;
            }

            echo "<pre>";
            var_dump($data['sortedData']);
            echo "</pre>";
        }

        $this->view('/dashboard/laporan/index', $data);
    }
}
