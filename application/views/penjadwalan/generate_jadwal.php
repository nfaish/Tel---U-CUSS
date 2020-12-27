<?php
$success = true;
$a = 10;
$b = 25;
$c = 75;
$d = 25;
$num_kromosom = $a;
$max_generation = $b;
$crossover_rate = $c;
$mutation_rate = $d;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Generate Penjadwalan</title>
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
                    </div>
                    <br>

                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Generate Penjadwalan
                        </div>

                        <div class="col-sm-12">
                            <div class="card card-default">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <form action="<?= base_url('hitung/hitung') ?>" method="post">
                                                <div class="form-group">
                                                    <label>Jumlah Kromosom Dibangkitkan</label>
                                                    <input class="form-control" type="text" name="num_kromosom" value="<?=$num_kromosom?>"/>
                                                    <p class="help-block">Masukkan antara <?=$a?>-500</p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Maksimal Generasi</label>
                                                    <input class="form-control" type="text" name="max_generation" value="<?=$max_generation?>" />
                                                    <p class="help-block">Masukkan antara <?=$b?>-500</p>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="debug"> Tampilkan Proses Algoritma
                                                    </label>
                                                </div>
                                                <a class="btn btn-info" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                    Opsi Lain
                                                </a>
                                                <div class="collapse" id="collapseExample">
                                                    <hr />
                                                    <div class="well">

                                                    </div>
                                                    <div class="form-group">
                                                        <label>Crossover Rate</label>
                                                        <input class="form-control" type="text" name="crossover_rate" value="<?=$crossover_rate?>" />
                                                        <p class="help-block">Masukkan antara 1-100</p>
                                                    </div>   
                                                    <div class="form-group">
                                                        <label>Mutation Rate</label>
                                                        <input class="form-control" type="text" name="mutation_rate" value="<?=$mutation_rate?>" />
                                                        <p class="help-block">Masukkan antara 1-100</p>
                                                    </div>
                                                </div>
                                            <button class="btn btn-primary">Generate Jadwal</button> 
                                        </form>
                                    </div>
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