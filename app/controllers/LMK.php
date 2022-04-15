<?php 

class LMK extends Controller {
    public function index()
    {
        $data['judul'] = 'Daftar Mata Kuliah';
        $data['lmk'] = $this->model('LMK_model')->getAllLMK();
        $data['mata_kuliah'] = $this->model('Matakuliah_model')->getAllMatakuliah();
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('lmk/index', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail LMK';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $data['mata_kuliah'] = $this->model('Matakuliah_model')->getAllMatakuliah();
        $data['lmk'] = $this->model('LMK_model')->getLMKById($id);
        $this->view('templates/header', $data);
        $this->view('lmk/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if( $this->model('LMK_model')->tambahDataLMK($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/lmk');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/lmk');
            echo 'GAGAL';
            exit;
        }
    }

    public function hapus($id)
    {
        if( $this->model('LMK_model')->hapusDataLMK($id) > 0 ) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/lmk');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/lmk');
            exit;
        }
    }

    public function getubah()
    {
        echo json_encode($this->model('LMK_model')->getLMKById($_POST['id']));
    }

    public function ubah()
    {
        if( $this->model('LMK_model')->ubahDataLMK($_POST) > 0 ) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/lmk');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASEURL . '/lmk');
            exit;
        } 
    }

    public function cari()
    {
        $data['judul'] = 'Daftar LMK';
        $data['lmk'] = $this->model('LMK_model')->cariDataLMK();
        $this->view('templates/header', $data);
        $this->view('lmk/index', $data);
        $this->view('templates/footer');
    }

}