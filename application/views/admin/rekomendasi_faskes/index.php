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
			      <h6 class="m-0 font-weight-bold text-primary">Pilih Lokasi Anda</h6>
			    </div>
			    <div class="card-body">
			    	<div id="map" style="height: 350px;">
			    	</div>
			    	<Hr>
			    	
					<p>Pilih poli yang hendak dicari :</p> <br />
					<div class="col-lg">
				 		<div class="col">
		              		<select class="form-control" id="inputUser">
		              			<option><b>Pilih ...</b></option>
		              			<?php foreach ($poli_list as $key => $value): ?>
									<option value="<?php echo $value['id_poli_detail'] ?>" myTag="<?php echo $value['keterangan_poli'] ?>">
										<?php echo $value['nama_poli'] ?>
									</option>
				 				<?php endforeach ?>
							</select>
						</div>
						<div id="cKet">
							<h1>Keterangan : </h1> <br />
							<div class="inner">
	                		
	                		</div>	
						</div>
						
					</div>

					<hr>

					<div class="col-lg">
					 	<div class="text-right">
						 	<button id="btncluster" class="btn btn-success">Lanjut</button>

						 	<div id="btnloading" class="spinner-border text-success" hidden="hidden">
							  <span class="sr-only">Loading...</span>
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


<script type="text/javascript">
	
	var map = L.map('map').setView([-7.25656, 112.73166], 13);
	var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
	var datafaskes = <?php echo json_encode($faskes_detail) ?>;


	var data_jarak = [];

	// add map
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	// add marker
	var user = L.marker([-7.25656, 112.73166], {draggable: 'true', autoPan: 'true'}).addTo(map);
	user.bindPopup('Drag ke lokasi anda <br>'+ user.getLatLng()).openPopup();
	
	// set drag marker
	user.on("drag", function(e) {
		// console.log(user.getLatLng().distanceTo(user2.getLatLng()));
		// console.log(user.getLatLng());
		user.bindPopup('Drag ke lokasi anda <br>'+ user.getLatLng()).openPopup();
	});

	$("#inputUser").change(function(){
		data_jarak = [];
		var element = $("option:selected", this);
		var keterangan = element.attr("myTag");
		$('.inner').empty();
		$('.inner').append(keterangan);
		let filterData = datafaskes.filter(
		(data)=>{
			return data.id_poli_detail == $(this).val();
		});
		// connver lokasi ke jarak
	for (faskes of filterData){
		let jarak = map.distance([faskes.latitude, faskes.longtitude], user.getLatLng());
		data_jarak.push({id_faskes: faskes.id_faskes, nama_faskes: faskes.nama_faskes, jarak: jarak});
	}
	console.log(data_jarak);
	});



	


	$("#btncluster").click(function(){
		$('#btncluster').attr("hidden", "hidden");
		$('#btnloading').removeAttr("hidden");

	    $.post( base_url + 'admin/rekomendasi_faskes/createCluster',
	    {
	    	data_jarak : data_jarak,
	    },
	    function(data,status){
	      	window.location.href = base_url + 'admin/rekomendasi_faskes/createBobotKriteria';
	    	$('#btnloading').attr("hidden", "hidden");
			$('#btncluster').removeAttr("hidden");

		});
	});
	
</script>