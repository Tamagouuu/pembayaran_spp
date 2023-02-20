<?php

class Transaksi_model
{
    private $table = 'transaksi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addTransaksi($data)
    {
        $rawData = $data;
        unset($data['pembayaran_id']);
        unset($data['siswa_id']);
        foreach ($data as $d) {
            $this->db->query("INSERT INTO transaksi VALUES (NULL, NOW(), :bulan_dibayar, :tahun_dibayar, :siswa_id,:petugas_id, :pembayaran_id)")
                ->bind('bulan_dibayar', $d['bulan'])
                ->bind('tahun_dibayar', $d['tahun'])
                ->bind('siswa_id', $rawData['siswa_id'])
                ->bind('petugas_id', 10)
                ->bind('pembayaran_id', $rawData['pembayaran_id'])
                ->execute();
        }
        return $this->db->rowCount();
    }

    public function getTransaksiByIdSiswa($id)
    {
        return $this->db->query("SELECT bulan_dibayar FROM transaksi WHERE siswa_id = :id")
            ->bind('id', $id)
            ->resultSet();
    }
}