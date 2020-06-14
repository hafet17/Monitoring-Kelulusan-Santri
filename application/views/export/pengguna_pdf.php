<?php $i = 0; ?>
<div class="container">
	<h3 class="text-center mt-3 mb-2 font-weight-bold" style="color: black !important;">Daftar Pengguna Monitoring Kelulusan I'dadiyah Nurul Jadid <?= date('Y'); ?></h3>
	
	<table style="color: black !important; width: 90% !important; margin-left: -150px !important;" class="mt-4 table" cellspacing="0" cellpadding="0" border="1" bordercolor="#0000">
		<thead class="text-center" style="border: 1px solid black !important;">
			<tr style="border: 1px solid black !important;">
				<th style="border: 1px solid black !important;">No</th>
				<th style="border: 1px solid black !important;">Nama</th>
				<th style="border: 1px solid black !important;">Lembaga</th>
				<th style="border: 1px solid black !important;">Fakultas</th>
				<th style="border: 1px solid black !important;">Jurusan</th>
				<th style="border: 1px solid black !important;">Semester</th>
				<th style="border: 1px solid black !important;">Daerah</th>
				<th style="border: 1px solid black !important;">Kamar</th>
				<th style="border: 1px solid black !important;">Username</th>
				<th style="border: 1px solid black !important;">Role ID</th>
				<th style="border: 1px solid black !important;">Status</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($users as $user): $i++?>
			<tr>
				<th><?= $i; ?></th>
				<td><?= $user['nama']; ?></td>
				<td><?= $user['lembaga']; ?></td>
				<td><?= $user['fakultas']; ?></td>
				<td><?= $user['jurusan']; ?></td>
				<td><?= $user['semester']; ?></td>
				<td><?= $user['daerah']; ?></td>
				<td><?= $user['kamar']; ?></td>
				<td><?= $user['username']; ?></td>
				<td><?= $user['role_id']; ?></td>
				<td><?= ($user['is_active'] == 1) ? 'Aktif' : 'Nonaktif'; ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>

</div>