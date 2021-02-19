<!-- tampilan ubah password halaman -->
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <title>Tel - U CUSS | Ubah Password</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
  </head>

  <body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>


    <div id="wrapper">
        <?php $this->load->view("_partials/sidebar_dsn.php") ?>
      <div id="content-wrapper">
       <div class="container-fluid">
          <div class="mb-3">
            <h2>Ubah Password</h2><hr><br>
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('pengaturan_controllers/ubahPassword') ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="current_password">Password Lama</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                            <?= form_error('current_password','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password1">Password Baru</label>
                            <input type="password" class="form-control" id="new_password1" name="new_password1">
                            <?= form_error('new_password1','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="new_password2">Ulangi Password Baru</label>
                            <input type="password" class="form-control" id="new_password2" name="new_password2">
                            <?= form_error('new_password2','<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    <!-- <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div> -->
                    </div>
                </form>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>
