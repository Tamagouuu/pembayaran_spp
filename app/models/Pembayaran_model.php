<?php

class Pembayaran_model
{
    private $db;
    private $table = "pembayaran";


    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPembayaran()
    {
        return $this->db->getAllData($this->table);
    }

    public function getPembayaranByID($id)
    {
        return $this->db->getData($this->table, 'id', $id);
    }

    public function addPembayaran($data)
    {
        $this->db->query("INSERT INTO {$this->table} VALUES (NULL, :tahun_ajaran, :nominal)");
        $this->db->bind('tahun_ajaran', $data['tahun_ajaran'])->bind('nominal', $data['nominal']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePembayaran($id)
    {
        return $this->db->deleteData($this->table, 'id', $id);
    }

    public function updatePembayaran($data)
    {
        $this->db->query("UPDATE {$this->table} SET tahun_ajaran = :tahun_ajaran, nominal = :nominal WHERE id = :id");
        $this->db->bind('tahun_ajaran', $data['tahun_ajaran'])->bind('nominal', $data['nominal'])->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
