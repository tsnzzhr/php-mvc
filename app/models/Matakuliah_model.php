<?php

class Matakuliah_model
{
    private $table = 'mata_kuliah';
    private $table2 = 'dosen';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatakuliah()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getMatakuliahById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' t1 JOIN '. $this->table2 .
            ' t2 ON t1.ID_DOSEN = t2.ID_Dosen WHERE ID_MK=:id_MK');
        $this->db->bind('id_MK', $id);
        return $this->db->single();
    }

    public function tambahDataMatakuliah($data)
    {

        $query = "INSERT INTO mata_kuliah
                    VALUES
                  (null, :ID_DOSEN, :nama_MK, :lokasi_MK, :waktu_MK)";

        $this->db->query($query);
        $this->db->bind('ID_DOSEN', $data['ID_DOSEN']);
        $this->db->bind('nama_MK', $data['nama_MK']);
        $this->db->bind('lokasi_MK', $data['lokasi_MK']);
        $this->db->bind('waktu_MK', $data['waktu_MK']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMatakuliah($id)
    {
        $query = "DELETE FROM mata_kuliah WHERE id_MK = :id_MK";

        $this->db->query($query);
        $this->db->bind('id_MK', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function ubahDataMatakuliah($data)
    {
        $query = "UPDATE mata_kuliah SET
                    Nama_MK = :nama_MK,
                    Lokasi_MK = :lokasi_MK,
                    Waktu_MK = :waktu_MK
                  WHERE id_MK = :id_MK";

        $this->db->query($query);
        $this->db->bind('nama_MK', $data['nama_MK']);
        $this->db->bind('lokasi_MK', $data['lokasi_MK']);
        $this->db->bind('waktu_MK', $data['waktu_MK']);
        $this->db->bind('id_MK', $data['ID_MK']);

        $this->db->execute();

        return $this->db->rowCount();
    }


    public function cariDataMatakuliah()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mata_kuliah WHERE nama_MK LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
