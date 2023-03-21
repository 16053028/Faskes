<?php 
	$this->load->view('templates/header');
	$this->load->view('templates/sidebar');
	$this->load->view('templates/topbar');
 ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<?= $this->session->flashdata('message'); ?>

  	<!-- table role -->
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
    		<div class="d-sm-flex align-items-center justify-content-between">
    			<h6 class="m-0 font-weight-bold text-primary">Data Role</h6>
				<a class="btn btn-info btn-sm btn-icon-split" href="<?php echo base_url('admin/role/create') ?>">
              		<span class="icon text-white-50">
                      	<i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah</span>
              	</a>
			</div>
	    </div>
	    <div class="card-body">
	      <div class="table-responsive">
	        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	          <thead>
	            <tr>
	              <th>Nama Role</th>
	              <th>Action</th>
	            </tr>
	          </thead>
	          <tbody>
	          	<?php foreach ($role_list as $key) { ?>
		            <tr>
		              <td><?php echo $key['role']; ?></td>
		              <td>
		              	<a class="btn btn-warning btn-sm btn-icon-split" href="<?php echo base_url('admin/role/update/'.$key['id_role']) ?>">
		              		<span class="icon text-white-50">
		                      	<i class="fas fa-pencil-alt"></i>
		                    </span>
		                    <span class="text">Ubah</span>
		              	</a>
		              	<a class="btn btn-danger btn-sm btn-icon-split btn-hapus" href="<?php echo base_url('admin/role/delete/'.$key['id_role']) ?>">
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
