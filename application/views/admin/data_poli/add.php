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
			      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Poli</h6>
			    </div>
			    <div class="card-body">
					<form action="<?= base_url('admin/poli/create') ?>" method="post">
						<div class="col-lg-10 offset-lg-1">
							<div class="form-group">
								<label for="poli">Nama Poli</label>
								<input type="text" class="form-control" id="poli" name="poli" placeholder="Masukkan Nama Poli" value="<?= set_value('poli') ?>">
								<?= form_error('poli', '<small class="text-danger">', '</small>') ?>
								<label for="poli">Keterangan</label>
								<textarea type="text" class="form-control" id="keterangan" name="keterangan" rows="5" cols="50"></textarea>
							</div>

						 	<hr>
						 	<div class="form-group text-right">
						 		<label></label>
							 	<button class="btn btn-success">Simpan</button>
							 	<a href="<?= base_url('admin/poli'); ?>" class="btn btn-secondary">Batal</a>
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
