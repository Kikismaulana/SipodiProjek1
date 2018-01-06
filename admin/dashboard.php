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
                                    <div style="font-size: 50px">Jumlah <b> Pengguna </b></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" align="center">
                            <div style="font-size: 150px" align="centr">
                                <?php
                                    echo "$jumlah_pengguna";
                                ?>
                            </div>
                        </div>
                        <a href="?page=pengguna">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <div style="font-size: 50px">Jumlah <b> Penyedia </b></div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body" align="center">
                            <div style="font-size: 150px" align="centr">
                                <?php
                                    echo "$jumlah_penyedia";
                                ?>
                            </div>
                        </div>
                        <a href="?page=penyedia">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-wrapper -->