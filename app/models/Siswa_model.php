<?php

class Siswa_model
{
    private $table = 'siswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllSiswa()
    {
        $this->db->getAllData('siswa');
    }

    public function getAllSiswaJoin()
    {
        return $this->db->getAllData('siswa_join_kelas_pengguna_pembayaran');
    }

    public function addSiswa($data)
    {
        try {
            $this->db->beginTransaction();
            $this->db->query("INSERT INTO pengguna VALUES (NULL,:username, :password, 'siswa')")
                ->bind('username', $data['username'])
                ->bind('password', $data['password'])
                ->execute();
            $pengguna_id = $this->db->getLastInsertedID();
            $this->db->query("INSERT INTO siswa VALUES (NULL,:nisn,:nis,:nama,:alamat,:telepon,:kelas_id,:pengguna_id,:pembayaran_id)")
                ->bind('nis', $data['nis'])
                ->bind('nisn', $data['nisn'])
                ->bind('nama', $data['nama'])
                ->bind('alamat', $data['alamat'])
                ->bind('telepon', $data['telepon'])
                ->bind('kelas_id', $data['kelas_id'])
                ->bind('pengguna_id', $pengguna_id)
                ->bind('pembayaran_id', $data['pembayaran_id'])
                ->execute();
            $this->db->commit();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            die;
            $this->db->rollback();
            return false;
        }
    }
}
