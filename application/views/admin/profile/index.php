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
			      <h6 class="m-0 font-weight-bold text-primary">Profile User</h6>
			    </div>
			    <div class="card-body">
			    	<div class="row">
			    		<div class="col-lg-4 offset-lg-2">
			    			<figure class="figure">
							  <img src="<?= base_url('assets/img/profile/'.$user['foto']) ?>" class="figure-img img-fluid rounded" alt="...">
							</figure>
			    		</div>
			    		<div class="col-lg-4">
			    			<div class="form-group">
							    <label for="nama">Nama</label>
							    <input type="text" readonly class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>" disabled>
							</div>
							<div class="form-group">
							    <label for="nama">Username</label>
							    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['username'] ?>" disabled>
							</div>
							<div class="form-group">
							    <label for="nama">Role</label>
							    <div class="row">
								    <?php foreach ($detail_role as $key) { ?>
								    	<?php if ($key['id_role'] == 1): ?>
								    		<div class="col-lg-3">
								    			<h4><span class="badge badge-pill badge-success"><?= $key['role'] ?></span></h4>
								    		</div>
								    	<?php endif ?>
								    	<?php if ($key['id_role'] == 2): ?>
								    		<div class="col-lg-3">
								    			<h4><span class="badge badge-pill badge-info"><?= $key['role'] ?></span></h4>
								    		</div>
								    	<?php endif ?>
								    <?php }; ?>
							    </div>
							</div>
							<div class="form-group">
								<a href="<?= base_url('admin/profile/update/'.$user['id_user']) ?>" class="btn btn-primary form-control">Ubah</a>
							</div>
			    		</div>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</div>

<?php 
	$this->load->view('templates/footer');
 ?>
