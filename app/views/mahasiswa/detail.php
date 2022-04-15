<div class="container mt-5">

  <div class="col">
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?= $data['mhs']['nama_mhs']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?= $data['mhs']['nrp_mhs']; ?></h6>
        <p class="card-text"><?= $data['mhs']['email_mhs']; ?></p>
        <p class="card-text"><?= $data['mhs']['jurusan_mhs']; ?></p>
        <a href="<?= BASEURL; ?>/mahasiswa" class="card-link">Kembali</a>
      </div>
    </div>


    <div class="row m-3">
      <div class="col-lg-6">
        <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#formModal">
          Tambah Data Mata Kuliah
        </button>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="container table-responsive py-5">
      <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Matakuliah</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Waktu</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          foreach ($data['selection'] as $LMK) : ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?=$LMK['Nama_MK']?></td>
            <td><?=$LMK['Lokasi_MK']?></td>
            <td><?=$LMK['Waktu_MK']?></td>
            <td>
              <a href="<?= BASEURL; ?>/lmk/hapus/<?= $LMK['id_mhs']; ?>" class="badge badge-danger float-right" onclick="return confirm('Setujui Penghapusan?');">hapus</a>
            </td>
          </tr>
          <?php $i += 1; endforeach; ?>
        </tbody>
      </table>
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

          <form action="<?= BASEURL; ?>/lmk/tambah" method="post">
            <input type="hidden" name="id_mhs" id="id_mhs" value="<?=$data['mhs']['id_mhs']?>">
            
            <div class="form-group">
              <label for="id_MK">Mata Kuliah</label>
              <select class="form-control" id="id_MK" name="id_MK">
                <?php foreach ($data['mata_kuliah'] as $MK) : ?>
                  <option value=<?= $MK['ID_MK'] ?>>
                    <?= $MK['Nama_MK']; ?>
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
</div>