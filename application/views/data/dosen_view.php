<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Daftar Data Dosen</title>
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
                            Daftar Dosen
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">NAMA</th>
                                                <th scope="col">NIP</th>
                                                <th scope="col">KODE DOSEN</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($list_dosen)) { ?>
                                                <?php foreach ($list_dosen as $row => $value) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $value['nama_depan']; ?> <?php echo $value['nama_belakang']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['nip']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['kode_dosen']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('/dosen_controllers/exploreDosen/' . $value['nip']) ?>" class='btn btn-sm btn-dark'>Explore</a>
                                                            <a href="<?= base_url('/dosen_controllers/hapusDosen/' . $value['nip']) ?>" class='btn btn-sm btn-danger'>Delete</a>
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
                <div class="container-fluid">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Daftar Dosen Baru
                        </div>
                        <div class="card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">NAMA</th>
                                                <th scope="col">NIP</th>
                                                <th scope="col">KODE DOSEN</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($list_dosenbaru)) { ?>
                                                <?php foreach ($list_dosenbaru as $row => $value) { ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $value['nama_depan']; ?> <?php echo $value['nama_belakang']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['nip']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $value['kode_dosen']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url('/dosen_controllers/accDosen/' . $value['nip']) ?>" class='btn btn-sm btn-dark col-sm-3'>Acc</a>
                                                            <a href="<?= base_url('/dosen_controllers/hapusDosen/' . $value['nip']) ?>" class='btn btn-sm btn-danger col-sm-3'>Reject</a>
                                                            <!-- <a href='algoritma_linearprogramming/<?= $value['id_dosen'] ?>' class='btn btn-sm btn-info'>Jadwalkan</a> -->
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
                    <!-- /.container-fluid -->
                </div>
            </div>
            <!-- Sticky Footer -->
            <!-- <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright © Your Website 2018</span>
                        </div>
                    </div>
                </footer> -->
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/mahasiswa/logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>