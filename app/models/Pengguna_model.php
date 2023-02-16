<?php

class Pengguna_model
{
    private $table = 'pengguna';
    private $db;


    public function __construct()
    {
        $this->db = new Database;
    }

    public function deletePengguna($id)
    {
        return $this->db->deleteData($this->table, 'id', $id);
    }
}
