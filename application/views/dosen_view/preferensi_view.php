<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Preferensi Jadwal Dosen</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
</head>

<body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>

    <div id="wrapper">
        <?php $this->load->view("_partials/sidebar.php") ?>
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="mb-3">
                    <br>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Pilih Preferensi Jadwal Mengajar
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="preferensi/create" method="post">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Hari</th>
                                                    <th scope="col">06:30:00</th>
                                                    <th scope="col">07:30:00</th>
                                                    <th scope="col">08:30:00</th>
                                                    <th scope="col">09:30:00</th>
                                                    <th scope="col">10:30:00</th>
                                                    <th scope="col">11:30:00</th>
                                                    <th scope="col">12:30:00</th>
                                                    <th scope="col">13:30:00</th>
                                                    <th scope="col">14:30:00</th>
                                                    <th scope="col">15:30:00</th>
                                                    <th scope="col">16:30:00</th>
                                                    <th scope="col">17:30:00</th>
                                                    <th scope="col">18:30:00</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($jadwal as $jadwal) : ?>
                                                    <tr>
                                                        <td>
                                                            <!-- $query = $this->db->query("YOUR QUERY"); -->
                                                            <?php echo $jadwal['nama_hari'] ?>
                                                            <input type="hidden" id="custId" name="hari[]" value="<?php echo $jadwal['id_hari'] ?>">
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="6.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="7.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="8.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="9.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="10.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="11.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="12.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="13.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="14.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="15.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="16.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="17.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" name="18.30<?php echo $jadwal['id_hari'] ?>">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="mb-3">
                    <br>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Preferensi Jadwal Mengajar
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <form action="preferensi/create" method="post">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Hari</th>
                                                    <th scope="col">06:30:00</th>
                                                    <th scope="col">07:30:00</th>
                                                    <th scope="col">08:30:00</th>
                                                    <th scope="col">09:30:00</th>
                                                    <th scope="col">10:30:00</th>
                                                    <th scope="col">11:30:00</th>
                                                    <th scope="col">12:30:00</th>
                                                    <th scope="col">13:30:00</th>
                                                    <th scope="col">14:30:00</th>
                                                    <th scope="col">15:30:00</th>
                                                    <th scope="col">16:30:00</th>
                                                    <th scope="col">17:30:00</th>
                                                    <th scope="col">18:30:00</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <?php $this->load->view("_partials/footer.php") ?>
</body>

</html>