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

    public function getSiswaByUsername($username)
    {
        return $this->db->query("SELECT * FROM siswa_join_kelas_pengguna_pembayaran WHERE username = :username")
            ->bind('username', $username)
            ->single();
    }

    public function getAllSiswaJoin()
    {
        return $this->db->getAllData('siswa_join_kelas_pengguna_pembayaran');
    }

    public function getSiswaByID($id)
    {
        return $this->db->getData('siswa_join_kelas_pengguna_pembayaran', 'id', $id);
    }

    public function addSiswa($data)
    {
        try {
            $this->db->beginTransaction();
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
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
            $this->db->rollback();
            return false;
        }
    }

    public function updateSiswa($data)
    {
        try {
            $this->db->beginTransaction();
            $rowCount = 0;
            $this->db->query("UPDATE pengguna SET username = :username WHERE id = :id")
                ->bind('username', $data['username'])
                ->bind('id', $data['pengguna_id'])
                ->execute();
            $rowCount += $this->db->rowCount();
            $this->db->query("UPDATE siswa SET nisn = :nisn, nis = :nis, nama = :nama, alamat = :alamat, telepon = :telepon, kelas_id = :kelas_id, pembayaran_id = :pembayaran_id WHERE id = :id")
                ->bind('nisn', $data['nisn'])
                ->bind('nis', $data['nis'])
                ->bind('nama', $data['nama'])
                ->bind('alamat', $data['alamat'])
                ->bind('telepon', $data['telepon'])
                ->bind('kelas_id', $data['kelas_id'])
                ->bind('pembayaran_id', $data['pembayaran_id'])
                ->bind('id', $data['id'])
                ->execute();
            $rowCount += $this->db->rowCount();
            $this->db->commit();
            return $rowCount;
        } catch (PDOException $e) {
            $this->db->rollback();
            return false;
        }
    }
}
