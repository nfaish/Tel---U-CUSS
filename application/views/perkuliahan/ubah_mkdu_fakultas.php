<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tel - U CUSS | Ubah Data Mata Kuliah Dasar Umum Jurusan</title>
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
                      Ubah Data Mata Kuliah Dasar Umum Jurusan
                </div>
                    <div class="card card-default">
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table">
                                      <form action="" method="post">
                                        <div class="form-group">
                                            <label for="id_fakultas">Nama Fakultas</label>
                                            <select class="form-control" id="<?php echo $dataMKDU['id_fakultas']; ?>" name="id_fakultas">
                                                <option value=""> - Pilih Fakultas - </option>
                                                <?php foreach ($list_fakultas as $list_fakultas) { ?>
                                                    <option value="<?php echo $list_fakultas['id_fakultas']; ?>"><?php echo $list_fakultas['nama_fakultas']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="id_fakultas">Nama Program Studi</label>
                                            <select class="form-control" id="<?php echo $dataMKDU['id_jurusan']; ?>" name="id_jurusan">
                                                <option value=""> - Pilih Program Studi - </option>
                                                <?php foreach ($list_jurusan as $list_jurusan) { ?>
                                                    <option value="<?php echo $list_jurusan['id_jurusan']; ?>"><?php echo $list_jurusan['nama_jurusan']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="angkatan">Angkatan</label>
                                            <select class="form-control" id="<?php echo $dataMKDU['angkatan']; ?>" name="angkatan">
                                                <option value=""> - Pilih Tahun Angkatan - </option>
                                                <?php foreach ($list_angkatan as $list_angkatan) { ?>
                                                    <option value="<?php echo $list_angkatan['id_angkatan']; ?>"><?php echo $list_angkatan['angkatan']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <label for="kode_matkul">Nama Mata Kuliah</label>
                                        <?php if (!empty($list_matkul)) { ?>
                                            <?php foreach ($list_matkul as $row => $value) { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="<?php echo $dataMKDU['id_matkul[]']; ?>" value="<?= $value['id_matkul']; ?>">
                                                    <?php echo $value['nama_matkul']; ?>
                                                </div>
                                            <?php }
                                            ?>
                                        <?php } ?><br><br>
                                          <button type="submit" class="btn btn-dark mt-3" name="simpanMKDU">Simpan</button>
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
