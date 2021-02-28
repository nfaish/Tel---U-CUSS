<style>
    .row {
        margin-right: -15px;
        margin-left: -15px;
    }

    .col-xs-1,
    .col-sm-1,
    .col-md-1,
    .col-lg-1,
    .col-xs-2,
    .col-sm-2,
    .col-md-2,
    .col-lg-2,
    .col-xs-3,
    .col-sm-3,
    .col-md-3,
    .col-lg-3,
    .col-xs-4,
    .col-sm-4,
    .col-md-4,
    .col-lg-4,
    .col-xs-5,
    .col-sm-5,
    .col-md-5,
    .col-lg-5,
    .col-xs-6,
    .col-sm-6,
    .col-md-6,
    .col-lg-6,
    .col-xs-7,
    .col-sm-7,
    .col-md-7,
    .col-lg-7,
    .col-xs-8,
    .col-sm-8,
    .col-md-8,
    .col-lg-8,
    .col-xs-9,
    .col-sm-9,
    .col-md-9,
    .col-lg-9,
    .col-xs-10,
    .col-sm-10,
    .col-md-10,
    .col-lg-10,
    .col-xs-11,
    .col-sm-11,
    .col-md-11,
    .col-lg-11,
    .col-xs-12,
    .col-sm-12,
    .col-md-12,
    .col-lg-12 {
        position: relative;
        min-height: 1px;
        padding-right: 15px;
        padding-left: 15px;
    }

    .col-lg-12 {
        width: 100%;
    }

    .col-lg-6 {
        width: 50%;
    }

    .text-center {
        text-align: center;
    }

    .table,
    .th,
    .td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<body>


    <div class="row">
        <div class="col-lg-12">
            <h4 class="text-center"> DATA PENJADWALAN TELKOM UNIVERSITY</h4>
        </div>
    </div>

    <?php if (!empty($group_kelas)) { ?>
        <?php foreach ($group_kelas as $row => $value) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <table>
                                <tr>
                                    <td> <strong>Fakultas</strong> </td>
                                    <td> <?= ":  " . $value[0]['nama_fakultas'] ?> </td>
                                </tr>
                                <tr>
                                    <td> <strong>Kelas </strong></td>
                                    <td> <?= ":  " . $value[0]['nama_kelas'] ?> </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="th"> NO </th>
                                        <th class="th"> HARI </th>
                                        <th class="th"> JAM </th>
                                        <th class="th"> SKS </th>
                                        <th class="th"> MATA KULIAH </th>
                                        <th class="th"> RUANGAN </th>
                                        <th class="th"> DOSEN </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($value as $row_ => $value_) { ?>
                                        <tr>
                                            <td class="td text-center"> <?= $no++ ?> </td>
                                            <td class="td text-center"> <?= $value_['nama_hari'] ?> </td>
                                            <td class="td text-center"> <?= $value_['nama_jam'] ?> </td>
                                            <td class="td text-center"> <?= $value_['sks'] ?> </td>
                                            <td class="td "> <?= $value_['nama_matkul'] ?> </td>
                                            <td class="td text-center"> <?= $value_['nama_ruangan'] ?> </td>
                                            <td class="td"> <?= $value_['nama_depan'] ?> <?= $value_['nama_belakang'] ?> </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <br>
            <br>
        <?php } ?>
    <?php } ?>

</body>
