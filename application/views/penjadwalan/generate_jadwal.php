<?php
    $success = true;
    $a = 1;
    $b = 5;
    $c = 25;
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
                                            <input class="form-control" id="num_kromosom" name="num_kromosom" value="<?= $num_kromosom ?>" type="number" min="1" max="100" />
                                            <p class="help-block">Masukkan antara 1-100</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Maksimal Generasi</label>
                                            <input class="form-control" id="max_generation" name="max_generation" value="<?= $max_generation ?>" type="number" min="5" max="100" />
                                            <p class="help-block">Masukkan antara <?= $b ?>-100</p>
                                        </div>
                                        <!-- <div class="card-body">
                                            <div class='inner'>
                                                <h7>Jumlah Gedung</h7>    :<?php echo $total_gedung ?>
                                            </div>
                                            <div class='inner'>
                                                <h7>Jumlah Ruangan</h7> : <?php echo $total_ruangan ?>
                                            </div>
                                            <div class='inner'>
                                                <h7>Jumlah Hari</h7> : <?php echo $total_hari ?>
                                            </div>
                                            <div class='inner'>
                                                <h7>Jumlah Shift</h7> : <?php echo $total_shift ?>
                                            </div>
                                            <div class='inner'>
                                                <h7>Jumlah Dosen</h7> : <?php echo $total_dosen ?>
                                            </div>
                                            <div class='inner'>
                                                <h7>Jumlah Kuliah</h7> : <?php echo $total_kuliah ?>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <table>
                                                    <tr>
                                                        <th rowspan="1" >Data</th>
                                                        <th colspan="1" >Jumlah</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Gedung</td>
                                                        <td align=center><?php echo $total_gedung ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Ruangan</td>
                                                        <td align=center><?php echo $total_ruangan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Hari</td>
                                                        <td align=center><?php echo $total_hari ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Shift</td>
                                                        <td align=center><?php echo $total_shift ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-sm-3">
                                                <table>
                                                    <tr>
                                                        <th rowspan="1" > Data</th>
                                                        <th colspan="1" >Jumlah</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Fakultas</td>
                                                        <td align=center><?php echo $total_gedung ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Program Studi</td>
                                                        <td align=center><?php echo $total_ruangan ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Kelas</td>
                                                        <td align=center><?php echo $total_kelas ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah MKDU</td>
                                                        <td align=center><?php echo $total_mkdu ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-sm-3">
                                                <table>
                                                    <tr>
                                                        <th rowspan="1" >Data</th>
                                                        <th colspan="1" >Jumlah</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Dosen</td>
                                                        <td align=center><?php echo $total_dosen ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jumlah Kuliah</td>
                                                        <td align=center><?php echo $total_kuliah ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                            
                                        
                                        <br>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="debug" <?=(isset($_GET['debug'])) ? 'checked' : ''?> name="debug" /> Tampilkan Proses Algoritma
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
                                                <input class="form-control" id="crossover_rate" name="crossover_rate" value="<?= $crossover_rate ?>" type="number" min="1" max="100" />
                                                <p class="help-block">Masukkan antara 1-100</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Mutation Rate</label>
                                                <input class="form-control" id="mutation_rate" name="mutation_rate" value="<?= $mutation_rate ?>" type="number" min="1" max="100" />
                                                <p class="help-block">Masukkan antara 1-100</p>
                                            </div>
                                        </div>
                                        <button onclick="generate()" class="btn btn-primary">Generate Jadwal</button>
                                        <!--  </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" hidden id="card_res">
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
                                                <button class="btn btn-success" onclick="pref_btn()">
                                                    Previous
                                                </button>
                                            </div>
                                            <div class="col-sm-4 text-center" id="label_mid_res">
                                                Result <p id="res_number">1</p>
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <button class="btn btn-success"onclick="next_btn()"> 
                                                    Next
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                            <div id="res_table" class="table-responsive-lg"></div>
                                            </div>
                                        </div>
                                        <button onclick="save_jadwal()" id="btnSave" class="btn btn-primary float-right">Simpan Jadwal</button>
                                        <br>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script >
        let jml_ruangan;
        let jml_hari;
    </script>
    <script src="<?= base_url() ?>assets/js/evolution/evolutionarry-algoritm.js"> </script>
    <script>
        let data_preferensi_dosen;
        let data_ruangan;
        //let temp_pref_dosen;
        let data_class_requirement;
        // let data_scheduled_class;
        let unique_sks;
        let num_kromosom = parseInt(document.getElementById("num_kromosom").value);
        let max_generation = parseInt(document.getElementById("max_generation").value);
        let crossover_rate = parseFloat(document.getElementById("crossover_rate").value);
        let mutation_rate = parseFloat(document.getElementById("mutation_rate").value);

        let save_link = '<?=base_url("Penjadwalan_controllers/save_jadwal")?>';
        let delete_link = '<?=base_url("Penjadwalan_controllers/delete_all")?>';
        let next_link = '<?=base_url("Penjadwalan_controllers/hasil_generate")?>';

        let mod = [];
        let problem = [];
        let group_pref_per_matkul;
        let uncomplete_data_matkul;
        let results;
        
        let result_sets;

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
            data_ruangan = <?= json_encode($data_ruangan) ?>;
            data_class_requirement = <?= json_encode($data_class_requirement) ?>;

            num_kromosom = parseInt(document.getElementById("num_kromosom").value);
            max_generation = parseInt(document.getElementById("max_generation").value);
            crossover_rate = parseFloat(document.getElementById("crossover_rate").value);
            mutation_rate = parseFloat(document.getElementById("mutation_rate").value);

            console.log("data_preferensi_dosen", data_preferensi_dosen);
            console.log("data_class_requirement", data_class_requirement);

            generateInit();
        }

        function next_btn(){
            let curr_page = parseInt(document.getElementById("res_number").innerHTML);
            if(curr_page + 1 <= num_kromosom){
                generateResult(curr_page);
                document.getElementById("res_number").innerHTML = curr_page + 1;
            }
        }

        function pref_btn(){
            let curr_page = parseInt(document.getElementById("res_number").innerHTML);
            if(curr_page - 1 >= 1){
                generateResult(curr_page - 2);
                document.getElementById("res_number").innerHTML = curr_page - 1;
            }
        }
        

    </script>
    <script src="<?= base_url() ?>assets/js/evolution/evo_jadwal_matkul.js"></script>
</body>

</html>

