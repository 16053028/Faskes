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
			      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Kriteria</h6>
			    </div>
			    <div class="card-body">
					<form action="<?= base_url('admin/kriteria/create') ?>" method="post">
						<div class="col-lg-10 offset-lg-1">
							<div class="form-group">
								<label for="kriteria">Nama Kriteria</label>
								<input type="text" class="form-control" id="kriteria" name="kriteria" placeholder="Masukkan Nama Kriteria" value="<?= set_value('kriteria') ?>">
								<?= form_error('kriteria', '<small class="text-danger">', '</small>') ?>
							</div>

						 	<hr>
						 	<div class="form-group text-right">
						 		<label></label>
							 	<button class="btn btn-success">Simpan</button>
							 	<a href="<?= base_url('admin/kriteria'); ?>" class="btn btn-secondary">Batal</a>
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
