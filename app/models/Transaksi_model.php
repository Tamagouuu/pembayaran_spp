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
                ->bind('petugas_id', $_SESSION['id'])
                ->bind('pembayaran_id', $rawData['pembayaran_id'])
                ->execute();
        }
        return $this->db->rowCount();
    }

    public function getBulanTransaksiByIdSiswa($id, $pembayaran_id)
    {
        return $this->db->query("SELECT bulan_dibayar FROM transaksi WHERE siswa_id = :id AND pembayaran_id = :pembayaran_id")
            ->bind('id', $id)
            ->bind('pembayaran_id', $pembayaran_id)
            ->resultSet();
    }

    public function getDetailTransaksiByIdSiswa($id)
    {
        return $this->db->query("SELECT * FROM transaksi WHERE siswa_id = :id")
            ->bind('id', $id)
            ->resultSet();
    }

    public function getTransaksiJoin($id)
    {
        return $this->db->query("SELECT * FROM transaksi_join_petugas_siswa_pembayaran WHERE siswa_id = :id")
            ->bind('id', $id)
            ->resultSet();
    }

    public function getTransaksiFilter($start, $end, $kelas, $jurusan)
    {
        if ($kelas == 'all' && $jurusan == 'all') {
            return $this->db->query("SELECT * FROM transaksi_join WHERE tanggal_bayar >= :start AND tanggal_bayar <= :end")
                ->bind('start', $start)
                ->bind('end', $end)
                ->resultSet();
        } else if ($kelas == 'all' && $jurusan != 'all') {
            return $this->db->query("SELECT * FROM transaksi_join WHERE tanggal_bayar BETWEEN :start AND :end AND kompetensi_keahlian = :jurusan")
                ->bind('start', $start)
                ->bind('end', $end)
                ->bind('jurusan', $jurusan)
                ->resultSet();
        } else if ($jurusan == "all" && $kelas != 'all') {
            return $this->db->query("SELECT * FROM transaksi_join WHERE tanggal_bayar BETWEEN :start AND :end AND nama_kelas = :kelas")
                ->bind('start', $start)
                ->bind('end', $end)
                ->bind('kelas', $kelas)
                ->resultSet();
        } else {
            return $this->db->query("SELECT * FROM transaksi_join_kelas WHERE tanggal_bayar BETWEEN :start AND :end AND nama_kelas = :kelas AND kompetensi_keahlian = :jurusan")
                ->bind('start', $start)
                ->bind('end', $end)
                ->bind('kelas', $kelas)
                ->bind('jurusan', $jurusan)
                ->resultSet();
        }
    }
}
