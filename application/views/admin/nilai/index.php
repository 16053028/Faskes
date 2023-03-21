<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/sidebar');
	$this->load->view('templates/topbar');
 ?>
<!-- Begin Page Content -->
<div class="container-fluid">

  	<!-- table faskes -->
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
    		<div class="d-sm-flex align-items-center justify-content-between">
    			<h6 class="m-0 font-weight-bold text-primary">Data Nilai Faskes</h6>
			</div>
	    </div>
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th>Faskes</th>
	              <th>Alamat</th>
	              <th>Nilai terisi</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	<?php foreach ($faskes_list as $key) { ?>
		            <tr>
		              <td><?php echo $key['nama_faskes']; ?></td>
		              <td><?php echo $key['alamat_faskes']; ?></td>
		              <td>
		              	<?php if ($key['nilai_terisi'] == $kriteria_total): ?>
			              	<div class="badge badge-pill badge-success">
							  Lengkap <span class="badge badge-light"><?= $key['nilai_terisi'] ?> </span>
							</div>
		              	<?php elseif($key['nilai_terisi'] == 0): ?>
		              		<div class="badge badge-pill badge-danger">
							  Kosong <span class="badge badge-light"><?= $key['nilai_terisi'] ?> </span>
							</div>
						<?php else: ?>
							<div class="badge badge-pill badge-warning">
							  Kurang <span class="badge badge-light"><?= $key['nilai_terisi'] ?> </span>
							</div>
		              	<?php endif ?>
		              </td>
		              <td>
		              	<a class="btn btn-info btn-sm btn-icon-split" href="<?php echo base_url('admin/nilai/list/'.$key['id_faskes']) ?>">
		              		<span class="icon text-white-50">
		                      	<i class="fas fa-eye"></i>
		                    </span>
		                    <span class="text">Nilai</span>
		              	</a>
		              </td>
		            </tr>
	        	<?php } ?>
	          </tbody>
	        </table>
	      </div>
	    </div>
	</div>

</div>
<!-- /.container-fluid -->

<?php 
	$this->load->view('templates/footer');
 ?>