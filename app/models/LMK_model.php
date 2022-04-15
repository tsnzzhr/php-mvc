<?php

class LMK_model
{
    private $table = 'list_mk';
    private $table2 = 'mata_kuliah';
    private $table3 = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllLMK()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' t1 JOIN ' 
        . $this->table2 . ' t2 ON t1.id_MK = t2.ID_MK' );
        return $this->db->resultSet();
    }

    public function getLMKById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' t1 JOIN ' 
        . $this->table3 . ' t3 ON t1.id_mhs = t3.id_mhs' . ' WHERE id_LMK=:id_LMK');
        $this->db->bind('id_LMK', $id);
        
        return $this->db->resultSet();
        //return $this->db->single();
    }

    public function tambahDataLMK($data)
    {
        $query = "INSERT INTO list_mk
                    VALUES
                  (null, :id_mhs, :id_MK)";

        $this->db->query($query);
        $this->db->bind('id_mhs', $data['id_mhs']);
        $this->db->bind('id_MK', $data['id_MK']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataLMK($id)
    {
        $query = "DELETE FROM list_mk WHERE id_LMK = :id_LMK";

        $this->db->query($query);
        $this->db->bind('id_LMK', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataLMK($data)
    {
        $query = "UPDATE list_mk SET
                    nama_LMK = :nama_LMK,
                    email_LMK = :email_LMK,
                  WHERE id_LMK = :id_LMK";

        $this->db->query($query);
        $this->db->bind('nama_LMK', $data['nama_LMK']);
        $this->db->bind('email_LMK', $data['email_LMK']);
        $this->db->bind('id_LMK', $data['id_LMK']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataLMK()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM list_mk WHERE nama_LMK LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
