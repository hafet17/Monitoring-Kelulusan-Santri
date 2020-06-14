<?php
$ttl = explode("-", $santri['tanggal_lahir']);
?>
<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card mt-3">
                <div class="card-header">
                    <h5 class="d-block p-2 bg-primary text-white"> Form Ubah Data Santri</h5>
                </div>
                <div class="card-body">
                    <?= form_open('admin/editsantri/' . $santri['id']); ?>

                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control span5" placeholder="Nama Lengkap" value="<?= $santri['nama_lengkap']; ?>">
                            <small class="text-danger"><?= form_error('nama_lengkap'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control span5" placeholder="Tempat Lahir" value="<?= $santri['tempat_lahir']; ?>">
                            <small class="text-danger"><?= form_error('tempat_lahir'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="tgl">Tanggal Lahir</label>
                            <select name="tgl_lahir" data-v-79790730="" style="padding: 4px 8px; color: rgb(73, 80, 87);">
								<?php for($i = 1; $i <= 31; $i++): ?>
								<?php if($i == $ttl[0]): ?>
								<option value="<?= $i; ?>" selected><?= $i; ?></option>
								<?php else: ?>
								<option value="<?= $i; ?>"><?= $i; ?></option>
								<?php endif; ?>
								<?php endfor; ?>
                            </select>

                            <select name="bln_lahir" style="padding: 4px 8px; color: rgb(73, 80, 87);">
								<?php foreach($bulan as $bl): ?>
								<?php if($bl == $ttl[1]): ?>
								<option value="<?= $bl; ?>" selected><?= $bl; ?></option>
								<?php else: ?>
								<option value="<?= $bl; ?>"><?= $bl; ?></option>
								<?php endif; ?>
								<?php endforeach; ?>
                            </select>

                            <select name="thn_lahir" style="padding: 4px 8px; color: rgb(73, 80, 87);">
                                <?php for($i = date('Y') - 70; $i <= date('Y'); $i++): ?>
								<?php if($i == $ttl[2]): ?>
								<option value="<?= $i; ?>" selected><?= $i; ?></option>
								<?php else: ?>
								<option value="<?= $i; ?>"><?= $i; ?></option>
								<?php endif; ?>
								<?php endfor; ?>
							</select>
							<small class="text-danger"><?= form_error('tgl_lahir'); ?></small>
							<small class="text-danger"><?= form_error('bln_lahir'); ?></small>
							<small class="text-danger"><?= form_error('thn_lahir'); ?></small>
                        </div>


                        <div class="form-group">
                            <label for="lg">Lembaga</label>
                            <select name="lembaga" id="lg" class="form-control form-control-sm" aria-required="false" aria-invalid="false">
                               <?php foreach($lembaga as $lg): ?>
								<?php if($lg['nama_lembaga'] == $santri['lembaga']): ?>
								<option value="<?= $lg['nama_lembaga']; ?>" selected><?= $lg['nama_lembaga']; ?></option>
								<?php else: ?>
								<option value="<?= $lg['nama_lembaga']; ?>"><?= $lg['nama_lembaga']; ?></option>
								<?php endif; ?>
								<?php endforeach; ?>
                            </select>
                            <small class="text-danger"><?= form_error('lembaga'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="jr">Jurusan</label>
                            <select name="jurusan" id="jr" class="form-control form-control-sm" aria-required="false" aria-invalid="false">
                                <option value="<?= $santri['jurusan']; ?>"><?= $santri['jurusan']; ?></option>
                            </select>
                            <small class="text-danger"><?= form_error('jurusan'); ?></small>
                        </div>

                        <!-- Data Daerah -->

                        <div class="form-group">
                            <label for="md">Daerah</label>
                            <select name="daerah" id="md" class="form-control form-control-sm input-daerah" aria-required="false" aria-invalid="false">
								<?php foreach($daerah as $dr): ?>
                                <?php if($dr['nama_daerah'] == $santri['daerah']): ?>
								<option value="<?= $dr['nama_daerah']; ?>" selected><?= $dr['nama_daerah']; ?></option>
								<?php else: ?>
								<option value="<?= $dr['nama_daerah']; ?>"><?= $dr['nama_daerah']; ?></option>
								<?php endif; ?>
								<?php endforeach; ?>
                            </select>
                            <small class="text-danger"><?= form_error('daerah'); ?></small>
                        </div>

                        <div class="form-row align-items-center">
                            <div class="col-auto">
								<select name="kamar" id="kmr" class="form-control form-control-sm input-kamar" aria-required="false" aria-invalid="false">
									<option value="<?= $santri['kamar']; ?>" selected><?= $santri['kamar']; ?></option>
								</select>
								<small class="text-danger"><?= form_error('kamar'); ?></small>
                            </div>
                        </div>

                        <!-- Data Ayah -->
                        <hr>
                        <h4 class="modal-title font-weight-bold" id="myModalLabel">Data Orang Tua</h4>
                        <hr>

                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" name="nama_ayah" id="nama_ayah" class="form-control span5" placeholder="Nama Ayah" value="<?= $santri['nama_ayah']; ?>">
                            <small class="text-danger"><?= form_error('nama_ayah'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan</label>
                            <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control form-control-sm" aria-required="false" aria-invalid="false">
                                <?php foreach($pekerjaan as $pkj): ?>
                                <?php if($pkj == $santri['pekerjaan_ayah']): ?>
								<option value="<?= $pkj; ?>" selected><?= $pkj; ?></option>
								<?php else: ?>
								<option value="<?= $pkj; ?>"><?= $pkj; ?></option>
								<?php endif; ?>
								<?php endforeach; ?>
                            </select>
                            <small class="text-danger"><?= form_error('pekerjaan_ayah'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" name="nama_ibu" id="nama_ibu" class="form-control span5" placeholder="Nama Ibu" value="<?= $santri['nama_ibu']; ?>">
                            <small class="text-danger"><?= form_error('nama_ibu'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan</label>
                            <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control form-control-sm" aria-required="false" aria-invalid="false">
                                 <?php foreach($pekerjaan as $pkj): ?>
                                <?php if($pkj == $santri['pekerjaan_ibu']): ?>
								<option value="<?= $pkj; ?>" selected><?= $pkj; ?></option>
								<?php else: ?>
								<option value="<?= $pkj; ?>"><?= $pkj; ?></option>
								<?php endif; ?>
								<?php endforeach; ?>
                            </select>
                            <small class="text-danger"><?= form_error('pekerjaan_ibu'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="telp">No Telp</label>
                            <input type="text" name="telp" id="telp" class="form-control span5" placeholder="Nama Ibu" value="<?= $santri['telp']; ?>">
                            <small class="text-danger"><?= form_error('telp'); ?></small>
                        </div>

                        <!-- Data Alamat -->
                        <hr>
                        <h4 class="modal-title font-weight-bold" id="myModalLabel">Data Alamat</h4>
                        <hr>
                        <div class="form-group">
                            <label for="editprov">Provinsi</label>
                            <select name="provinsi" id="editprov" class="form-control form-control-sm input-provinsi" aria-required="false" aria-invalid="false">
                                <?php foreach($provinsi as $prov): ?>
                                <?php if($prov['nama'] == $santri['provinsi']): ?>
								<option data-id="<?= $prov['id']; ?>" value="<?= $prov['nama']; ?>" selected><?= $prov['nama']; ?></option>
								<?php else: ?>
								<option data-id="<?= $prov['id']; ?>" value="<?= $prov['nama']; ?>"><?= $prov['nama']; ?></option>
								<?php endif; ?>
								<?php endforeach; ?>
                            </select>
                            <small class="text-danger"><?= form_error('provinsi'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="ml">Kabupaten</label>
                            <select name="kabupaten" id="ml" class="form-control form-control-sm input-kabupaten" aria-required="false" aria-invalid="false">
                                <option value="<?= $santri['kabupaten']; ?>"><?= $santri['kabupaten']; ?></option>
                            </select>
                            <small class="text-danger"><?= form_error('kabupaten'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="mk">Kecamatan</label>
                            <select name="kecamatan" id="mk" class="form-control form-control-sm input-kecamatan" aria-required="false" aria-invalid="false">
                                <option value="<?= $santri['kecamatan']; ?>"><?= $santri['kecamatan']; ?></option>
                            </select>
                            <small class="text-danger"><?= form_error('kecamatan'); ?></small>
                        </div>

                        <div class="form-group">
                            <label for="ma">Desa</label>
                            <select name="desa" id="ma" class="form-control form-control-sm input-desa" aria-required="false" aria-invalid="false">
                                <option value="<?= $santri['desa']; ?>"><?= $santri['desa']; ?></option>
                            </select>
                            <small class="text-danger"><?= form_error('desa'); ?></small>
                        </div>

                        </select>

                        <button type="submit" name="edit" class="btn btn-primary float-right">Simpan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>