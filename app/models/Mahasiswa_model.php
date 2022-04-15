<?php

class Mahasiswa_model
{
    private $table = 'mahasiswa';
    private $table2 = 'mata_kuliah';
    private $table3 = 'list_mk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMatkulByMahasiswa($id){
        $this->db->query('SELECT * FROM ((' . $this->table . ' t1 JOIN ' . 
            $this->table3 . ' t3 ON t1.id_mhs = t3.id_mhs ) JOIN ' . $this->table2 .
            ' t2 ON t2.ID_MK = t3.id_MK) WHERE t3.id_mhs=:id_mhs');
        $this->db->bind('id_mhs', $id);
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_mhs=:id_mhs');
        $this->db->bind('id_mhs', $id);
        return $this->db->single();
    }

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa
                    VALUES
                  (null, :nama_mhs, :nrp_mhs, :email_mhs, :jurusan_mhs)";

        $this->db->query($query);
        $this->db->bind('nama_mhs', $data['nama_mhs']);
        $this->db->bind('nrp_mhs', $data['nrp_mhs']);
        $this->db->bind('email_mhs', $data['email_mhs']);
        $this->db->bind('jurusan_mhs', $data['jurusan_mhs']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id)
    {
        $query = "DELETE FROM mahasiswa WHERE id_mhs = :id_mhs";

        $this->db->query($query);
        $this->db->bind('id_mhs', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET
                    nama_mhs = :nama_mhs,
                    nrp_mhs = :nrp_mhs,
                    email_mhs = :email_mhs,
                    jurusan_mhs = :jurusan_mhs
                  WHERE id_mhs = :id_mhs";

        $this->db->query($query);
        $this->db->bind('nama_mhs', $data['nama_mhs']);
        $this->db->bind('nrp_mhs', $data['nrp_mhs']);
        $this->db->bind('email_mhs', $data['email_mhs']);
        $this->db->bind('jurusan_mhs', $data['jurusan_mhs']);
        $this->db->bind('id_mhs', $data['id_mhs']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMahasiswa()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama_mhs LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
