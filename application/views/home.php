<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tel - U CUSS | Home</title>
  <?php $this->load->view("_partials/header.php") ?>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
</head>

<body id="page-top">
  <?php $this->load->view("_partials/js.php") ?>
  <?php $this->load->view("_partials/navbar.php", $this->data) ?>


  <div id="wrapper">
    <?php $this->load->view("_partials/sidebar.php") ?>
    <div id="content-wrapper">
      <div class="container-fluid">
          <div class="page-header">
              <center><h2 class="entry-title">Telkom University Course Scheduling System</h2></center>
          </div><br>
          <div class="entry-body">
              <h4>Telkom University Course Scheduling System atau TEL-U CUSS adalah sebuah aplikasi 
              berbasis website yang bertujuan untuk ... .</h4>
          </div>
      </div>
    </div>
  </div>
  <?php $this->load->view("_partials/footer.php") ?>
</body>

</html>