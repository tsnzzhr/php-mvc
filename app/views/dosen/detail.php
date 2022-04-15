<div class="container mt-5">

    <div class="col">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?= $data['dosen']['Nama_Dosen']; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?= $data['dosen']['ID_Dosen']; ?></h6>
                <p class="card-text"><?= $data['dosen']['Email_Dosen']; ?></p>
                <a href="<?= BASEURL; ?>/dosen" class="card-link">Kembali</a>
            </div>
        </div>
</div>