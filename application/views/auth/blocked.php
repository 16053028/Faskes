<?php 
  $this->load->view('templates/header');
  $this->load->view('templates/sidebar');
  $this->load->view('templates/topbar');
 ?>

    <!-- Begin Page Content -->
    <div class="container-fluid mt-5">

      <!-- 404 Error Text -->
      <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Page Not Found</p>
        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
        <!-- <a href="index.html">&larr; Back to Dashboard</a> -->
      </div>

    </div>
    <!-- /.container-fluid -->

<?php 
  $this->load->view('templates/footer');
?>


     