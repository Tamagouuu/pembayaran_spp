<?php

class Petugas_model
{
    private $db;
    private $table = 'petugas';

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPetugas()
    {
        return $this->db->getAllData($this->table);
    }

    public function getPetugasJoinPengguna()
    {
        return $this->db->getAllData('petugas_join_pengguna');
    }

    public function getPetugasByID($id)
    {
        return $this->db->getData('petugas_join_pengguna', 'id', $id);
    }

    public function addPetugas($data)
    {
        try {
            $this->db->beginTransaction();
            $this->db->query("INSERT INTO pengguna VALUES (NULL, :username, :password, 'petugas')")
                ->bind('username', $data['username'])
                ->bind('password', $data['password'])
                ->execute();
            $pengguna_id = $this->db->getLastInsertedID();
            $this->db->query("INSERT INTO petugas VALUES (NULL, :nama, :pengguna_id)")
                ->bind('nama', $data['nama'])
                ->bind('pengguna_id', $pengguna_id)
                ->execute();
            $this->db->commit();
            return $this->db->rowCount();
        } catch (PDOException $e) {
            $this->db->rollback();
            return false;
        }
    }

    public function updatePetugas($data)
    {
        try {
            $this->db->beginTransaction();
            $rowCount = 0;
            $this->db->query("UPDATE pengguna SET username = :username WHERE id = :pengguna_id")
                ->bind('username', $data['username'])
                ->bind('pengguna_id', $data['pengguna_id'])
                ->execute();
            $rowCount += $this->db->rowCount();
            $this->db->query("UPDATE petugas SET nama = :nama WHERE id = :id")
                ->bind('nama', $data['nama'])
                ->bind('id', $data['id'])
                ->execute();
            $this->db->commit();
            $rowCount += $this->db->rowCount();
            return $rowCount;
        } catch (PDOException $e) {
            $this->db->rollback();
            return false;
        }
    }
}
