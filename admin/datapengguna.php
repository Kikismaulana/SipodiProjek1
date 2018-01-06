<?php
    if (empty($_SESSION['username'])) {
        header('location: loginadmin.php');
    }
    $username = $_SESSION['username'];
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
                                    <div style="font-size: 50px">Data <b> Pengguna </b></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php    
                                while($data = mysqli_fetch_array($hasilpengguna)){
                            ?>
                            <div class="col-md-12">
                                <span class="pull-left">
                                	<font size="5px"><?php echo "$data[nama]"; ?></font><br>
                                    <span style="padding-left: 20px"></span>
                                </span>
                                <span class="pull-right">
                                    <a href="delete.php?stat=pengguna&imei=<?php echo "$data[id_pengguna]"; ?>" class="pull-right" style="padding-top: 10px"><i style="color: #9F3033" class="glyphicon glyphicon-trash"></i></a>
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