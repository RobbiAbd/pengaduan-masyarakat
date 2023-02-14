<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <a href="<?= base_url('Masyarakat/PengaduanController') ?>" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>') ?>
  <?= $this->session->flashdata('msg'); ?>

  <div class="row">
    <div class="col-lg-6">
      <?= form_open_multipart('Masyarakat/PengaduanController/edit/'.$pengaduan['id_pengaduan']); ?>
      <div class="form-group">
        <label for="nama_korban">Nama Korban</label>
        <input name="nama_korban" id="nama_korban" class="form-control" value="<?= $pengaduan['nama_korban'] ?>"></input>
      </div>
      <div class="form-group">
        <label for="hubungan">Hubungan dengan korban</label>
        <input name="hubungan" id="hubungan" class="form-control" value="<?= $pengaduan['hubungan'] ?>"></input>
      </div>
      <div class="form-group">
        <label for="lokasi_kejadian">Lokasi Kejadian</label>
        <input name="lokasi_kejadian" id="lokasi_kejadian" class="form-control" value="<?= $pengaduan['lokasi_kejadian'] ?>"></input>
      </div>
      <div class="form-group">
        <label for="nama_pelaku">Nama Pelaku</label>
        <input name="nama_pelaku" id="nama_pelaku" class="form-control" value="<?= $pengaduan['nama_pelaku'] ?>"></input>
      </div>
      <div class="form-group">
        <label for="isi_laporan">Kronologi Kejadian</label>
        <input type="text" class="form-control" name="isi_laporan" id="isi_laporan" value="<?= $pengaduan['isi_laporan'] ?>">
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

  </div>
  <!-- /.container-fluid -->
