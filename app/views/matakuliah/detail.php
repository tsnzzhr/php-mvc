<div class="container mt-5">

    <div class="col">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-title"><?= $data['mata_kuliah']['Nama_MK']; ?></h4>
                <h5 class="card-subtitle mb-2"><?= $data['mata_kuliah']['Nama_Dosen']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $data['mata_kuliah']['Waktu_MK']; ?></h6>
                <p class="card-text"><?= $data['mata_kuliah']['Lokasi_MK']; ?></p>
                <a href="<?= BASEURL; ?>/matakuliah" class="card-link">Kembali</a>
            </div>
        </div>
    </div>
</div>