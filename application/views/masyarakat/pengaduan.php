<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>') ?>
  <?= $this->session->flashdata('msg'); ?>

  <div class="row">
    <div class="col-lg-6">
      <?= form_open_multipart('Masyarakat/PengaduanController'); ?>
      <div class="form-group">
        <label for="nama_korban">Nama Korban</label>
        <input name="nama_korban" id="nama_korban" class="form-control"></input>
      </div>
      <div class="form-group">
        <label for="hubungan">Hubungan Pelapor dengan korban</label>
        <input name="hubungan" id="hubungan" class="form-control"></input>
      </div>
      <div class="form-group">
        <label for="lokasi_kejadian">Lokasi Kejadian</label>
        <input name="lokasi_kejadian" id="lokasi_kejadian" class="form-control"></input>
      </div>
      <div class="form-group">
        <label for="jenis_laporan">Jenis Laporan</label></br>
        <input type="radio" id="jenis_laporan" name="jenis_laporan" value="Kekerasan Dalam Rumah Tangga">
        <label for="html">Kekerasan Dalam Rumah Tangga</label><br>
        <input type="radio" id="jenis_laporan" name="jenis_laporan" value="Hak Asuh Anak">
        <label for="css">Hak Asuh Anak</label><br>
        <input type="radio" id="jenis_laporan" name="jenis_laporan" value="Pelecehan Seksual">
        <label for="javascript">Pelecehan Seksual</label></br>
        <input type="radio" id="jenis_laporan" name="jenis_laporan" value="Pelecehan Verbal/Non Verbal">
        <label for="javascript">Pelecehan Verbal/Non Verbal</label></br>
        <input type="radio" id="jenis_laporan" name="jenis_laporan" value="Pencabulan">
        <label for="javascript">Pencabulan</label></br>
        <input type="radio" id="jenis_laporan" name="jenis_laporan" value="Perdagangan Orang">
        <label for="javascript">Perdagangan Orang</label></br>
        <input type="radio" id="jenis_laporan" name="jenis_laporan" value="Lainnya">
        <label for="javascript">Lainnya</label>
      </div>
      <div class="form-group">
        <label for="nama_pelaku">Nama Pelaku</label>
        <input name="nama_pelaku" id="nama_pelaku" class="form-control"></input>
      </div>
      <div class="form-group">
        <label for="isi_laporan">Kronologi Kejadian</label>
        <textarea name="isi_laporan" id="isi_laporan" cols="30" rows="4" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="foto">Upload Foto</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="foto" name="foto">
          <label class="custom-file-label" for="foto">Choose file</label>
        </div>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      <?php form_close(); ?>

    </div>
  </div>


  <!-- Page Heading -->
  <h1 class="h3 mb-4 mt-5 text-gray-800">Data Pengaduan</h1>
  
  <div class="table-responsive">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Pelapor</th>
        <th scope="col">Nama Korban</th>
        <th scope="col">Hub dgn Korban</th>
        <th scope="col">Jenis Laporan</th>
        <th scope="col">Tgl Melapor</th>
        <th scope="col">Foto</th>
        <th scope="col">Status</th>
        <th scope="col">Lihat Detail</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; ?>
      <?php foreach ($data_pengaduan as $dp) : ?>
        <tr>
          <th scope="row"><?= $no++; ?></th>
          <td><?= $dp['nama']; ?></td>
          <td><?= $dp['nama_korban']; ?></td>
          <td><?= $dp['hubungan']; ?></td>
          <td><?= $dp['jenis_laporan']; ?></td>
          <td><?= $dp['tgl_pengaduan']; ?></td>
          <td>
            <img width="100" src="<?= base_url() ?>assets/uploads/<?= $dp['foto']; ?>" alt="">
          </td>
          <td><?= $dp['status']; ?></td>
          
          <td class="text-center">
            <a href="<?= base_url('Masyarakat/PengaduanController/pengaduan_detail/'.$dp['id_pengaduan']) ?>" class="btn btn-success"><i class="fas fa-fw fa-eye"></i></a>
          </td>

          <?php if ($dp['status'] == 'Diajukan') : ?>
            <td>
              <a href="<?= base_url('Masyarakat/PengaduanController/pengaduan_batal/'.$dp['id_pengaduan']) ?>" class="btn btn-warning">Hapus</a>

              <a href="<?= base_url('Masyarakat/PengaduanController/edit/'.$dp['id_pengaduan']) ?>" class="btn btn-info">Edit</a>
            </td>

            <?php else : ?>
              <td><small>Tidak ada aksi</small></td>
            <?php endif; ?>


          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </div>


  </div>
  <!-- /.container-fluid -->
