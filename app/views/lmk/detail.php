<div class="col">
    <div class="container table-responsive py-5">
      <table class="table table-bordered table-hover">
        <thead class="thead-dark">
          <tr>
            <th scope="col">No</th>
            <th scope="col">NRP</th>
            <th scope="col">Nama Mahasiswa</th>
            <th scope="col">Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i = 1;
          foreach ($data['lmk'] as $LMK) : ?>
          <tr>
            <th scope="row"><?= $i ?></th>
            <td><?=$LMK['nrp_mhs']?></td>
            <td><?=$LMK['nama_mhs']?></td>
            <td>
              <a href="<?= BASEURL; ?>/lmk/hapus/<?= $LMK['id_mhs']; ?>" class="badge badge-danger float-right" onclick="return confirm('Setujui Penghapusan?');">hapus</a>
            </td>
          </tr>
          <?php $i += 1; endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>