<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<a href="<?= base_url('Masyarakat/PengaduanController') ?>" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">

	</div>

	<div class="card mb-3 col-lg-8">
		<div class="row no-gutters">
			<div class="col-md-4 mt-2 ml-2">
				<img src="<?= base_url('assets/uploads/'.$data_pengaduan['foto']) ?>" class="card-img" alt="img user">
			</div>
			<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title">Laporan : <span class="text-dark"><?= $data_pengaduan['isi_laporan'] ?></span></h5>
					
					<p class="card-text"> Status :
						<?php 
						if ($data_pengaduan['status'] == '0') :
							echo '<span class="badge badge-secondary">Sedang di verifikasi</span>';
						elseif ($data_pengaduan['status'] == 'proses') :
							echo '<span class="badge badge-primary">Sedang di proses</span>';
						elseif ($data_pengaduan['status'] == 'selesai') :
							echo '<span class="badge badge-success">Selesai di kerjakan</span>';
						elseif ($data_pengaduan['status'] == 'tolak') :
							echo '<span class="badge badge-danger">Pengaduan di tolak</span>';
						else :
							echo '-';
						endif;
						?>
					</p>

					<p class="card-text">Tanggapan : <span class="text-success"><?= $data_pengaduan['tanggapan'] ?></span></p>

					<p class="card-text">Tgl Pengaduan : <span class="text-danger"><?= $data_pengaduan['tgl_pengaduan'] ?></span></p>
					<p class="card-text">Tgl Tanggapan : <span class="text-danger"><?= $data_pengaduan['tgl_tanggapan'] ?></span></p>
					
					
				</div>
			</div>
		</div>
	</div>

</div>
        <!-- /.container-fluid