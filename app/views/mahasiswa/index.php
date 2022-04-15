<div class="container mt-3">

    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
          Tambah Data Mahasiswa
        </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="cari mahasiswa.." name="keyword" id="keyword" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  
    <div class="row">
        <div class="col-lg-6">
          <h3>Daftar Mahasiswa</h3>
          <ul class="list-group">
            <?php foreach( $data['mhs'] as $mhs ) : ?>
              <li class="list-group-item">
                  <?= $mhs['nama_mhs']; ?>
                  <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id_mhs']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                  <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $mhs['id_mhs']; ?>" class="badge badge-success float-right tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id_mhs']; ?>">ubah</a>
                  <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id_mhs']; ?>" class="badge badge-primary float-right">detail</a>
              </li>
            <?php endforeach; ?>
          </ul>      
        </div>
    </div>

</div>


<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
          <input type="hidden" name="id_mhs" id="id_mhs">
          <div class="form-group">
            <label for="nama_mhs">Nama</label>
            <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="nrp_mhs">NRP</label>
            <input type="number" class="form-control" id="nrp_mhs" name="nrp_mhs" autocomplete="off">
          </div>

          <div class="form-group">
            <label for="email_mhs">Email</label>
            <input type="email_mhs" class="form-control" id="email_mhs" name="email_mhs" placeholder="email_mhs@example.com">
          </div>

          <div class="form-group">
            <label for="jurusan_mhs">Jurusan</label>
            <select class="form-control" id="jurusan_mhs" name="jurusan_mhs">
              <option value="Teknik Informatika">Teknik Informatika</option>
              <option value="Teknik Mesin">Teknik Mesin</option>
              <option value="Teknik Industri">Teknik Industri</option>
              <option value="Teknik Pangan">Teknik Pangan</option>
              <option value="Teknik Planologi">Teknik Planologi</option>
              <option value="Teknik Lingkungan">Teknik Lingkungan</option>
            </select>
          </div>

      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>




