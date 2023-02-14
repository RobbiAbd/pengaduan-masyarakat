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
          <h5 class="card-title">Laporan Pengaduan</h5>
          <p class="card-text">
            Tgl Pengaduan : <span class="text-danger"><?= $data_pengaduan['tgl_pengaduan'] ?></span><br>
            Tgl Tanggapan : <span class="text-danger"><?= $data_pengaduan['tgl_tanggapan'] ?></span><br>
            Status : <span class="badge badge-secondary"><?= $data_pengaduan['status'] ?></span><br>
            Tanggapan : <span class="text-success"><?= $data_pengaduan['tanggapan'] ?></span><br>
          </p>
          <p class="card-text">
            Nama Pelaku : <span class="text-dark"><?= $data_pengaduan['nama_pelaku'] ?></span><br>
            Nama Korban : <span class="text-dark"><?= $data_pengaduan['nama_korban'] ?></span><br>
            Hub dgn Korban : <span class="text-dark"><?= $data_pengaduan['hubungan'] ?></span><br>
            Lokasi Kejadian : <span class="text-dark"><?= $data_pengaduan['lokasi_kejadian'] ?></span><br>
            Jenis Laporan : <span class="text-dark"><?= $data_pengaduan['jenis_laporan'] ?></span><br>
            Kronologi : <span class="text-dark"><?= $data_pengaduan['isi_laporan'] ?></span><br>
          </p>
        </div>
      </div>
    </div>
  </div>

</div>
        <!-- /.container-fluid