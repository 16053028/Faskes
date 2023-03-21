<?php 
  $this->load->view('templates/auth_header');
?>

<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-6">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Pilih Role</h1>
                </div>
                <form class="user" method="post" action="<?= base_url('pilihrole') ?>">
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Role User</label>
                    <select class="form-control" id="pilih_role" name="pilih_role">
                      <option value="">Pilih</option>
                      <?php foreach ($role_user as $key) { ?>
                        <option value="<?= $key['id_role'] ?>"><?= $key['role'] ?></option>
                      <?php }; ?>
                    </select>
                     <?= form_error('pilih_role', '<small class="text-danger">', '</small>') ?>
                  </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Pilih
                    </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>

<?php 
  $this->load->view('templates/auth_footer');
?>