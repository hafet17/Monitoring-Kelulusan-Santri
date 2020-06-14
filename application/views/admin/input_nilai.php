<div id="message" data-type="<?= $this->session->flashdata('message')['type']; ?>" data-text="<?= $this->session->flashdata('message')['text']; ?>"></div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">

        <h3 class="bg-success text-center p-2 text-light font-weight-bold my-3"><i class="fas fa-database"></i> Input Nilai Santri</h3>

            <!-- DataTales Example -->
            <div class="card shadow mb-4 mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Nilai Santri</h6>
                </div>
                <div class="card-body">
    				<div class="row">
        				<div class="col-md-4">
           					 <?= form_open('admin/input_nilai'); ?>
                				<div class="input-group">
                    				<input type="text" class="form-control" placeholder="Cari Nama ..." name="keyword" value="<?= $keyword; ?>" autocomplete="off" autofocus>
                    				<div class="input-group-append">
                        				<input class="btn btn-primary" type="submit" name="submit">
        							</div>
    							</div>
							</form>
						</div>
					</div>
                    <div class="table-responsive mt-4">
                        <table class="table table-hover table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kamar</th>
                                    <th>Lembaga</th>
                                    <th width="15%">Triwulan 1</th>
                                    <th width="15%">Triwulan 2</th>
                                    <th width="15%">Triwulan 3</th>
                                    <th width="15%">Triwulan 4</th>
                                    <th>Tanggal Input</th>
                                    <th>Tanggal Update</th>
                                    <th>Aksi</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(empty($santri)): ?>
                            <tr><th colspan="12" class="text-center">Tidak ada data untuk ditampilkan</th></tr>
                            <?php endif; ?>
							<?php foreach($santri as $str): ?>
                          	  <tr>
                           			<th><?= ++$start; ?></th>
                                    <th><?= $str['nama_lengkap']; ?></th>
                                    <th><?= $str['kamar']; ?></th>
                                    <th width="20%"><?= $str['lembaga']; ?></th>
                                    <?php $nilai = $this->db->get_where('tb_nilai', ['id_santri' => $str['id']])->row_array(); ?>
									<?php if(is_null($nilai)): ?>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<td>0</td>
									<?php else: ?>
									<td><?= $nilai['jumlah1']; ?></td>
									<td><?= $nilai['jumlah2']?></td>
									<td><?= $nilai['jumlah3']; ?></td>
									<td><?= $nilai['jumlah4']; ?></td>
									<?php endif; ?>
                                     <td>
                                      <?= $nilai['tgl_input']; ?>
                                    </td>
                                    <td>
                                      <?= $nilai['tgl_update']; ?>
                                    </td>
                                    <td>
                                      <a href ="<?= base_url('admin/tambah_nilai/'. $str['id']); ?>" class="btn btn-success text-white btn-md rounded-circle mr-2 float-left btn-add-data"><i class="fas fa-plus"></i></a>
                                      <a href ="<?= base_url('admin/edit_nilai/'. $str['id']); ?>" class="btn btn-primary text-white btn-md rounded-circle mr-2 float-left btn-add-data"><i class="fas fa-edit"></i></a>
                                      <a href ="<?= base_url('admin/delnilai/'. $str['id']); ?>" class="btn btn-danger text-white btn-md rounded-circle mr-2 float-left btn-add-data" onClick="return confirm('Apakah anda yakin?');"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                   
							</tr>
							<?php endforeach; ?>
                    	</tbody>
                    </table>
					<?= $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>

    </div>
</div>
</div>