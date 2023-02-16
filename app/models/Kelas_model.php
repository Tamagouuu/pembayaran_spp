<?php

class Kelas_model
{
    private $table = "kelas";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKelas()
    {
        return $this->db->getAllData($this->table);
    }

    public function getKelasByID($id)
    {
        return $this->db->getData($this->table, 'id', $id);
    }

    public function addKelas($data)
    {
        $this->db->query("INSERT INTO {$this->table} VALUES (NULL, :nama, :kompetensi_keahlian)");
        $this->db->bind('nama', $data['nama'])->bind('kompetensi_keahlian', $data['kompetensi_keahlian']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateKelas($data)
    {
        $this->db->query("UPDATE {$this->table} SET nama = :nama, kompetensi_keahlian = :kompetensi_keahlian WHERE id = :id");
        $this->db->bind('nama', $data['nama'])->bind('kompetensi_keahlian', $data['kompetensi_keahlian'])->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteKelas($id)
    {
        return $this->db->deleteData('kelas', 'id', $id);
    }
}
