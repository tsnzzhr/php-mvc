<div class="container mt-3">

  <div class="row">
    <div class="col-lg-6">
      <?php Flasher::flash(); ?>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
        Tambah Data Mata Kuliah
      </button>
    </div>
  </div>

  <div class="row mb-3">
    <div class="col-lg-6">
      <form action="<?= BASEURL; ?>/matakuliah/cari" method="post">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="cari MK.." name="keyword" id="keyword" autocomplete="off">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit" id="tombolCari">Cari</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <h3>Daftar Mata Kuliah</h3>
      <ul class="list-group">
        <?php foreach ($data['mata_kuliah'] as $MK) : ?>
          <li class="list-group-item">
            <?= $MK['Nama_MK']; ?>
            <a href="<?= BASEURL; ?>/matakuliah/hapus/<?= $MK['ID_MK']; ?>" class="badge badge-danger float-right" onclick="return confirm('yakin?');">hapus</a>
            <a href="<?= BASEURL; ?>/matakuliah/ubah/<?= $MK['ID_MK']; ?>" class="badge badge-success float-right tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $MK['ID_MK']; ?>">ubah</a>
            <a href="<?= BASEURL; ?>/matakuliah/detail/<?= $MK['ID_MK']; ?>" class="badge badge-primary float-right">detail</a>
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
        <h5 class="modal-title" id="formModalLabel">Tambah Data Mata Kuliah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="<?= BASEURL; ?>/matakuliah/tambah" method="post">
          <input type="hidden" name="id_MK" id="id_MK">
          <div class="form-group">
            <label for="nama_MK">Judul Matakuliah</label>
            <input type="text" class="form-control" id="nama_MK" name="nama_MK" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="lokasi_MK">Lokasi</label>
            <select class="form-control" id="lokasi_MK" name="lokasi_MK">
              <option value="Gedung Informatika | IF-107A">
                Gedung Informatika | IF-107A
              </option>
              <option value="Gedung PWK | PWK-101">
                Gedung PWK | PWK-101
              </option>
              <option value="Gedung UPMB | UPMB-103">
                Gedung UPMB | UPMB-103
              </option>
              <option value="Menara Sains | MS-701">
                Menara Sains | MS-701
              </option>
            </select>
          </div>

          <div class="form-group">
            <label for="waktu_MK">Waktu</label>
            <select class="form-control" id="waktu_MK" name="waktu_MK">
              <option value="07.00 - 09.50">
                07.00 - 09.50
              </option>
              <option value="10.00 - 12.50">
                10.00 - 12.50
              </option>
              <option value="13.00 - 15.50">
                13.00 - 15.50
              </option>
              <option value="16.00 - 18.50">
                16.00 - 18.50
              </option>
            </select>
          </div>

          <div class="form-group">
            <label for="ID_DOSEN">Dosen Pengampu</label>
            <select class="form-control" id="ID_DOSEN" name="ID_DOSEN">
              <?php foreach ($data['dosen'] as $dosen) : ?>
                <option value=<?= $dosen['ID_Dosen'] ?>>
                  <?= $dosen['Nama_Dosen']; ?>
                </option>
              <?php endforeach; ?>
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