<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Detail Fakultas</title>
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
                        Profil Fakultas
                    </div>
                    <div class="card card-default">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="id_fakultas">Nama Fakultas</label>
                                    <select class="form-control" id="id_fakultas" name="id_fakultas">
                                        <option value="<?= $jurusanByID['nama_jurusan'] ?>" selected> <?= $jurusanByID['nama_fakultas'] ?> </option>
                                        <?php foreach ($list_fakultas as $list_fakultas) { ?>
                                            <option value="<?php echo $list_fakultas['id_fakultas']; ?>"><?php echo $list_fakultas['nama_fakultas']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama_jurusan">Kode Fakultas</label>
                                    <input type="text" class="form-control" id="kode_fakultas" name="kode_fakultas" value="<?= $fakultasByID['kode_fakultas'] ?>">
                                </div>
                                <button type="submit" class="btn btn-dark mt-3" name="editJurusan">Ubah Data</button>
                            </form>
                        </div>
                        <!--div class="card-footer small text-muted">Updated yesterday at 11:59 PM </div-->
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Daftar Program Studi
                    </div>
                    <div class="card card-default">
                        <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">NAMA PROGRAM STUDI</th>
                                                    <th scope="col">KODE PROGRAM STUDI</th>
                                                    <th scope="col">KODE ANGKATAN</th>
                                                    <th scope="col">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($list_jurusan)) { ?>
                                                    <?php foreach ($list_jurusan as $row => $value) { ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $value['nama_jurusan']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['kode_jurusan']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['angkatan']; ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?= base_url('/fakultas_controllers/exploreJurusan/' . $value['id_jurusan']) ?>" class='btn btn-sm btn-dark'>Explore</a>
                                                                <a href="<?= base_url('/fakultas_controllers/hapusJurusan/' . $value['id_jurusan']) ?>" class='btn btn-sm btn-danger'>Delete</a>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                    ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                        </div>
                        <!--div class="card-footer small text-muted">Updated yesterday at 11:59 PM </div-->
                    </div>
                </div>
                <!-- /.container-fluid -->
                </div>

            </div>
        </div>
    </div>
</body>

</html>