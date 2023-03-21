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
			      <h6 class="m-0 font-weight-bold text-primary">Form Edit Menu</h6>
			    </div>
			    <div class="card-body">
					<form action="<?= base_url('admin/menu/update/' . $menu_data['id_menu']) ?>" method="post">
						<div class="col-lg-10 offset-lg-1">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="menu">Nama Menu</label>
										<input type="text" class="form-control" id="menu" name="menu" placeholder="Masukkan Nama Menu" value="<?= $menu_data['menu'] ?>">
										<?= form_error('menu', '<small class="text-danger">', '</small>') ?>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="icon">Icon</label>
										<input type="text" class="form-control" id="icon" name="icon" placeholder="Masukkan Icon" value="<?= $menu_data['icon'] ?>">
										<?= form_error('icon', '<small class="text-danger">', '</small>') ?>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="link">Link</label>
										<input type="text" class="form-control" id="link" name="link" placeholder="Masukkan Link" value="<?= $menu_data['link'] ?>">
										<?= form_error('link', '<small class="text-danger">', '</small>') ?>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
									    <label for="parent_menu">Parent Menu</label>
									    <select class="form-control" id="parent_menu" name="parent_menu">
									      <option value="">pilih</option>
									      <?php foreach ($menu_parent as $key) : ?>
									      	<option 
									      		value="<?= $key['id_menu'] ?>" 
									      		<?= $key['id_menu'] == $menu_data['id_parent'] ? 'selected' : '' ?>
									      	>
									      		<?= $key['menu']?>
									      	</option>
									      <?php endforeach; ?>
									    </select>
									  </div>
								</div>
							</div>
						 	<hr>
						 	<div class="form-group text-right">
						 		<label></label>
							  <button class="btn btn-success">Update</button>
							  <a href="<?= base_url('admin/menu'); ?>" class="btn btn-secondary">Batal</a>
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
