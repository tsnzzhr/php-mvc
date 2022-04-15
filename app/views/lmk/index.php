<div class="container mt-3">

    <div class="row">
      <div class="col-lg-6">
        <?php Flasher::flash(); ?>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
          Tambah Data LMK
        </button>
      </div>
    </div>

    <div class="row mb-3">
      <div class="col-lg-6">
        <form action="<?= BASEURL; ?>/lmk/cari" method="post">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="cari LMK.." name="keyword" id="keyword" autocomplete="off">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  
    <div class="row">
        <div class="col-lg-6">
          <h3>Daftar LMK</h3>
          <ul class="list-group">
            <?php foreach( $data['lmk'] as $LMK ) : ?>
              <li class="list-group-item">
                  <?= $LMK['Nama_MK']; ?>
                  <a href="<?= BASEURL; ?>/lmk/hapus/<?= $LMK['id_LMK']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
                  <a href="<?= BASEURL; ?>/lmk/ubah/<?= $LMK['id_LMK']; ?>" class="badge badge-success float-right tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $LMK['id_LMK']; ?>">ubah</a>
                  <a href="<?= BASEURL; ?>/lmk/detail/<?= $LMK['id_LMK']; ?>" class="badge badge-primary float-right">detail</a>
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
        <h5 class="modal-title" id="formModalLabel">Tambah Data LMK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form action="<?= BASEURL; ?>/lmk/tambah" method="post">
          <input type="hidden" name="id_LMK" id="id_LMK">
          <div class="form-group">
            <label for="nama_LMK">Nama</label>
            <input type="text" class="form-control" id="nama_LMK" name="nama_LMK" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="email_LMK">Email</label>
            <input type="email_LMK" class="form-control" id="email_LMK" name="email_LMK" placeholder="email_LMK@example.com">
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




