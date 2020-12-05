<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tel - U CUSS | Ubah Data Mata Kuliah</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
  </head>
  <body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>

    <div class="datadata">
      <div id="wrapper">
        <?php $this->load->view("_partials/sidebar_admin.php") ?>
          <div id="content-wrapper">
            <div class="container-fluid">
              <div class="card mb-3">
                <div class="card-header">
                      <i class="fas fa-table"></i>
                      Ubah Data Mata Kuliah
                </div>
                    <div class="card card-default">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table">
                                      <form action="" method="post">
                                          <div class="form-group">
                                              <label for="nama_matkul">Nama Mata Kuliah</label>
                                              <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" placeholder="Nama Mata Kuliah">
                                          </div>
                                          <div class="form-group">
                                              <label for="kode_matkul">Kode Mata Kuliah</label>
                                              <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" placeholder="Kode Mata Kuliah">
                                          </div>
                                          <div class="form-group">
                                              <label for="kode_matkul">SKS</label>
                                              <input type="text" class="form-control" id="sks" name="sks" placeholder="Jumlah SKS">
                                          </div>
                                          <button type="submit" class="btn btn-dark mt-3" name="simpanMatkul">Submit</button>
                                      </form>
                                    </table>
                                  </div>
                                </div>
                    </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </body>
</html>
