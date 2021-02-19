<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Daftar Data Fakultas - Gedung</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
</head>

<body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>
    <div class="datadata">
        <div id="wrapper">
            <!-- Sidebar -->
            <?php $this->load->view("_partials/sidebar_admin.php") ?>
            <div id="content-wrapper">
                <div class="container-fluid">
                    <!-- DataTables Example -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Daftar Fakultas Gedung
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th scope="col">NAMA FAKULTAS</th>
                                                <th scope="col">KODE FAKULTAS</th>
                                                <th scope="col">NAMA GEDUNG</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($list_fakultas_gedung)) 
                                            { ?>
                                                <?php foreach ($list_fakultas_gedung as $row => $value) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $value['nama_fakultas']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['kode_fakultas']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['nama_gedung']; ?>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
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
</body>

</html>