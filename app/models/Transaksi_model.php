<?php

class Transaksi_model
{
    private $table = 'transaksi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addTransaksi()
    {
        $this->db->query("INSERT INTO transaksi VALUES (NULL, tanggal_dibayar = NOW(), bulan_dibayar = :bulan_dibayar, tahun_dibayar = :tahun_dibayar, siswa_id = :siswa_id, petugas_id = :petugas_id, pembayaran_id = :pembayaran_id)");
    }
}
