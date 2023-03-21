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
			      <h6 class="m-0 font-weight-bold text-primary">Form Edit User</h6>
			    </div>
			    <div class="card-body">
					<form action="<?= base_url('admin/user/update/'.$user_data['id_user']) ?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id_user" value="<?= $user_data['id_user'] ?>">
						<div class="col-lg-10 offset-lg-1">
							<div class="row">
								<div class="col">
									<div class="form-group">
									    <label for="nama">Nama</label>
									    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" value="<?= $user_data['nama'] ?>">
									    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
									</div>	
								</div>
								<div class="col">
									<div class="form-group">
									    <label for="exampleFormControlInput1">Username</label>
									    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" value="<?= $user_data['username']?>">
									    <?= form_error('username', '<small class="text-danger">', '</small>') ?>
								  	</div>	
								</div>
							</div>
						    <div class="form-group">
							  	<label for="exampleFormControlInput1">Piih Role</label>
							    <div class="form-check">
							    	<?php foreach ($role as $key) { ?>
								      <input class="form-check-input" type="checkbox" id="checkboxrole<?= $key['id_role'] ?>" name="role[]" value="<?= $key['id_role'] ?>"  
								      <?php echo $detail_role[0]['id_user'] == $user['id_user'] && $key['id_role'] == 1 ? 'disabled ' : ''; ?>
								      <?php foreach ($detail_role as $key2) {
								      	echo $key2['id_role'] == $key['id_role'] ? 'checked' : '';
								      } ?>>
								      <label class="form-check-label mr-5" for="checkboxrole<?= $key['id_role'] ?>">
								        <?= $key['role'] ?>
								      </label>
								    <?php };?>
							    </div>
							    <?= form_error('role[]', '<small class="text-danger">', '</small>') ?>
							</div>
					  		<div class="form-group">
							    <label for="exampleFormControlFile1">Foto</label>
							    <div class="row">
								  	<div class="col-3">
								    	<img src="<?= base_url('assets/img/profile/'.$user_data['foto']) ?>" class="img-thumbnail">
								  	</div>
								  	<div class="col-9">
									    <div class="custom-file">
										  <input type="file" class="custom-file-input" id="foto" name="foto">
										  <label class="custom-file-label" for="customFile">Choose file</label>
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
