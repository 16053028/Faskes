<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/sidebar');
	$this->load->view('templates/topbar');
 ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<?php
		if (validation_errors()) {
			echo '<div class="alert alert-danger" role="alert">Gagal simpan, Lengkapi Form Faskes</div>';
		} 	 
	?>
	<div class="row">
		<div class="col-lg">
			<div class="card shadow mb-4">
			    <div class="card-header py-3">
			      <h6 class="m-0 font-weight-bold text-primary">Pilih Lokasi Faskes</h6>
			    </div>
			    <div class="card-body">
			    	<div id="map" style="height: 350px;">
			    	</div>
			    </div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg">
			<div class="card shadow mb-4">
			    <div class="card-header py-3">
			      <h6 class="m-0 font-weight-bold text-primary">Form Tambah Faskes</h6>
			    </div>
			    <div class="card-body">
					<form action="<?= base_url('admin/faskes/create') ?>" method="post">
						<div class="col-lg-10 offset-lg-1">
							<div class="row">
								<div class="col-lg">
									<div class="form-group">
									    <label for="nama_faskes">Nama Faskes</label>
									    <input type="text" class="form-control" id="nama_faskes" name="nama_faskes" placeholder="Masukkan Nama Faskes" value="<?= set_value('nama_faskes') ?>">
									    <?= form_error('nama_faskes', '<small class="text-danger">', '</small>') ?>
								 	</div>
								</div>
								<div class="col-lg">
									 <div class="form-group">
									    <label for="nama_kepala_faskes">Nama Kepala Faskes</label>
									    <input type="text" class="form-control" id="nama_kepala_faskes" name="nama_kepala_faskes" placeholder="Masukkan Nama Kepala Faskes" value="<?= set_value('nama_kepala_faskes') ?>">
									    <?= form_error('nama_kepala_faskes', '<small class="text-danger">', '</small>') ?>
								  	</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg">
									<div class="form-group">
									    <label for="alamat_faskes">Alamat Faskes</label>
									    <input type="text" class="form-control" id="alamat_faskes" name="alamat_faskes" placeholder="Masukkan Alamat Faskes" value="<?= set_value('alamat_faskes') ?>">
									    <?= form_error('alamat_faskes', '<small class="text-danger">', '</small>') ?>
								  	</div>	
								</div>
								<div class="col">
									<div class="form-group">
									    <label for="nomor_telepon">Nomor Telepon</label>
									    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" value="<?= set_value('nomor_telepon') ?>">
									    <?= form_error('nomor_telepon', '<small class="text-danger">', '</small>') ?>
								  	</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
									    <label for="latitude">Latitude</label>
									    <input readonly type="text" class="form-control" id="latitude" name="latitude" placeholder="Masukkan Latitude" value="<?= set_value('latitude') ?>">
									    <?= form_error('latitude', '<small class="text-danger">', '</small>') ?>
								  	</div>		
								</div>
								<div class="col">
									<div class="form-group">
									    <label for="longtitude">Longtitude</label>
									    <input readonly type="text" class="form-control" id="longtitude" name="longtitude" placeholder="Masukkan Longtitude" value="<?= set_value('longtitude') ?>">
									    <?= form_error('longtitude', '<small class="text-danger">', '</small>') ?>
								  	</div>		
								</div>
							</div>

						  	<hr>
						 	<div class="form-group text-right">
						 		<label></label>
								<button class="btn btn-success">Simpan</button>
								<a href="<?= base_url('admin/faskes'); ?>" class="btn btn-secondary">Batal</a>
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

<script type="text/javascript">
	
	var map = L.map('map').setView([-7.25656, 112.73166], 13);
	var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';

	// add map
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	// add marker
	var faskes = L.marker([-7.25656, 112.73166], {draggable: 'true', autoPan: 'true'}).addTo(map);
	faskes.bindPopup('Drag ke lokasi faskes <br>'+ faskes.getLatLng()).openPopup();
	
	// set drag marker
	faskes.on("drag", function(e) {
		console.log(faskes.getLatLng());
		$('#latitude').val(faskes.getLatLng().lat.toFixed(5));
		$('#longtitude').val(faskes.getLatLng().lng.toFixed(5));
		faskes.bindPopup('Drag ke lokasi anda <br>'+ faskes.getLatLng()).openPopup();
	});

	
</script>