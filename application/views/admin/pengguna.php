<div id="message" data-type="<?= $this->session->flashdata('message')['type']; ?>" data-text="<?= $this->session->flashdata('message')['text']; ?>"></div>
<div class="container bg-white mb-3">
  <div class="row">
    <div class="col-lg-12">

	<h3 class="bg-success text-center p-2 text-light font-weight-bold my-3"><i class="fas fa-user-friends"></i> Data Pengguna </h3>
      <!-- Form ERROR -->
      <?php if(validation_errors()): ?>
      <div class="alert alert-danger mb-3 mt-3" role="alert">
        <?= validation_errors(); ?>
      </div>
      <?php endif; ?>
      <!-- Tambah Data -->
      <button class="mt-2 mb-3 btn btn-primary dropdown-toggle" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus-circle"></i> Tambah Data </button>
      <button class="mt-1 btn btn-success float-right" type="button" data-toggle="dropdown" id="dropdownMenu" aria-haspopup="true" aria-expanded="false"><i class="fa fa-upload"></i> Export Data </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu">
        <a class="dropdown-item" href="<?= base_url('export/pengguna_pdf'); ?>">PDF</a>
        <a class="dropdown-item" href="<?= base_url('export/pengguna_excel'); ?>">Excel</a>
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="mt-3 table table-bordered table-striped dataTable" id="tbl-admin-pengguna" data-url="<?= base_url('json/pengguna'); ?>">
      <thead>
        <tr class="bg-primary text-light">
          <th scope="col" class="nosort">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Lembaga</th>
          <th scope="col">Fakultas</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Semester</th>
          <th scope="col">Daerah</th>
          <th scope="col">Kamar</th>
          <th scope="col">User</th>
          <th scope="col">Gambar</th>
          <th scope="col">Status</th>
          <th scope="col">Role</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body font-weight-bold">
      <?= form_open_multipart('admin/pengguna'); ?>
      <div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" id="nama" class="form-control span5" placeholder="Nama" value="<?= set_value('nama'); ?>">
						</div>

						<div class="form-group">
							<label for="lembaga">Lembaga</label>
							<input type="text" name="lembaga" id="lembaga" class="form-control span5" placeholder="Lembaga" value="<?= set_value('lembaga'); ?>">
						</div>

						<div class="form-group">
							<label for="fk">Fakultas</label>
							<select name="fakultas" id="fk" class="form-control form-control-sm input-fakultas" aria-required="false" aria-invalid="false">
								<option value="">Pilih Fakultas</option>
                                <?php foreach($fakultas as $ft): ?>
                                <option data-id="<?= $ft['id']; ?>" value="<?= $ft['nama_fakultas']; ?>"><?= $ft['nama_fakultas']; ?></option>
                                <?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label for="md">Jurusan</label>
							<select name="jurusan" id="md" class="form-control form-control-sm input-jurusan-mhs" aria-required="false" aria-invalid="false">
								<option value="">Pilih Jurusan</option>
							</select>
						</div>

            <div class="form-group">
							<label for="sms">Semester</label>
							<select name="semester" id="sms" class="form-control form-control-sm" aria-required="false" aria-invalid="false">
								<option value="">Pilih Semester</option>
                <option value="01">1</option>
								<option value="02">2</option>
								<option value="03">3</option>
								<option value="04">4</option>
								<option value="05">5</option>
								<option value="06">6</option>
								<option value="07">7</option>
								<option value="08">8</option>
							</select>
						</div>

						<div class="form-group">
							<label for="dr">Daerah</label>
							<select name="daerah" id="dr" class="form-control form-control-sm input-daerah" aria-required="false" aria-invalid="false">
								<option value="">Pilih Daerah</option>
								<?php foreach($daerah as $dr): ?>
								<option data-id="<?= $dr['id']; ?>" value="<?= $dr['nama_daerah']; ?>"><?= $dr['nama_daerah']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>

            <div class="form-group">
							<label for="kr">Kamar</label>
							<select name="kamar" id="kr" class="form-control form-control-sm input-kamar" aria-required="false" aria-invalid="false">
								<option value="">Pilih Kamar</option>
							</select>
						</div>

            <div class="form-group">
							<label for="Username">Username</label>
							<input type="text" name="username" id="Username" class="form-control span5" placeholder="Username" value="<?= set_value('username'); ?>">
						</div>

            <div class="form-group">
							<label for="Password">Password</label>
							<input type="password" name="password" id="Password" class="form-control span5" placeholder="Password" value="<?= set_value('password'); ?>">
						</div>

          <div class="form-group">
          <label for="gambar">Gambar</label>
            <div class="custom-file">
            <input type="file" class="custom-file-input" id="gambar" name="gambar">
            <label class="custom-file-label" for="image">Choose file</label>
          </div>
            </div>

            <div class="form-group">
							<label for="status">Status</label>
							<select name="status" id="status" class="form-control form-control-sm" aria-required="false" aria-invalid="false">
								<option value="1">Aktif</option>
								<option value="2">Nonaktif</option>
							</select>
						</div>

						<div class="form-group">
							<label for="rl">Level</label>
							<select name="role" id="rl" class="form-control form-control-sm" aria-required="false" aria-invalid="false">
								<option value="">Pilih Level</option>
								<?php foreach($role as $rl): ?>
								<option value="<?= $rl['id']; ?>"><?= $rl['role']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" name="add" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
   </div>
 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Pengguna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body font-weight-bold">
      <?= form_open_multipart('admin/pengguna'); ?>
      <div class="form-group">
							<input type="hidden" id="editid" name="id">
							<label for="editnama">Nama</label>
							<input type="text" name="nama" id="editnama" class="form-control span5" placeholder="Nama" value="<?= set_value('nama'); ?>">
						</div>

						<div class="form-group">
							<label for="editlembaga">Lembaga</label>
							<input type="text" name="lembaga" id="editlembaga" class="form-control span5" placeholder="Lembaga" value="<?= set_value('lembaga'); ?>">
						</div>

						<div class="form-group">
							<label for="editfk">Fakultas</label>
							<select name="fakultas" id="editfk" class="form-control form-control-sm input-fakultas" aria-required="false" aria-invalid="false">
								<option value="">Pilih Fakultas</option>
                                <?php foreach($fakultas as $ft): ?>
                                <option data-id="<?= $ft['id']; ?>" value="<?= $ft['nama_fakultas']; ?>"><?= $ft['nama_fakultas']; ?></option>
                                <?php endforeach; ?>
							</select>
						</div>

						<div class="form-group">
							<label for="editmd">Jurusan</label>
							<select name="jurusan" id="editmd" class="form-control form-control-sm input-jurusan-mhs" aria-required="false" aria-invalid="false">
								<option value="">Pilih Jurusan</option>
							</select>
						</div>

            <div class="form-group">
							<label for="editsms">Semester</label>
							<select name="semester" id="editsms" class="form-control form-control-sm" aria-required="false" aria-invalid="false">
							</select>
						</div>

						<div class="form-group">
							<label for="editdr">Daerah</label>
							<select name="daerah" id="editdr" class="form-control form-control-sm input-daerah" aria-required="false" aria-invalid="false">
								<option value="">Pilih Daerah</option>
								<?php foreach($daerah as $dr): ?>
								<option value="<?= $dr['id']; ?>"><?= $dr['nama_daerah']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>

            <div class="form-group">
							<label for="editkr">Kamar</label>
							<select name="kamar" id="editkr" class="form-control form-control-sm input-kamar" aria-required="false" aria-invalid="false">
								<option value="">Pilih Kamar</option>
							</select>
						</div>

            <div class="form-group">
							<label for="editusername">Username</label>
							<input type="text" name="username" id="editusername" class="form-control span5" placeholder="Username" value="<?= set_value('username'); ?>">
						</div>

            <div class="form-group">
							<label for="editpassword">Password</label>
							<input type="password" name="password" id="editpassword" class="form-control span5" placeholder="Password" value="Password">
							<small>Biarkan bila tidak ingin mengubah password</small>
						</div>

          <div class="form-group">
			<img id="imgedit" src="" alt="profile" width="50px">
          <label for="gambar">Gambar</label>
            <div class="custom-file">
            <input type="file" class="custom-file-input" id="gambar" name="gambar">
            <label class="custom-file-label" for="image">Choose file</label>
          </div>
            </div>

            <div class="form-group">
							<label for="editstatus">Status</label>
							<select name="status" id="editstatus" class="form-control form-control-sm" aria-required="false" aria-invalid="false">
								<option value="1">Aktif</option>
								<option value="2">Nonaktif</option>
							</select>
						</div>

						<div class="form-group">
							<label for="editrl">Level</label>
							<select name="role" id="editrl" class="form-control form-control-sm" aria-required="false" aria-invalid="false">
								<option value="">Pilih Level</option>
								<?php foreach($role as $rl): ?>
								<option value="<?= $rl['id']; ?>"><?= $rl['role']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
   </div>
 </div>
</div>
</div>