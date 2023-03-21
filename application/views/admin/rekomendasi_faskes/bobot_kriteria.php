<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/sidebar');
	$this->load->view('templates/topbar');
 ?>
<!-- Begin Page Content -->


<div class="container-fluid">
	
	<?php
		if (validation_errors()) {
			echo '<div class="alert alert-danger" role="alert">Gagal simpan, Cek form bobot kriteria</div>';
		} 	 
	?>

	<!-- bobot kriteria -->
	<div class="row">
		<div class="col-lg-12">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Masukkan Bobot Kriteria</h6>
                </div>
                <div class="card-body">

                	<div class="container">
                		<p>Berikut adalah quisioner tentang perbandingan antar element. Harap mengisi sesuai dengan pendapat anda.</p>
                	</div>

                	<div id="userinput">
                		
                	</div>
					<form action="<?= base_url('admin/rekomendasi_faskes/createBobotKriteria') ?>" method="post">
						<div class="table-responsive" hidden>
					        <table class="table table-bordered" width="100%" cellspacing="0">
					          <thead>
					            <tr>
					              <td>Nama Kriteria</td>
					              <?php foreach ($kriteria as $key): ?>
					              	<th><?= ucfirst($key['nama_kriteria']) ?></th>
					              <?php endforeach ?>
					            </tr>
					          </thead>
					          <tbody>
					          	<?php $dis = 1; ?>
					          	<?php foreach ($kriteria as $key): ?>
					          		<tr>
					          			<th scope="row"><?= ucfirst($key['nama_kriteria']) ?></th>
					          			<?php foreach ($kriteria as $index => $value): ?>
					          				<td>
					          					<?php if ($index + 1 <= $dis): ?>
					          						<input type="text" class="form-control" id="<?= $key['id_kriteria'] . '_' . $value['id_kriteria']?>" name="<?= $key['id_kriteria'] . '_' . $value['id_kriteria']?>" value="" readonly>
					          					<?php else: ?>					          					
						          					<select class="form-control" id="<?= $key['id_kriteria'] . '_' . $value['id_kriteria']?>" name="<?= $key['id_kriteria'] . '_' . $value['id_kriteria']?>" >
						          						<option value="">pilih nilai perbandingan</option>
						          						<option value="1">1-Kedua elemen sama penting</option>
						          						<option value="2">2-Nilai antara 1 dan 3 yang berdekatan</option>
						          						<option value="3">3-Elemen yang satu sedikit lebih penting dari elemen lainnya</option>
						          						<option value="4">4-Nilai antara 3 dan 5 yang berdekatan</option>
						          						<option value="5">5-Elemen yang satu lebih penting dari elemen lainnya</option>
						          						<option value="6">6-Nilai antara 5 dan 7 yang berdekatan</option>
						          						<option value="7">7-Elemen yang satu sangat penting dari elemen lainnya</option>
						          						<option value="8">8-Nilai antara 7 dan 9 yang berdekatan</option>
						          						<option value="9">9-Elemen yang satu mutlak sangat penting dari elemen lainnya</option>

						          						<option value="0.5" class="kebalikan">1/2-Nilai antara 1 dan 3 yang berdekatan</option>
						          						<option value="0.33" class="kebalikan">1/3-Elemen yang satu sedikit lebih penting dari elemen lainnya</option>
						          						<option value="0.25" class="kebalikan">1/4-Nilai antara 3 dan 5 yang berdekatan</option>
						          						<option value="0.2" class="kebalikan">1/5-Elemen yang satu lebih penting dari elemen lainnya</option>
						          						<option value="0.167" class="kebalikan">1/6-Nilai antara 5 dan 7 yang berdekatan</option>
						          						<option value="0.142857‬" class="kebalikan">1/7-Elemen yang satu sangat penting dari elemen lainnya</option>
						          						<option value="0.125" class="kebalikan">1/8-Nilai antara 7 dan 9 yang berdekatan</option>
						          						<option value="0.11" class="kebalikan">1/9-Elemen yang satu mutlak sangat penting dari elemen lainnya</option>
						          					</select>
					          					<?php endif ?>
					          				</td>
					          			<?php endforeach ?>
					          		</tr>
					          		<?php $dis++ ?>
					          	<?php endforeach ?>
					          </tbody>
					        </table>
					    </div>
					    <div class="text-right">
						 	<a href="<?= base_url('admin/rekomendasi_faskes') ?>" id="" class="btn btn-secondary">Kembali</a>
						 	<button class="btn btn-success">Cari</button>
						</div>
					</form>
                </div>
              </div>

        </div>
	</div>
	<!-- end bobot kriteria -->
