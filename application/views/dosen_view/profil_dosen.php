<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Profil Dosen</title>
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
                    <?php if ($this->session->flashdata('alert')) {?>
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <?php echo $this->session->flashdata('alert'); ?>
                        </div>
                    <?php } ?>
                    <div class="card card-default">
                    <div class="card-header" style="text-align:center"><h4>My Profile</h4></div>
                        <div class="row">
                            <div class="col-sm-6"><br>
                                <div class="card card-default">
                                    <div class="card-header" style="text-align:center">Main Data</div>
                                        <div class="card-body">
                                            <form action="" method="post">
                                                <div class="form-group">
                                                    <label for="nama_depan">Nama Depan</label>
                                                    <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?= $my_profile['nama_depan']?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama_depan">Nama Belakang</label>
                                                    <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?= $my_profile['nama_belakang']?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nip">Username</label>
                                                    <input type="text" class="form-control" id="username" name="username" value="<?= $my_profile['username'] ?>" >
                                                </div>
                                                <!-- <div class="form-group">
                                                    <label for="nip">Password</label>
                                                    <input type="text" class="form-control" id="password" name="password" value="<?= $my_profile['password'] ?>" disabled>
                                                </div> -->
                                                <div class="form-group">
                                                    <label for="nip">NIP</label>
                                                    <input type="text" class="form-control" id="nip" name="nip" value="<?= $my_profile['nip'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kode_dosen">Kode Dosen</label>
                                                    <input type="text" class="form-control" id="kode_dosen" name="kode_dosen" value="<?= $my_profile['kode_dosen'] ?>" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" value="<?= $my_profile['email'] ?>">
                                                </div>
                                                <!-- <button type="submit" class="btn btn-dark mt-3" name="updateDosen">Update</button> -->
                                            
                                        </div>
                                    </div>
                                </div>
                            <div class="col-sm-6"><br>
                                <div class="card card-default">
                                    <div class="card-header" style="text-align:center">Additional Data</div>
                                        <div class="card-body">
                                            
                                                <div class="form-group">
                                                    <label for="jab_fungsional">Jabatan Fungsional</label>
                                                    <input type="text" class="form-control" id="jab_fungsional" name="jab_fungsional" value="<?= $detailAdditional['jab_fungsional'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="jab_struktural">Jabatan Struktural</label>
                                                    <input type="text" class="form-control" id="jab_struktural" name="jab_struktural" value="<?= $detailAdditional['jab_struktural'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="kota_asal">Kota Asal</label>
                                                    <input type="text" class="form-control" id="kota_asal" name="kota_asal" value="<?= $detailAdditional['kota_asal'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $detailAdditional['tanggal_lahir'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="alamat">Alamat</label>
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $detailAdditional['alamat'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="no_telp">Nomor Ponsel</label>
                                                    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $detailAdditional['no_telp'] ?>">
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <button type="submit" class="btn btn-dark mt-3" name="updateDosen">Update</button>
                                </form>
                                
                        </div>
                        <br>
                            <tr>
                                <td>
                                    <button class="btn btn-default" onclick="location.href='<?php echo base_url();?>Pengaturan_controllers/ubahPass'"><i class='fas fa-key'></i>  Ubah Password</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>