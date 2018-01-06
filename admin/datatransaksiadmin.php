<?php
    if (empty($_SESSION['username'])) {
        header('location: loginadmin.php');
    }
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <div style="font-size: 50px">Data Transaksi</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php while ($t = mysqli_fetch_array($querytransaksi)) { ?>
                            <div class="col-md-12">
                                <table width="100%">
                                    <tr align="center">
                                        <td style="padding: 10px; width: 30%"><font size="5px"><?php echo "$t[nama]"; ?></font></td>
                                        <td style="padding: 10px; width: 10%"><span style="padding-right: 20px; padding-left: 20px"><img src="..//gambar//566342-1371a68d93c60789d60b8a4c0868a08e.png" width="50px" height="50px"></span></td>
                                        <td style="padding: 10px; width: 30%"><font size="5px"><?php echo "$t[nama_orkes]"; ?></font></td>
                                        <td style="padding: 10px; width: 30%"><a href="?page=detailtransaksi&detail=<?php echo($t[id_transaksi]) ?>" class="btn btn-lg btn-warning">Lihat detail</a></td>
                                    </tr>
                                </table>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->