<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <a href="<?= base_url('Admin/PetugasController') ?>" class="btn btn-dark"><i class="fas fa-arrow-left"></i></a>
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>') ?>
  <?= $this->session->flashdata('msg'); ?>

  <div class="row">
    <div class="col-lg-6">

     <?= form_open('Admin/PetugasController/edit/'.$petugas['id_petugas']); ?>

     <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?= $petugas['nama_petugas'] ?>">
    </div>


    <div class="form-group">
      <label for="telp">Telp</label>
      <input type="text" class="form-control" id="telp" placeholder="" name="telp" value="<?= $petugas['telp'] ?>">
    </div>

    <label for="">Level</label>
    <div class="form-group">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="level" id="admin" value="admin" <?= $petugas['level'] == 'admin' ? 'checked' : ''; ?>>
        <label class="form-check-label" for="admin">Admin</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="level" id="petugas" value="petugas" <?= $petugas['level'] == 'petugas' ? 'checked' : ''; ?>>
        <label class="form-check-label" for="petugas">Petugas</label>
      </div>
    </div>

    <div class="form-group">
        <label for="kabupaten"> Kabupaten </label>
        <select name="kabupaten" id="kabupaten" class="form-control"> 
          <option value=""> -- Pilih Kabupaten -- </option>
          <?php foreach( $data_kabupaten as $kabupaten ) : ?>
            <option value="<?= $kabupaten["id_kabupaten"] ?>"> <?= $kabupaten["nama_kabupaten"] ?></option>
          <?php endforeach; ?>
        </select>
        <small class="text-muted"> untuk level admin tidak perlu menginputkan kabupaten </small>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <?= form_close(); ?>
  </div>
</div>

<!-- /.container-fluid -->
</div>