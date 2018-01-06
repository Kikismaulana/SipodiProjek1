<?php
    if (empty($_SESSION['username'])) {
        header('location: loginadmin.php');
    }
    $username = $_SESSION['username'];
    $permintaan = "SELECT * FROM pengguna where status = 'pengguna'";
    $querypermintaan = mysqli_query($db, $permintaan);
?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <div style="font-size: 50px">Permintaan <b> Penyedia </b></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php
                                while ($hasilpermintaan = mysqli_fetch_array($querypermintaan)){
                                $idpermintaan = $hasilpermintaan['id_pengguna'];
                                $request = "SELECT * FROM penyedia where id_pengguna = $idpermintaan";
                                $dapatrequest = mysqli_query($db, $request);
                                    while ($hasilrequest = mysqli_fetch_array($dapatrequest)){
                            ?>
                            <div class="col-md-12">
                                <span class="pull-left">
                                    <font size="5px"><?php echo "$hasilrequest[nama_orkes]"; ?></font><br>
                                    <span style="padding-left: 20px"></span>
                                </span>
                                <span class="pull-right">
                                    <a href="?page=identitaspenyedia&permintaan=<?php echo($hasilrequest[id_penyedia]) ?>" class="btn btn-warning">Lihat Identitas</a>
                                </span>
                            </div>
                            <?php
                                    };
                                };
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <div style="font-size: 50px">Data <b> Penyedia </b></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php    
                                while($data = mysqli_fetch_array($hasilpenyedia)){
                            ?>
                            <div class="col-md-12">
                                <span class="pull-left">
                                    <font size="5px"><?php echo "$data[nama_orkes]"; ?></font><br>
                                    <span style="padding-left: 20px"></span>
                                </span>
                                <span class="pull-right">
                                    <a href="delete.php?stat=penyedia&imei=<?php echo "$data[id_penyedia]"; ?>" class="pull-right" style="padding-top: 10px"><i style="color: #9F3033" class="glyphicon glyphicon-trash"></i></a>
                                </span>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->