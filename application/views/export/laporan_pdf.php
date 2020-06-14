<?php $i = 0; ?>
<div class="container">
	<h3 class="text-center mt-3 mb-2 font-weight-bold" style="color: black !important;">Laporan kelulusan santri I'dadiyah Nurul Jadid <?= date('Y'); ?></h3>
	
	<table style="color: black !important; width: 90% !important; margin-left: -150px !important;" class="mt-4 table" cellspacing="0" cellpadding="0" border="1" bordercolor="#0000">
		<thead class="text-center" style="border: 1px solid black !important;">
			<tr style="border: 1px solid black !important;">
				<th style="border: 1px solid black !important;">No</th>
				<th style="border: 1px solid black !important;">Nama Lengkap</th>
				<th style="border: 1px solid black !important;">Kamar</th>
				<th style="border: 1px solid black !important;">Lembaga</th>
				<th style="border: 1px solid black !important;">Triwulan 1</th>
				<th style="border: 1px solid black !important;">Triwulan 2</th>
				<th style="border: 1px solid black !important;">Triwulan 3</th>
				<th style="border: 1px solid black !important;">Triwulan 4</th>
				<th style="border: 1px solid black !important;">Jumlah</th>
				<th style="border: 1px solid black !important;">Rata-Rata</th>
				<th style="border: 1px solid black !important;">Keterangan</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($santri as $str): $i++?>
			<tr>
				<th><?= $i; ?></th>
				<td><?= $str['nama_lengkap']; ?></td>
				<td><?= $str['kamar']; ?></td>
				<td><?= $str['lembaga']; ?></td>
				<td><?= $str['rata_rata1']; ?></td>
				<td><?= $str['rata_rata2']; ?></td>
				<td><?= $str['rata_rata3']; ?></td>
				<td><?= $str['rata_rata4']; ?></td>
				<td><?= $str['jumlah1'] + $str['jumlah2'] + $str['jumlah3'] + $str['jumlah4']; ?></td>
				<td><?= $str['rata_rata']; ?></td>
				<td><?= $str['keterangan']; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

</div>