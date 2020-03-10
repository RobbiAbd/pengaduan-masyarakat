<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?= validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">','<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	</div>') ?>
	<?= $this->session->flashdata('msg'); ?>

	<!-- Carousel -->
	<div id="carouselExampleFade" class="carousel slide carousel-fade bg-light mb-4" data-ride="carousel">
		<div class="container">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="row d-flex">
						<div class="col-lg-5">
							<?= form_open('Auth/ChangePasswordController') ?>
							<div class="form-group">
								<label for="current_password">Password Sekarang</label>
								<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter Current Password">
								
							</div>
							<div class="form-group">
								<label for="new_password">Password Baru</label>
								<input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password">
							</div>
							<div class="form-group">
								<label for="confirm_password">Konfirmasi Password Baru</label>
								<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Confirm New Password" aria-describedby="currentPasswordHelp">
								<small id="currentPasswordHelp" class="form-text text-muted">Jangan pernah beritahukan password kepada siapapun.</small>
							</div>
							<div class="custom-control custom-checkbox mb-2">
								<input type="checkbox" class="custom-control-input" id="check_confirmation_password" name="confirmation_password" value="agree">
								<label class="custom-control-label" for="check_confirmation_password">Anda yakin mengganti Password ?</label>
							</div>
							<button type="submit" class="btn btn-primary">Simpan Perubahan</button>
							<?= form_close(); ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Carousel -->

</div>
        <!-- /.container-fluid -->