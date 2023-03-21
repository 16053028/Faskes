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
			      <h6 class="m-0 font-weight-bold text-primary">Form Tambah User</h6>
			    </div>
			    <div class="card-body">
					<form action="<?= base_url('admin/user/create') ?>" method="post" enctype="multipart/form-data">
						<div class="col-lg-10 offset-lg-1">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
									    <label for="nama">Nama</label>
									    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= set_value('nama') ?>">
									    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
								 	</div>			
								</div>
								<div class="col-lg-6">
									<div class="form-group">
									    <label for="exampleFormControlInput1">Username</label>
									    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?= set_value('nama') ?>">
									    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
								  	</div>			
								</div>
							</div>
						  
						  <div class="row">
						  	<div class="col-lg-6">
							  <div class="form-group">
							    <label for="exampleFormControlInput1">Password</label>
							    <input type="Password" class="form-control" id="password1" name="password1" placeholder="Masukkan Password">
							    <?= form_error('password1', '<small class="text-danger">', '</small>') ?>
							  </div>
						  	</div>
						  	<div class="col-lg-6">
							  <div class="form-group">
							    <label for="exampleFormControlInput1">Confirm Password</label>
							    <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password">
							  </div>
						  	</div>
						  </div>

  <div class="form-group">
  	<label for="exampleFormControlInput1">Piih Role</label>
    <div class="form-check">
    	<?php foreach ($role as $key) { ?>
	      <input class="form-check-input" type="checkbox" id="checkboxrole<?= $key['id_role'] ?>" name="role[]" value="<?= $key['id_role'] ?>"  <?= set_checkbox('role[]', $key['id_role']) ?>>
	      <label class="form-check-label mr-5" for="checkboxrole<?= $key['id_role'] ?>">
	        <?= $key['role'] ?>
	      </label>
	    <?php };?>
    </div>
    <?= form_error('role[]', '<small class="text-danger">', '</small>') ?>
  </div>
					  		<div class="form-group">
							    <label for="exampleFormControlFile1">Foto <small class="text-muted">(boleh kosong)</small></label>
							    <div class="custom-file">
								  <input type="file" class="custom-file-input" id="foto" name="foto">
								  <label class="custom-file-label" for="customFile">Pilih file</label>
								  <?php if ($this->session->flashdata('message')): ?>
								  	<small class="text-danger"><?= $this->session->flashdata('message') ?></small>
								  <?php endif ?>
								</div>
						  	</div>
						  	<hr>
						 	<div class="form-group text-right">
						 		<label></label>
								<button class="btn btn-success">Simpan</button>
								<a href="<?= base_url('admin/user'); ?>" class="btn btn-secondary">Batal</a>
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
