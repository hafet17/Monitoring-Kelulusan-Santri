<div class="container">
    <div class="row">
        <div class="col-lg-12">

        <h3 class="bg-success text-center p-2 text-light font-weight-bold my-3"><i class="fas fa-file-alt"></i> Data Nilai Santri</h3>


            <!-- DataTales Example -->
            <div class="card shadow mb-4 mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Nilai Santri</h6>
                </div>
                <div class="card-body">
    				<div class="row">
        				<div class="col-md-4">
           					 <?= form_open('user/nilai_santri'); ?>
                				<div class="input-group">
                    				<input type="text" class="form-control" placeholder="Cari Nama ..." name="keyword" value="<?= $keyword; ?>" autocomplete="off" autofocus>
                    				<div class="input-group-append">
                        				<input class="btn btn-primary" type="submit" name="submit">
        							</div>
    							</div>
							</form>
						</div>
						<div class="col-md-4 text-center">
							<div class="dropdown">
								<button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Export <i class="fas fa-upload ml-2"></i> </button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="<?= base_url('export/laporan_pdf'); ?>">PDF</a>
									<a class="dropdown-item" href="<?= base_url('export/laporan_excel'); ?>">Excel</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
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
                                    <th>Jumlah</th>
                                    <th width="15%">Rata - Rata</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php if(empty($nilai)): ?>
                            <tr><th colspan="12" class="text-center">Tidak ada data untuk ditampilkan</th></tr>
                            <?php endif; ?>
							<?php foreach($nilai as $nl): ?>
                          	  <tr>
                           			<th><?= ++$start; ?></th>
                                    <th><?= $nl['nama_lengkap']; ?></th>
                                    <th><?= $nl['kamar']; ?></th>
                                    <th width="20%"><?= $nl['lembaga']; ?></th>
                                    <th><?= $nl['rata_rata1']; ?> </th>
                                    <th><?= $nl['rata_rata2']; ?> </th>
                                    <th><?= $nl['rata_rata3']; ?> </th>
                         			<th><?= $nl['rata_rata4']; ?></th>
                         			<th><?= $nl['rata_rata1'] + $nl['rata_rata2'] + $nl['rata_rata3'] + $nl['rata_rata4']; ?></th>
                        		 	<th><?= $nl['rata_rata']; ?></th>
                        			<th><?= $nl['keterangan']; ?></th>
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