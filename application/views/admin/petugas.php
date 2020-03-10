<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  </div>') ?>
  <?= $this->session->flashdata('msg'); ?>

  <div class="row">
    <div class="col-lg-6">

     <?= form_open('Admin/PetugasController'); ?>

     <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" class="form-control" id="nama" placeholder="" name="nama" value="<?= set_value('nama') ?>">
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?= set_value('username') ?>"> 
    </div>

    <div class="form-group">
      <label for="password">Passsword</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="">
    </div>
    <div class="form-group">
      <label for="telp">Telp</label>
      <input type="text" class="form-control" id="telp" placeholder="" name="telp">
    </div>

    <label for="">Level</label>
    <div class="form-group">
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="level" id="admin" value="admin">
        <label class="form-check-label" for="admin">Admin</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="level" id="petugas" value="petugas" checked="">
        <label class="form-check-label" for="petugas">Petugas</label>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    <?= form_close(); ?>
  </div>
</div>

<!-- Page Heading -->
<h1 class="h3 mb-4 mt-5 text-gray-800">Data Petugas</h1>

<table class="table table-responsive">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Telp</th>
      <th scope="col">Level</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($data_petugas as $dp) : ?>
      <tr>
        <th scope="row"><?= $no++; ?></th>
        <td><?= $dp['nama_petugas']; ?></td>
        <td><?= $dp['telp']; ?></td>
        <td><?= $dp['level']; ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- /.container-fluid -->
</div>