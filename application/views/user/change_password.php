<div id="message" data-type="<?= $this->session->flashdata('message')['type']; ?>" data-text="<?= $this->session->flashdata('message')['text']; ?>"></div>

<div class="container">
    <div class="row justify-content-center">

        <div class="card col-9">
            <div class="card-header font-weight-bold bg-primary text-light">
                <h4> <i class="fas fa-key"></i> Change Password </h4>
            </div>

            <div class="card mt-2 justify-content-center">

            <form action="<?= base_url('user/change_password') ?>" method="post">
            <div class="form-group">
                <label for="current_password">Current Password</label>
                <input type="password" class="form-control" name="current_password"  id="current_password" placeholder="Masukkan Password Lama">
                <?= form_error('current_password','<small class="text-danger ml-3">', ' </small>'); ?>
            </div>
            <div class="form-group">
                <label for="new_password1">New Password</label>
                <input type="password" class="form-control" name="new_password1"  id="new_password1" placeholder="Masukkan Password Baru">
                <?= form_error('new_password1','<small class="text-danger ml-3">', ' </small>'); ?>
            </div>
            <div class="form-group">
                <label for="new_password2">Repeat Password</label>
                <input type="password" class="form-control" name="new_password2"  id="new_password2" placeholder="Konfirmasi Password">
                <?= form_error('new_password2','<small class="text-danger ml-3">', ' </small>'); ?>
            </div>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-fa fa-key"></i> Change Password</button>
            </div>
        </div>


    </div>
</div>