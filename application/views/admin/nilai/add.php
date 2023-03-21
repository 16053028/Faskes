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
			      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Nilai</h6>
			    </div>
			    <div class="card-body">
					<form action="<?= base_url('admin/nilai/create/' . $faskes_data['id_faskes']) ?>" method="post">
						<div class="col-lg-10 offset-lg-1">
							<div class="form-group">
								<label for="nilai">Pilih kriteria</label>
								<select class="form-control" id="id_kriteria" name="id_kriteria">
									<option value="">Pilih</option>
									<?php foreach ($kriteria_list as $key => $value): ?>
										<option value="<?= $value['id_kriteria'] ?>"><?= $value['nama_kriteria'] ?></option>
									<?php endforeach ?>
								</select>
								<?= form_error('id_kriteria', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="nilai">Nilai</label>
								<input type="text" class="form-control" id="nilai" name="nilai" placeholder="Masukkan Nilai" value="<?= set_value('nilai') ?>">
								<?= form_error('nilai', '<small class="text-danger">', '</small>') ?>
							</div>

						 	<hr>
						 	<div class="form-group text-right">
						 		<label></label>
							 	<button class="btn btn-success">Simpan</button>
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
