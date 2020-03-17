<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?php if ($laporan) : ?>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama</th>
					<th scope="col">Nik</th>
					<th scope="col">Laporan</th>
					<th scope="col">Tgl P</th>
					<th scope="col">Status</th>
					<th scope="col">Tanggapan</th>
					<th scope="col">Tgl T</th>
				</tr>
			</thead>
			<tbody>
				
				<?php $no = 1; ?>
				<?php foreach($laporan as $l) : ?>
					<tr>
						<th scope="row"><?= $no++; ?></th>
						<td><?= $l['nama'] ?></td>
						<td><?= $l['nik'] ?></td>
						<td><?= $l['isi_laporan'] ?></td>
						<td><?= $l['tgl_pengaduan'] ?></td>
						<td>
							<?
							if ($l['status'] == '0') :
								echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
							elseif ($l['status'] == 'proses') :
								echo '<span class="badge badge-primary">Sedang di proses</span>';
							elseif ($l['status'] == 'selesai') :
								echo '<span class="badge badge-success">Selesai di kerjakan</span>';
							elseif ($l['status'] == 'tolak') :
								echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
							else :
								echo '-';
							endif;
							?>
						</td>
						<td><?= $l['tanggapan'] == null ? '-' : $l['tanggapan']; ?></td>
						<td><?= $l['tgl_tanggapan'] == null ? '-' : $l['tgl_tanggapan']; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<a target="_blank" href="<?= base_url('Admin/LaporanController/generate_laporan') ?>" class="btn btn-primary mt-2">Preview or Download</a>

		<?php else : ?>
			<p class="text-center">Belum ada data</p>
		<?php endif; ?>
	</div>
        <!-- /.container-fluid -->