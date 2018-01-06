    <?php
        include ('../server.php');
        if (empty($_SESSION['username'])) {
            header('location: loginadmin.php');
        }
        $username = $_SESSION['username'];
        $pengguna = "select * from pengguna";
        $hasilpengguna = mysqli_query($db,$pengguna);
        $jumlah_pengguna = mysqli_num_rows($hasilpengguna);
        $penyedia = "select * from Penyedia where status = 'Disetujui'";
        $hasilpenyedia = mysqli_query($db,$penyedia);
        $jumlah_penyedia = mysqli_num_rows($hasilpenyedia);
        $sqltransaksi = "SELECT * FROM detail";
        $querytransaksi = mysqli_query($db,$sqltransaksi);
        $notif="SELECT * FROM penyedia WHERE notif = 0";
        $resultnotif=mysqli_query($db, $notif);
        $countnotif=mysqli_num_rows($resultnotif);
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ADMIN | Si PODI</title>
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- /.navbar-header -->
            <form method="POST" action="index.php?page=penyedia">
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <button name="permintaanpenyedia" class="btn-link">
                        <i class="fa fa-envelope fa-fw"></i>
                    </button>
                </li>
                <!-- /.dropdown -->
                <li>
                    <button name="permintaanpenyedia" class="btn-link">
                        <i class="fa fa-bell fa-fw"></i>
                        <?php if($countnotif>0) { echo"
                            <span class='badge' style='background-color: red'>
                                 $countnotif
                             </span>";
                        } ?>
                    </button>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index.php?logoutadmin"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            </form>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="?page=dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="?page=pengguna"><i class="fa fa-table fa-fw"></i> Data Pengguna</a>
                        </li>
                        <li>
                            <a href="?page=penyedia"><i class="fa fa-edit fa-fw"></i> Data Penyedia</a>
                        </li>
                        <li>
                            <a href="?page=transaksi"><i class="fa fa-edit fa-fw"></i> Data Transaksi</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    </div>
    <!-- /#wrapper -->
    <?php
        if (empty($_GET["page"])){
            include "dashboard.php";
        }
        elseif ($_GET["page"]=='dashboard'){
            include "dashboard.php";
        }
        elseif ($_GET["page"]=='pengguna'){
            include "datapengguna.php";
        }
        elseif ($_GET["page"]=='penyedia'){
            include "datapenyedia.php";
        }
        elseif ($_GET["page"]=='transaksi'){
            include "datatransaksiadmin.php";
        }
        elseif ($_GET["page"]=='identitaspenyedia'){
            include "identitaspenyedia.php";
        }
        elseif ($_GET["page"]=='detailtransaksi'){
            include "detailtransaksi.php";
        }
    ?>
    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
