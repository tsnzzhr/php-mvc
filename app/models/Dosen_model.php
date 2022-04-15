<?php

class Dosen_model
{
    private $table = 'dosen';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDosen()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getDosenById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_dosen=:id_dosen');
        $this->db->bind('id_dosen', $id);
        return $this->db->single();
    }

    public function tambahDataDosen($data)
    {
        $query = "INSERT INTO dosen
                    VALUES
                  (null, :nama_dosen, :email_dosen)";

        $this->db->query($query);
        $this->db->bind('nama_dosen', $data['nama_dosen']);
        $this->db->bind('email_dosen', $data['email_dosen']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataDosen($id)
    {
        $query = "DELETE FROM dosen WHERE id_dosen = :id_dosen";

        $this->db->query($query);
        $this->db->bind('id_dosen', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataDosen($data)
    {
        $query = "UPDATE dosen SET
                    nama_dosen = :nama_dosen,
                    email_dosen = :email_dosen,
                  WHERE id_dosen = :id_dosen";

        $this->db->query($query);
        $this->db->bind('nama_dosen', $data['nama_dosen']);
        $this->db->bind('email_dosen', $data['email_dosen']);
        $this->db->bind('id_dosen', $data['id_dosen']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataDosen()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM dosen WHERE nama_dosen LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
