<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/sidebar');
	$this->load->view('templates/topbar');
 ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('message'); ?>

  	<!-- table nilai -->
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
    		<div class="d-sm-flex align-items-center justify-content-between">
    			<h6 class="m-0 font-weight-bold text-primary">Daftar Poli Faskes <span class="text-dark">(<?= $faskes_data['nama_faskes']; ?>)</span></h6>
    			<div>
	    			<a class="btn btn-secondary btn-sm btn-icon-split" href="<?php echo base_url('admin/poli_faskes') ?>">
		              		<span class="icon text-white-50">
		                      	<i class="fas fa-arrow-alt-circle-left"></i>
		                    </span>
		                    <span class="text">Kembali</span>
		              	</a>
	    			<?php if ($cek_poli !== 0): ?>
						<a class="btn btn-info btn-sm btn-icon-split" href="<?php echo base_url('admin/poli_faskes/create/' . $faskes_data['id_faskes']) ?>">
		              		<span class="icon text-white-50">
		                      	<i class="fas fa-plus"></i>
		                    </span>
		                    <span class="text">Tambah</span>
		              	</a>
	    			<?php endif ?>
    			</div>
			</div>
	    </div>
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th>Poli</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	<?php foreach ($poli_list as $key) { ?>
		            <tr>
		              <td><?php echo $key['nama_poli']; ?></td>	
		              <td>
		              	<a class="btn btn-danger btn-sm btn-icon-split btn-hapus" href="<?php echo base_url('admin/poli_faskes/delete/'.$key['id_poli_detail'].'/'.$faskes_data['id_faskes']) ?>">
		              		<span class="icon text-white-50">
		                      	<i class="fas fa-trash"></i>
		                    </span>
		                    <span class="text">Hapus</span>
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
