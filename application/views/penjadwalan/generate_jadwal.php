<?php
    $success = true;
    $a = 5;
    $b = 5;
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
                            <h5 class="card-title"><?= $my_profile['nama_depan'] . " " . $my_profile['nama_belakang'] ?>
                            </h5>
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
                                        <!-- <form action="<?= base_url('hitung/hitung') ?>" method="post"> -->
                                        <div class="form-group">
                                            <label>Jumlah Kromosom Dibangkitkan</label>
                                            <input class="form-control" type="text" id="num_kromosom"
                                                name="num_kromosom" value="<?=$num_kromosom?>" />
                                            <p class="help-block">Masukkan antara <?=$a?>-75</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Maksimal Generasi</label>
                                            <input class="form-control" type="text" id="max_generation"
                                                name="max_generation" value="<?=$max_generation?>" />
                                            <p class="help-block">Masukkan antara <?=$b?>-100</p>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="debug"> Tampilkan Proses Algoritma
                                            </label>
                                        </div>
                                        <a class="btn btn-info" role="button" data-toggle="collapse"
                                            href="#collapseExample" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            Opsi Lain
                                        </a>
                                        <div class="collapse" id="collapseExample">
                                            <hr />
                                            <div class="well">

                                            </div>
                                            <div class="form-group">
                                                <label>Crossover Rate</label>
                                                <input class="form-control" type="text" id="crossover_rate"
                                                    name="crossover_rate" value="<?=$crossover_rate?>" />
                                                <p class="help-block">Masukkan antara 1-100</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Mutation Rate</label>
                                                <input class="form-control" type="text" id="mutation_rate"
                                                    name="mutation_rate" value="<?=$mutation_rate?>" />
                                                <p class="help-block">Masukkan antara 1-100</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary">Generate Jadwal</button>
                                        <!--  </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Generate Result
                        </div>
                        <div class="col-sm-12">
                            <div class="card card-default">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <div class="row">
                                            <div class="col-sm-4 text-center">
                                                <button class="btn btn-success">
                                                    Previous
                                                </button>
                                            </div>
                                            <div class="col-sm-4 text-center" id="label_mid_res">
                                                Result 1
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <button class="btn btn-success">
                                                    Next
                                                </button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12" id="table_result">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url()?>assets/js/evolution/evolutionarry-algoritm.js"> </script>
    <script>
    let data_preferensi_dosen;
    //let temp_pref_dosen;
    let data_class_requirement;
    // let data_scheduled_class;
    let unique_sks;
    let num_kromosom = parseInt(document.getElementById("num_kromosom").value);
    let max_generation = parseInt(document.getElementById("max_generation").value);
    let crossover_rate = parseFloat(document.getElementById("crossover_rate").value);
    let mutation_rate = parseFloat(document.getElementById("mutation_rate").value);

    let mod = [];
    let problem = [];
    let group_pref_per_matkul;
    let uncomplete_data_matkul;

    function generate() {
        
        group_pref_per_matkul = [];
        uncomplete_data_matkul = [];

        //temp_pref_dosen = [];
        unique_sks = <?= json_encode($data_unique_sks) ?>;
        for (let idx = 0; idx < unique_sks.length; idx++) {
            // console.log("unique_sks[idx]", unique_sks[idx]);
            unique_sks[idx] = parseInt(unique_sks[idx]["sks"]);
            
        }
        console.log("unique_sks", unique_sks);

        data_preferensi_dosen = <?= json_encode($data_preferensi_dosen) ?>;
        data_class_requirement = <?= json_encode($data_class_requirement) ?>;

        num_kromosom = parseInt(document.getElementById("num_kromosom").value);
        max_generation = parseInt(document.getElementById("max_generation").value);
        crossover_rate = parseFloat(document.getElementById("crossover_rate").value);
        mutation_rate = parseFloat(document.getElementById("mutation_rate").value);

        console.log("data_preferensi_dosen", data_preferensi_dosen);
        console.log("data_class_requirement", data_class_requirement);

        generateInit();
    }

    </script>
    <script src="<?= base_url()?>assets/js/evolution/evo_jadwal_matkul.js"></script>
</body>

</html>