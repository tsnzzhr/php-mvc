<div class="container mt-3">

    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
          Tambah Data Dosen
        </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/dosen/cari" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="cari dosen.." name="keyword" id="keyword" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  
    <div class="row">
        <div class="col-lg-6">
          <h3>Daftar Dosen</h3>
          <ul class="list-group">
            <?php foreach( $data['dosen'] as $dosen ) : ?>
              <li class="list-group-item">
                  <?= $dosen['Nama_Dosen']; ?>
                  <a href="<?= BASEURL; ?>/dosen/hapus/<?= $dosen['ID_Dosen']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                  <a href="<?= BASEURL; ?>/dosen/ubah/<?= $dosen['ID_Dosen']; ?>" class="badge badge-success float-right tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $dosen['id_dosen']; ?>">ubah</a>
                  <a href="<?= BASEURL; ?>/dosen/detail/<?= $dosen['ID_Dosen']; ?>" class="badge badge-primary float-right">detail</a>
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
        <h5 class="modal-title" id="formModalLabel">Tambah Data Dosen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/dosen/tambah" method="post">
          <input type="hidden" name="id_dosen" id="id_dosen">
          <div class="form-group">
            <label for="nama_dosen">Nama</label>
            <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="email_dosen">Email</label>
            <input type="email_dosen" class="form-control" id="email_dosen" name="email_dosen" placeholder="email_dosen@example.com">
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




