<?php

class Home extends Controller
{
    public function __construct()
    {
        Middleware::setAllowed('siswa');
    }

    public function index()
    {
        $data['title'] = "Home";
        $data['datatable'] = true;
        $data['siswa'] = $this->model('Siswa_model')->getSiswaByID($_SESSION['id']);
        $data['pembayaran'] = $this->model('Transaksi_model')->getTransaksiJoin($_SESSION['id']);
        $data['bulan'] = [7 => 'juli', 8 => 'agustus', 9 => 'september', 10 => 'oktober', 11 => 'november', 12 => 'desember', 1 => 'januari', 2 => 'februari', 3 => 'maret', 4 => 'april', 5 => 'mei', 6 => 'juni'];
        $data['transaksi'] = $this->model('Transaksi_model')->getBulanTransaksiByIdSiswa($_SESSION['id'], $data['siswa']['pembayaran_id']);
        $data['bulan_dibayar'] = [];
        foreach ($data['transaksi'] as $t) {
            array_push($data['bulan_dibayar'], $t['bulan_dibayar']);
        }
        $this->view('home/index', $data);
    }
}
