<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tel - U CUSS | Pengumuman</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
  </head>

  <body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>

    <div id="wrapper">
      <?php $this->load->view("_partials/sidebar_admin.php") ?>
      <div id="content-wrapper">
       <div class="container-fluid">
          <div class="mb-3">
            <h2>Pengumuman</h2><hr>
            <?php if ($this->session->flashdata('alert_hapus')) {?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('alert_hapus'); ?>
                </div>
            <?php } ?>
            <a href="<?= base_url('/Pengumuman_controllers/inputPengumuman') ?>" class="btn btn-sm btn-primary"><i class='far fa-fw fa-plus-square'></i> Input Pengumuman</a>
            <br>
          </div>
          <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-table"></i>
                Daftar Pengumuman
              </div>
                <div class="card card-default">
                  <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th scope="col">NO</th>
                              <th scope="col">JUDUL PENGUMUMAN</th>
                              <th scope="col">TANGGAL DIBUAT</th>
                              <th scope="col">ACTION</th>
                            </tr>
                          </thead>
                            <tbody>
                              <?php
                              $no = 1;
                              foreach($list_pengumuman as $row){ ?>
                                <tr>
                                  <td><?= $no ?></td>
                                  <td><?= $row['judul'] ?></td>
                                  <td><?= $row['tgl_dibuat'] ?></td>
                                  <td>
                                    <a href='pengumuman_controllers/detail/<?= $row['id_pengumuman'] ?>' class='btn btn-sm btn-info'>Detail</a>
                                    <a href='pengumuman_controllers/edit/<?= $row['id_pengumuman'] ?>' class='btn btn-sm btn-success'><i class='far fa-edit'></i></a>
                                    <button data-link="<?= base_url('/pengumuman_controllers/delete/'.$row['id_pengumuman']) ?>" type="button" id="do-delete"class="btn btn-sm btn-danger"><i class='far fa-trash-alt'></i></button>
                                  </td>
                                </tr>
                              <?php $no++; } ?>
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
      </div>
    </div>
    
    <?php $this->load->view("_partials/footer.php") ?>
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-delete', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Hapus Pengumuman',
            content: 'Apakah Anda Yakin Akan Menghapus Pengumuman?',
            type: 'red',
            buttons: {   
                ok: {
                  text: "Ya",
                  btnClass: 'btn-primary',
                  keys: ['enter'],
                  action: function(){
                      window.location.href = href; 
                  }
                },
                Tidak: function(){
                  console.log('the user clicked cancel');
                }
            }
          });
        })
      });
      
    </script>
  </body>
</html>
