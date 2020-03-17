<!-- Begin Page Content -->
<div class="container-fluid mb-2">

  <!-- Page Heading -->
  <a href="<?= base_url('Admin/TanggapanController') ?>" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>') ?>
  <?= $this->session->flashdata('msg'); ?>

  <div class="card no-border mb-3 col-lg-8">
    <div class="justify-content-center">
      <div class="">
        <h3 class="mt-2 mb-2"></h3>
      </div>
    </div>
    <div class="row no-gutters">
      <div class="col-md-6 text-center">
        <img src="<?= base_url() ?>assets/uploads/<?= $data_pengaduan['foto'] ?>" alt="" class="mt-2 mb-2" width="250">
      </div>

      <div class="col-md-6">
        <div class="card-body">
          <h5 class="card-title">Tgl Pengaduan : <?= $data_pengaduan['tgl_pengaduan']; ?></h5>
          <p class="card-text">Status : <?= $data_pengaduan['status'] == 0 ? 'Belum di verifikasi' : ''; ?></p>
          <p class="card-text"><small class="text-muted">Laporan : <?= $data_pengaduan['isi_laporan'] ?></small></p>
        </div>
      </div>
    </div>
  </div>


  <h1 class="h3 mb-4 text-gray-800">Masukan Tanggapan Anda</h1>

  <div class="row">
    <div class="col-lg-6">

     <?= form_open('Admin/TanggapanController/tambah_tanggapan'); ?>

     <input type="hidden" name="id" value="<?= $data_pengaduan['id_pengaduan']; ?>">

     <label for="">Status Tanggapan</label>
     <div class="form-group">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="status-setuju" value="proses" checked="">
        <label class="form-check-label" for="status-setuju">Setuju</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="status-tolak" value="tolak">
        <label class="form-check-label" for="status-tolak">Tolak</label>
      </div>
    </div>

    <div class="form-group">
      <label for="tanggapan">Tanggapan</label>
      <textarea name="tanggapan" class="form-control" id="tanggapan" cols="30" rows="10"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <?= form_close(); ?>
  </div>
</div>

<!-- /.container-fluid -->
</div>