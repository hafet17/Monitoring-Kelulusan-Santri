
<div class="container">
    <div class="row justify-content-center">

        <div class="card col-10">
            <div class="card-header font-weight-bold bg-primary text-light">
                <h4>Profile <?= $user['nama']; ?> </h4>
            </div>
            <div class="card mt-2" style="width: 55,5rem;">
                <ul class="list-group list-group-flush font-weight-bold">
                    <li class="list-group-item">* Nama Lengkap : <?= $user['nama']; ?> </li>
                    <li class="list-group-item">* Lembaga : <?= $user['lembaga']; ?> </li>
                    <li class="list-group-item">* Fakultas :  <?= $user['fakultas']; ?></li>
                    <li class="list-group-item">* Jurusan :  <?= $user['jurusan']; ?></li>
                    <li class="list-group-item"> * Gambar :
                       <img class="img-fluid" width="100px"  src="<?= base_url('').'assets/images/users/' . $user['gambar']; ?>"  alt="Card image cap">
                   </li>
                    <li class="list-group-item">* Semester :  <?= $user['semester']; ?></li>
                    <li class="list-group-item">* Daerah :  <?= $user['daerah']; ?></li>
                    <li class="list-group-item">* Kamar :  <?= $user['kamar']; ?></li>
                    <li class="list-group-item">* Status :  Admin</li>
                    </ul>
            </div>
        </div>

    </div>
</div>
</div>