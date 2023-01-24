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
						<td><span class="badge badge-primary"><?= $l['status'] ?></span></td>
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