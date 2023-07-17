<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

<div class="table-responsive">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIK</th>
      <th scope="col">Nama</th>
      <th scope="col">Username</th>
      <th scope="col">No Telepon</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php $no = 1; ?>
    <?php foreach ($data_masyarakat as $dm) : ?>
      <tr>
        <th scope="row"><?= $no++; ?></th>
        <td><?= $dm['nik_masyarakat']; ?></td>
        <td><?= $dm['nama_masyarakat']; ?></td>
        <td><?= $dm['username']; ?></td>
        <td><?= $dm['telp']; ?></td>
        <td>
        <?php if ($dm['is_verified']) : ?>
          <a href="<?= base_url('Admin/MasyarakatController/status/'. $dm['nik_masyarakat'] ) ?>" class="btn btn-info"> Aktif </a>
        <?php else : ?>
          <a href="<?= base_url('Admin/MasyarakatController/status/'. $dm['nik_masyarakat'] ) ?>" class="btn btn-danger"> Nonaktif </a>
        <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

<!-- /.container-fluid -->
</div>