<?php $i = 0; ?>
<div class="container">
	<h3 class="text-center mt-3 mb-2 font-weight-bold" style="color: black !important;">Daftar Santri I'dadiyah Nurul Jadid <?= date('Y'); ?></h3>
	
	<table style="color: black !important; width: 90% !important; margin-left: -150px !important;" class="mt-4 table" cellspacing="0" cellpadding="0" border="1" bordercolor="#0000">
		<thead class="text-center" style="border: 1px solid black !important;">
			<tr style="border: 1px solid black !important;">
				<th style="border: 1px solid black !important;">No</th>
				<th style="border: 1px solid black !important;">Nama Lengkap</th>
				<th style="border: 1px solid black !important;">Tempat Lahir</th>
				<th style="border: 1px solid black !important;">Tanggal Lahir</th>
				<th style="border: 1px solid black !important;">Lembaga</th>
				<th style="border: 1px solid black !important;">Jurusan</th>
				<th style="border: 1px solid black !important;">Daerah</th>
				<th style="border: 1px solid black !important;">Kamar</th>
				<th style="border: 1px solid black !important;">No Telp.</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($santri as $str): $i++?>
			<tr>
				<th><?= $i; ?></th>
				<td><?= $str['nama_lengkap']; ?></td>
				<td><?= $str['tempat_lahir']; ?></td>
				<td><?= $str['tanggal_lahir']; ?></td>
				<td><?= $str['lembaga']; ?></td>
				<td><?= $str['jurusan']; ?></td>
				<td><?= $str['daerah']; ?></td>
				<td><?= $str['kamar']; ?></td>
				<td><?= $str['telp']; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

</div>