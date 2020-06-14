<div id="message" data-type="<?= $this->session->flashdata('message')['type']; ?>" data-text="<?= $this->session->flashdata('message')['text']; ?>"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">

        <h3 class="bg-success text-center p-2 text-light font-weight-bold my-3"><i class="fas fa-database"></i> Data Santri </h3>
            <!-- Tambah Data -->
    <button class="mt-1 btn btn-primary" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus-circle"></i> Tambah Data </button>
            <button class="mt-1 btn btn-success float-right" type="button" data-toggle="dropdown" id="dropdownMenu" aria-haspopup="true" aria-expanded="false"><i class="fa fa-upload"></i> Export Data </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
              <a class="dropdown-item" href="<?= base_url('export/santri_pdf'); ?>">PDF</a>
              <a class="dropdown-item" href="<?= base_url('export/santri_all_excel'); ?>">Excel</a>
            </div>
			<?php if(validation_errors()): ?>
 	       <div class="alert alert-danger mb-3 mt-3" role="alert">
    		    <?= validation_errors(); ?>
   		   </div>
    	  <?php endif; ?>

            <!-- DataTales Example -->
            <div class="card shadow mb-4 mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Santri</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dataTable" id="table-admin-santri" width="100%" cellspacing="0" data-url="<?= base_url('json/santri'); ?>">
                            <thead>
                                <tr class="bg-primary text-light">
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Lembaga</th>
                                    <th>Jurusan</th>
                                    <th>Daerah</th>
                                    <th>Kamar</th>
                                    <th>Nama Ayah</th>
                                    <th>Pekerjaan Ayah</th>
                                    <th>Nama Ibu</th>
                                    <th>Pekerjaan Ibu</th>
                                    <th>No Telp</th>
                                    <th>Provinsi</th>
                                    <th>Kabupaten</th>
                                    <th>Kecamatan</th>
                                    <th>Desa</th>
                                    <th>Tanggal Input</th>
                                    <th>Tanggal Update</th>
                                    <th>Aksi</th>
                                   
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
						<?= form_open('admin/data_santri'); ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Santri</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body font-weight-bold">

                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control span5" placeholder="Nama Lengkap">
                            </div>

                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control span5" placeholder="Tempat Lahir">
                            </div>

                            <div class="form-group">
                                <label name="tanggal_lahir" for="tgl">Tanggal Lahir</label>
                                <select name="tgl_lahir" data-v-79790730="" style="padding: 4px 8px; color: rgb(73, 80, 87);">
                                    <option data-v-79790730="" value="00">Tanggal</option>
									<?php for($i = 1; $i <= 31; $i++): ?>
									<option value="<?= $i; ?>"><?= $i; ?></option>
									<?php endfor; ?>
                                </select>

                                <select name="bln_lahir" data-v-79790730="" style="padding: 4px 8px; color: rgb(73, 80, 87);">
                                        <option data-v-79790730="">Bulan</option>
                                        <?php foreach($bulan as $bln): ?>
                                        <option value="<?= $bln; ?>"><?= $bln; ?>	</option>
                                        <?php endforeach; ?>
                                    </select>

                                    <select name="thn_lahir" data-v-79790730="" style="padding: 4px 8px; color: rgb(73, 80, 87);">
                                            <option data-v-79790730="">Tahun</option>
                                            <?php for($i = date('Y') - 70; $i <= date('Y'); $i++): ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                            <?php endfor; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="lg">Lembaga</label>
                                <select name="lembaga" id="lg" class="form-control form-control-sm input-lembaga" aria-required="false" aria-invalid="false">
                                    <option value="">Pilih Lembaga</option>
									<?php foreach($lembaga as $lg): ?>
									<option data-id="<?= $lg['id']; ?> value="<?= $lg['nama_lembaga']; ?>"><?= $lg['nama_lembaga']; ?></option>
									<?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="js">Jurusan</label>
                                <select name="jurusan" id="js" class="form-control form-control-sm input-jurusan" aria-required="false" aria-invalid="false">
                                    <option value="">Pilih Jurusan</option>
                                </select>
							</div>

                            <!-- Data Daerah -->

                            <div class="form-group">
                                <label for="dr">Daerah</label>
                                <select name="daerah" id="dr" class="form-control form-control-sm input-daerah" aria-required="false" aria-invalid="false">
                                    <option value="">Pilih Daerah</option>
									<?php foreach($daerah as $dr): ?>
									<option data-id="<?= $dr['id']; ?>" value="<?= $dr['nama_daerah']; ?>"><?= $dr['nama_daerah']; ?></option>
									<?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-row align-items-center">
                                <div class="col-auto">
									<select name="kamar" id="kr" class="form-control form-control-sm input-kamar" aria-required="false" aria-invalid="false">
                                        <option value="">Pilih Kamar</option>
                                    </select>
                                    <div class="invalid-feedback" style="display: none;"></div>
                                </div>
                            </div>

                            <!-- Data Ayah -->
                            <hr>
                            <h4 class="modal-title font-weight-bold" id="myModalLabel">Data Orang Tua</h4>
                            <hr>

                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" name="nama_ayah" id="nama_ayah" class="form-control span5" placeholder="Nama Ayah">
                            </div>

                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan</label>
                                <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control form-control-sm" aria-required="false" aria-invalid="false">
                                    <option value="">Pilih Pekerjaan</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Progammer/Hacker">Progammer/Hacker</option>
                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                    <option value="Pensiun">Pensiun</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" name="nama_ibu" id="nama_ibu" class="form-control span5" placeholder="Nama Ibu">
                            </div>

                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan</label>
                                <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control form-control-sm" aria-required="false" aria-invalid="false">
                                    <option value="">Pilih Pekerjaan</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Pedagang">Pedagang</option>
                                    <option value="Nelayan">Nelayan</option>
                                    <option value="Wirausaha">Wirausaha</option>
                                    <option value="Buruh">Buruh</option>
                                    <option value="Petani">Petani</option>
                                    <option value="Karyawan Swasta">Karyawan Swasta</option>
                                    <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                    <option value="Progammer">Progammer/Hacker</option>
                                    <option value="PNS/TNI/POLRI">PNS/TNI/POLRI</option>
                                    <option value="Pensiun">Pensiun</option>
                                    <option value="Lain-lain">Lain-lain</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="telp">No Telp</label>
                                <input type="text" name="telp" id="telp" class="form-control span5 no_kk" placeholder="No Telp" maxlength="16">
                            </div>

                            <!-- Data Alamat -->
                             <hr>
                            <h4 class="modal-title font-weight-bold" id="myModalLabel">Data Alamat</h4>
                            <hr>
                            <div class="form-group">
                                <label for="prov">Provinsi</label>
                                <select name="provinsi" id="prov" class="form-control form-control-sm input-provinsi" aria-required="false" aria-invalid="false">
                                    <option value="">Pilih Provinsi</option>
                                    <?php foreach($provinsi as $prov): ?>
                                    <option data-id="<?= $prov['id']; ?>" value="<?= $prov['nama']; ?>"><?= $prov['nama']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kab">Kabupaten</label>
                                <select name="kabupaten" id="kab" class="form-control form-control-sm input-kabupaten" aria-required="false" aria-invalid="false">
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kec">Kecamatan</label>
                                <select name="kecamatan" id="kec" class="form-control form-control-sm input-kecamatan" aria-required="false" aria-invalid="false">
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="des">Desa</label>
                                <select name="desa" id="des" class="form-control form-control-sm input-desa" aria-required="false" aria-invalid="false">
                                    <option value="">Pilih Desa</option>
                                </select>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                                <button type="submit" name="add" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
					</form>
                </div>
            </div>
        </div>