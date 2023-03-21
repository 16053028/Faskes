<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/sidebar');
	$this->load->view('templates/topbar');
 ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('message'); ?>
	<div class="row">
		<div class="col-lg">
			<div class="card shadow mb-4">
			    <div class="card-header py-3">
			      <h6 class="m-0 font-weight-bold text-primary">Form Ganti Password</h6>
			    </div>
			    <div class="card-body">
					<form action="<?= base_url('admin/profile/changepassword') ?>" method="post">
						<div class="col-lg-10 offset-lg-1">
							<div class="form-group">
								<label for="kriteria">Password Lama</label>
								<input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Masukkan Password Lama">
								<?= form_error('password_lama', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="kriteria">Password Baru</label>
								<input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Masukkan Password Baru">
								<?= form_error('password_baru', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="kriteria">Konfirmasi Password</label>
								<input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Ulangi Password Baru">
								<?= form_error('konfirmasi_password', '<small class="text-danger">', '</small>') ?>
							</div>
						 	<hr>
						 	<div class="form-group text-right">
						 		<label></label>
								<button class="btn btn-success">Update</button>
							</div>
						</div>
					</form>
			    </div>
			</div>
		</div>
	</div>
</div>

<?php 
	$this->load->view('templates/footer');
 ?>
