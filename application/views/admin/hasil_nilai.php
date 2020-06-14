<?php $u = 0; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">

        <h3 class="bg-success text-center p-2 text-light font-weight-bold my-3"><i class="fas fa-file-signature"></i> Hasil Nilai Santri</h3>
		<a class="btn mt-3 btn-success" href="<?= base_url('export/hasil_nilai_excel'); ?>">Export Data <i class="fas fa-upload ml-2"></i></a>

            <!-- DataTales Example -->
            <div class="card shadow mb-4 mt-3">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Nilai Santri</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="tbl-hasil-nilai" width="100%" cellspacing="0">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kamar</th>
                                    <th>Lembaga</th>
                                    <th>Triwulan</th>
                                    <th>Akidah</th>
                                    <th>Akhlak</th>
                                    <th>Fiqih</th>
                                    <th>Al Qur'an</th>
                                    <th>Jumlah Nilai</th>
                                    <th>Nilai Rata-Rata</th>
                                    <th>Keterangan</th>
                               	</tr>
                           	 </thead>
							<tbody>
							<?php foreach($hasil as $hs): ?>
							<?php $u++; ?>
                            <tr>
                                <th><?= $u; ?></th>
                                <th><?= $hs['nama']; ?></th>
                                <th><?= $hs['kamar']; ?></th>
                                <th><?= $hs['lembaga']; ?></th>
                                <th><?= $hs['triwulan']; ?></th>
                                <th><?= $hs['aqidah']; ?></th>
                                <th><?= $hs['akhlak']; ?></th>
                                <th><?= $hs['fiqih']; ?></th>
                                <th><?= $hs['quran']; ?></th>
                                <th><?= $hs['jumlah']; ?></th>
                                <th><?= $hs['rata_rata']; ?></th>
                                <th><?= $hs['ket']; ?></th>
                   			 </tr>
							<?php endforeach; ?>
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
</div>