<?php

function getCurrentDate()
{
  $month = date('Y-m-d');

  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );

  $result = explode('-', $month);

  return $bulan[(int)$result[1]] . ' ' . $result[0];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Laporan Pengaduan Masyarakat</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lora:700|Montserrat:200,400,600|Pacifico&display=swap" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url() ?>assets/backend/css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    .ml-auto {
      margin-left: auto;
    }
  </style>

</head>

<body id="page-top">

  <style>
    body {
      font-family: Helvetica;
      font-size: 12px;
    }
  </style>

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="">

      <!-- Page Heading -->
      <div class="text-center text-dark">
        <h4 style="font-size: 16px;">Laporan Pengaduan Kekerasan Dinas Pemberdayaan<br>
        Perempuan Perlindungan Anak, Administrasi<br>
        Kependudukan Pencatatan Sipil dan Pengendalian<br>
        Penduduk Keluarga Berencana Provinsi Kepulauan<br>
        Bangka Belitung</h4>
        <h4 style="font-size: 15px;"><?= getCurrentDate(); ?></h4>
      </div>

      <table class="table mt-5">
        <thead class="thead-dark text-center justify-items-center">
          <tr class="">
            <th scope="col">No</th>
            <th scope="col">Nama Korban</th>
            <th scope="col">Tgl Pengaduan</th>
            <th scope="col">Jenis Pengaduan</th>
            <th scope="col">Lokasi Kejadian</th>
            <th scope="col">Kabupaten</th>
            <th scope="col">Isi Laporan</th>
            <th scope="col">Status</th>
            <th scope="col">Tanggapan</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach ($laporan as $l) : ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= $l['nama_korban'] ?></td>
              <td><?= $l['tgl_pengaduan'] ?></td>
              <td><?= $l['jenis_laporan'] ?></td>
              <td><?= $l['lokasi_kejadian'] ?></td>
              <td><?= $l['nama_kabupaten'] ?></td>
              <td><?= $l['isi_laporan'] ?></td>
              <td><span class="badge badge-primary"><?= $l['status'] ?></span></td>
              <td><?= $l['tanggapan'] == null ? '-' : $l['tanggapan']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div class="d-flex flex-row bg-primary">
        <div class="ml-auto text-center">
          <span>Kepala Dinas</span>
          <br>
          <br>
          <br>
          <span>Dr. Asyraf Suryadin, M.Pd <br>NIP: 19660504 199512 1 002</span>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->


  </div>
  <!-- End of Main Content -->

  <!-- Footer -->
  <!-- <footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2019</span>
    </div>
  </div>
</footer> -->
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->


  <script src="<?= base_url() ?>assets/backend/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url() ?>assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url() ?>assets/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url() ?>assets/backend/js/sb-admin-2.min.js"></script>


</body>

</html>