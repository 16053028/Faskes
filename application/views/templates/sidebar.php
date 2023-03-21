    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php 
      if ($this->session->userdata('id_role') == 1){
          echo base_url("admin/dashboard");
        }else{
          echo base_url("admin/rekomendasi_faskes");
        }
       ?>">
        <div class="sidebar-brand-icon">
          <i class="fas fa-hospital-alt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">rekomendasi faskes</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <?php 
        $CI =& get_instance();
        $CI->load->model('Detail_menu_model');
        $menu = $CI->Detail_menu_model->getAksesMenu($this->session->userdata('id_role'));
      ?>

      <?php foreach ($menu as $key): ?>
        <?php if ($key['id_parent'] == 0): ?>     
          <li class="nav-item <?= $title ==  $key['menu'] ? "active" : "" ?>">
            <a class="nav-link" href="<?= base_url($key['link']) ?>">
              <i class="<?= $key['icon'] ?>"></i>
              <span><?= $key['menu'] ?></span></a>
          </li>
        <?php  endif;?>
      <?php endforeach; ?>
      
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
