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
          <!-- <div class="page-header">
              <center><h2 class="entry-title">Telkom University Course Scheduling System</h2></center>
          </div><br>
          <div class="entry-body">
              <h4>Telkom University Course Scheduling System atau TEL-U CUSS adalah sebuah aplikasi 
              berbasis website yang bertujuan untuk ... .</h4>
          </div><br> -->
          <div class="row">
              <div class="col-md-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <center><h3 class="entry-title">Telkom University Course Scheduling System</h3></center>
                  </div>
                  <div class="card-body" align="justify">
                      <p style="text-indent: 45px;">Telkom University Course Scheduling System atau TEL-U CUSS adalah sebuah aplikasi 
                        sistem penjadwalan berbasis website yang berfungsi untuk melakukan penjadwalan untuk Mata Kuliah Dasar Umum (Dosen Luar Biasa) di Universitas Telkom.
                        <br>Pada Universitas Telkom sendiri, terdapat beberapa Mata Kuliah Dasar Umum seperti :
                        <ol type="1"> 
                          <li>Bahasa Indonesia</li> 
                          <li>Bahasa Inggris</li>
                          <li>Pendidikan dan Kewarganegaraan</li>
                          <li>Pendidikan Agama dan Etika</li>
                          <li>Literasi TIK</li>
                          <li>Kewirausahaan </li>
                        </ol> 
                        Sebagian besar semua Mata Kuliah Dasar Umum diatas diajar atau diampu oleh Dosen Luar Biasa.
                        Sedangkan pada penerapannya dilapangan, proses penjadwalan dari Mata Kuliah Dasar Umum (MKDU) ini sendiri masih dilakukan secara manual dan dibutuhkannya waktu yang cukup lama untuk PPDU (Program Perkuliahan Dasar dan Umum) dalam membuat penjadwalan tersebut. 
                        PPDU (Program Perkuliahan Dasar dan Umum) adalah sebuah unit pelaksana akademik dengan tugas pokok membantu seluruh fakultas/program studi dalam penyelenggaraan matakuliah universitas bawah Direktorat Akademik Universitas Telkom.
                        Berdasarkan kendala diatas maka dibuatlah sebuah aplikasi bernama TEL-U CUSS yang menjadi wadah untuk mempermudah dan memaksimalkan PPDU dalam mengatur serta mengelola sumber daya yang ada untuk penjadwalan Mata Kuliah Dasar Umum (Dosen Luar Biasa).
                      </p>
                  </div>
                </div>
              </div>
            </div>
          <?php
            foreach($list_pengumuman as $row)
            { ?>
            <div class="row">
              <div class="col-md-12">
                <div class="card mb-3">
                  <div class="card-header">
                    <i class="fas fa-bullhorn"></i>
                    <?= $row['judul'] ?>
                  </div>
                  <div class="card-body" align="justify">
                    <?= $row['pengumuman'] ?>
                    <?php 
                      if (!empty($row['file'])) { ?>
                        <hr>
                        <a href="<?php print base_url('/assets/documents/pengumuman/'.$row['file']) ?>" target="blank  ">
                          <i class="fas fa-file-download"></i>
                          <?= $row['file'] ?>
                        </a>
                        <?php
                      }
                    ?>
                  </div>
                  <div class="card-footer small text-muted">Updated <?= $row['tgl_dibuat'] ?></div>
                </div>
              </div>
            </div>
          <?php } ?>
      </div>
    </div>
  </div>
  
  <?php $this->load->view("_partials/footer.php") ?>
</body>



</html>