</div>



<?php 
	$this->load->view('templates/footer');
 ?>

 <script>
 	$(document).ready(function() {
 		$('table.display').DataTable();
	} );

	let kriteria = <?php echo json_encode($kriteria) ?>;


	for (itemRow of kriteria){
		for (itemCol of kriteria){
			let idSelect = '#' + itemRow.id_kriteria + '_' + itemCol.id_kriteria;
			let data = '#' + itemCol.id_kriteria + '_' + itemRow.id_kriteria;
			
			$(idSelect).change(function() {
				if ($(this).val() == '') {
					$(data).val('');
				}else{
					let hasil = 1/parseFloat($(this).val());
					$(data).val(hasil);	
				}
			})

			if (itemRow.id_kriteria == itemCol.id_kriteria) {
				$(idSelect).val(1);
			}
		}	
	}

	// ---------------------------------------------------------------------------------------------------------------
	// add input user
	let userInputData = [];
	$("select").each(function(){
		userInputData.push($(this).attr('id'));
	    let id = $(this).attr('id');
	    let idAwal = id.split("_")[0];
	    let idAkhir = id.split("_")[1];
	    let kriteriaAwal = kriteria.find((data) => data.id_kriteria == idAwal);
	    let kriteriaAkhir = kriteria.find((data) => data.id_kriteria == idAkhir);

		$('#userinput').append(`
			<div class="row">
              	<div class="col">
              		<p class="text-capitalize text-center">${kriteriaAwal.nama_kriteria}</p>
              	</div>
              	<div class="col">
              		<select class="form-control" id="user-${id}" data="${id}">
						<option value="">pilih nilai perbandingan</option>
						<option value="1">Kedua elemen sama penting</option>
						<option value="3">Elemen ${kriteriaAwal.nama_kriteria} sedikit lebih penting dari elemen ${kriteriaAkhir.nama_kriteria}</option>
						<option value="5">Elemen ${kriteriaAwal.nama_kriteria} lebih penting dari elemen ${kriteriaAkhir.nama_kriteria}</option>
						<option value="7">Elemen ${kriteriaAwal.nama_kriteria} sangat penting dari elemen ${kriteriaAkhir.nama_kriteria}</option>
						<option value="9">Elemen ${kriteriaAwal.nama_kriteria} mutlak sangat penting dari elemen ${kriteriaAkhir.nama_kriteria}</option>

						<option value="0.33" class="kebalikan">Elemen ${kriteriaAkhir.nama_kriteria} sedikit lebih penting dari ${kriteriaAwal.nama_kriteria}</option>
						<option value="0.2" class="kebalikan">Elemen ${kriteriaAkhir.nama_kriteria} lebih penting dari elemen ${kriteriaAwal.nama_kriteria}</option>
						<option value="0.142857‬" class="kebalikan">Elemen ${kriteriaAkhir.nama_kriteria} sangat penting dari elemen ${kriteriaAwal.nama_kriteria}</option>
						<option value="0.11" class="kebalikan">Elemen ${kriteriaAkhir.nama_kriteria} mutlak sangat penting dari elemen ${kriteriaAwal.nama_kriteria}</option>
					</select>
              	</div>
              	<div class="col">
              		<p class="text-capitalize text-center">${kriteriaAkhir.nama_kriteria}</p>
              	</div>
              </div>
		`);
	});

	// change input user
	for (item of userInputData) {
		$('#user-'+item).change(function() {
			$("#" + $(this).attr('data')).val($(this).val());
			$("#" + $(this).attr('data')).trigger('change');
		});
	}


 </script>