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
			      <h6 class="m-0 font-weight-bold text-primary">Form Edit Nilai</h6>
			    </div>
			    <div class="card-body">
					<form action="<?= base_url('admin/nilai/update/' . $nilai_data['id_nilai']) . '/' . $faskes_data['id_faskes'] ?>" method="post">
						<div class="col-lg-10 offset-lg-1">
							<div class="form-group">
								<label for="nilai">Nilai</label>
								<input type="text" class="form-control" id="nilai" name="nilai" placeholder="Masukkan Nilai" value="<?= $nilai_data['nilai'] ?>">
								<?= form_error('nilai', '<small class="text-danger">', '</small>') ?>
							</div>
						 	<hr>
						 	<div class="form-group text-right">
						 		<label></label>
							  <button class="btn btn-success">Update</button>
							  <a href="<?= base_url('admin/nilai/list/'.$faskes_data['id_faskes']); ?>" class="btn btn-secondary">Batal</a>
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
