<?php

class Dashboard extends Controller
{

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
        $data['title'] = 'Pembayaran';
        $data['datatable'] = true;
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $this->view('dashboard/pembayaran/index', $data);
    }

    public function createPembayaran()
    {
        $data['title'] = 'Pembayaran';
        $this->view('dashboard/pembayaran/create', $data);
    }

    public function storePembayaran()
    {
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
        $data['title'] = 'Pembayaran';
        $data['pembayaran'] = $this->model('Pembayaran_model')->getPembayaranByID($id);
        $this->view('dashboard/pembayaran/edit', $data);
    }

    public function updatePembayaran()
    {
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
        $data['title'] = 'Petugas';
        $data['datatable'] = true;
        $data['petugas'] = $this->model('Petugas_model')->getPetugasJoinPengguna();
        $this->view('dashboard/petugas/index', $data);
    }

    public function createPetugas()
    {
        $data['title'] = 'Petugas';
        $this->view('dashboard/petugas/create', $data);
    }

    public function storePetugas()
    {
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
        $data['title'] = 'Petugas';
        $data['petugas'] = $this->model('Petugas_model')->getPetugasByID($id);
        $this->view('dashboard/petugas/edit', $data);
    }

    public function updatePetugas()
    {
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
        $data['title'] = 'Siswa';
        $data['datatable'] = true;
        $data['siswa'] = $this->model('Siswa_model')->getAllSiswaJoin();
        $this->view('dashboard/siswa/index', $data);
    }

    public function createSiswa()
    {
        $data['title'] = 'Siswa';
        $data['kelas'] = $this->model('Kelas_model')->getAllKelas();
        $data['pembayaran'] = $this->model('Pembayaran_model')->getAllPembayaran();
        $this->view('dashboard/siswa/create', $data);
    }

    public function storeSiswa()
    {
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
        $data['title'] = 'Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByID($id);
        $this->view('dashboard/petugas/edit', $data);
    }
}
