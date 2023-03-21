<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/sidebar');
	$this->load->view('templates/topbar');
 ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="row">
		<div class="col-lg">
			<div class="card shadow mb-4">
			    <div class="card-header py-3">
			      <h6 class="m-0 font-weight-bold text-primary">Form Ganti Password</h6>
			    </div>
			    <div class="card-body">
					<form action="<?= base_url('admin/profile/update/'.$user['id_user']) ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
						<div class="row">
							<div class="col-lg-10 offset-lg-1">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
										    <label for="nama">Nama</label>
										    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $user['nama'] ?>">
										    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
										</div>	
									</div>
									<div class="col-lg-6">
										<div class="form-group">
										    <label for="exampleFormControlInput1">Username</label>
										    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?= $user['username']?>">
										    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
									  	</div>	
									</div>
								</div>
						  		<div class="form-group">
								    <label for="exampleFormControlFile1">Foto</label>
								    <div class="row">
									  	<div class="col-3">
									    	<img src="<?= base_url('assets/img/profile/'.$user['foto']) ?>" class="img-thumbnail">
									  	</div>
									  	<div class="col-9">
										    <div class="custom-file">
											  <input type="file" class="custom-file-input" id="foto" name="foto">
											  <label class="custom-file-label" for="customFile">Pilih file</label>
											  <?php if ($this->session->flashdata('message')): ?>
											  	<small class="text-danger"><?= $this->session->flashdata('message') ?></small>
											  <?php endif ?>
											</div>
									  	</div>
									</div>
						  		</div>
						  		<hr>
							 	<div class="form-group text-right">
							 		<label></label>
								 	<button class="btn btn-success">Update</button>
								  	<a href="<?= base_url('admin/profile'); ?>" class="btn btn-secondary">Batal</a>
								</div>
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
