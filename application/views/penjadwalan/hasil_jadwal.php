<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Hasil Generate Penjadwalan</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
</head>

<body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>
    <div class="datadata">
        <div id="wrapper">

            <!-- Sidebar -->
            <?php $this->load->view("_partials/sidebar.php") ?>
            <div id="content-wrapper">
                <div class="container-fluid">

                    <!-- DataTables Example -->
                    <div class="col-sm-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= $my_profile['nama_depan'] . " " . $my_profile['nama_belakang'] ?></h5>
                            <!-- <p class="card-text"></p> -->
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?= $my_profile['nip'] ?></li>
                            <li class="list-group-item"><?= $my_profile['kode_dosen'] ?></li>
                        </ul>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Cetak Jadwal Fakultas</label>
                        <select class="form-control" name="select" id="id_fakultas">
                            <?php foreach ($list_fakultas as $row => $value) { ?>
                                <option value="<?= $value['id_fakultas']?>"><?= $value['nama_fakultas']?></option>
                            <?php } ?>
                        </select>
                        
                        <!-- <a href="<!?= base_url('/Penjadwalan_controllers/cetak') ?>" target="_blank" class="btn btn-primary fa fa-print">  Cetak</a> -->
                        
                    </div>
                    <button id="print_btn" onclick="print_data()" target="_blank" class="btn btn-primary "><span class="fa fa-print"></span> Cetak</button>
                    <br>
                    <br><br>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Hasil Generate Penjadwalan
                        </div>
                        <div class="card card-default">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">NO</th>
                                                    <th scope="col">HARI</th>
                                                    <th scope="col">JAM</th>
                                                    <th scope="col">FAKULTAS</th>
                                                    <th scope="col">PROGRAM STUDI</th>
                                                    <th scope="col">RUANG</th>
                                                    <th scope="col">MATA KULIAH</th>
                                                    <th scope="col">KELAS</th>
                                                    <th scope="col">DOSEN</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($list_hasil_penjadwal)) { 
                                                    $no = 0;?>
                                                    <?php foreach ($list_hasil_penjadwal as $row => $value) { ?>
                                                        <tr>
                                                            <td>
                                                                <?=++$no ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['nama_hari']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['nama_jam']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['nama_fakultas']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['nama_jurusan']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['nama_ruangan']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['nama_matkul']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['nama_kelas']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['nama_depan']; ?> <?php echo $value['nama_belakang']; ?>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function print_data(){
            
            id_fakultas = document.getElementById("id_fakultas").value;
            print_link = '<?=base_url("Penjadwalan_controllers/cetak/")?>' + id_fakultas;
            window.open(print_link, '_blank');
            
            // $.post(print_link,  
            //     {
            //         "id_fakultas": id_fakultas
            //     }
            // );
        }
    
    
    </script>
</body>

</html>
