<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/sidebar');
	$this->load->view('templates/topbar');
 ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<?= form_error('menu[]', '<div class="alert alert-danger" role="alert">', '</div>') ?>

  	<!-- table kriteria -->
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
    		<div class="d-sm-flex align-items-center justify-content-between">
    			<h6 class="m-0 font-weight-bold text-primary">Setting Menu </h6>
			</div>
	    </div>
	    <div class="card-body">
	    	<form method="post" action="<?= base_url('admin/detail_menu/akses/'.$menu_detail_akses[0]['tbl_role_id']) ?>">
		    	<?php foreach ($menu_list as $key): ?>
			    	<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="menu<?= $key['id_menu'] ?>" value="<?= $key['id_menu'] ?>" name="menu[]" 
							<?php foreach ($menu_detail_akses as $key2) {
								if ($key2['id_menu'] == $key['id_menu']) {
									echo "checked";
								}
							} ?>
						>
				  		<label class="custom-control-label" for="menu<?= $key['id_menu'] ?>"><?= $key['menu'] ?></label>
					</div>
		    	<?php endforeach; ?>
		    	<hr>
			 	<div class="form-group">
			 		<label></label>
					<a href="<?= base_url('admin/detail_menu') ?>" class="btn btn-secondary">Batal</a>
					<button type="submit" class="btn btn-success">Simpan</button>
				</div>
	    	</form>
	    </div>
	</div>

</div>
<!-- /.container-fluid -->

<?php 
	$this->load->view('templates/footer');
 ?>
