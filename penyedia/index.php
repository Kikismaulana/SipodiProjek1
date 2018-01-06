<?php 
    include '../server.php';
    
    if (empty($_SESSION['email'])) {
        header('location: ../login.php');
    }
    $id_pengguna = $_SESSION['id_pengguna'];
    $queryid = "SELECT * FROM penyedia WHERE id_pengguna = {$_SESSION['id_pengguna']}";
    $resultid = mysqli_query($db, $queryid);
    $dapatid = mysqli_fetch_array($resultid);
    $id = $dapatid['id_penyedia'];
    $sql = "SELECT * FROM penyedia where id_pengguna = $id_pengguna";
    $data = mysqli_query($db, $sql);
    $result = mysqli_fetch_array($data);
    $foto = "SELECT foto FROM penyedia WHERE id_pengguna = $id_pengguna";
    $dapat = mysqli_query ($db, $foto);
    $tampil="SELECT * from tipe_panggung WHERE id_penyedia = $id";
    $dapatkan = mysqli_query($db, $tampil);
    $transaksi="SELECT * from transaksi WHERE id_penyedia = $id";
    $dapattransaksi = mysqli_query($db, $transaksi);
    $sql2="SELECT * FROM transaksi WHERE id_penyedia = $id && status = 0";
    $result2=mysqli_query($db, $sql2);
    $count=mysqli_num_rows($result2);
    $adatf = "SELECT * FROM transaksi WHERE id_penyedia = $id && bukti_transfer != '' && status = 4 && statustf = 0";
    $resultadatf=mysqli_query($db, $adatf);
    $countadatf=mysqli_num_rows($resultadatf);
    $jadisatu = $count+$countadatf;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title></title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="../src/jquery.maskMoney.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/calendarview.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="../js/prototype.js"></script>
    <script src="../js/calendarview.js"></script>
    <script type="text/javascript"> 
        tinyMCE.init({
        selector: "textarea",
        });
        function setupCalendars() {
            // Embedded Calendar
            Calendar.setup(
              {
                dateField: 'embeddedDateField',
                parentElement: 'embeddedCalendar'
              }
            )

          }

          Event.observe(window, 'load', function() { setupCalendars() })
    </script>
    <style type="text/css" media="screen">
        .ukuran {
            font-size: 20px;
            color: black;
        }
        .pad{
            padding: 10px;
        }
        .image-preview-input {
            position: relative;
            overflow: hidden;
            margin: 0px;    
            color: #333;
            background-color: #fff;
            border-color: #ccc;    
        }
        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .image-preview-input-title {
            margin-left:2px;
        }
    </style>
</head>
<body style="background-color: #E6E6E6">
    <nav class="navbar navbar navbar-default container-fluid" style="background-color: #2b7cff">
        <div>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="padding: 10px 10px 10px 10px">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../pengguna/index.php"><img src="../gambar//LOGO1.png" width="140px" height="70px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form method="POST" action="index.php?page=transaksipenyedia">
                <ul class="nav navbar-nav navbar-right" style="padding: 18px 30px 0px 0px">
                    <li style="padding-top: 15px">
                        <button name="adayangchat" class="btn-link">
                            <span style="color:white; opacity: 0.6; font-size: 30px" class="glyphicon glyphicon-comment"></span>
                            <span class="badge" style="background-color: red"></span>
                        </button>
                    </li>
                    <li style="padding-top: 15px">
                        <button name="ada" class="btn-link">
                            <span style="color:white; opacity: 0.6; font-size: 30px" class="glyphicon glyphicon-bell"></span>
                            <?php if($count>0 || $countadatf>0) { echo"
                            <span class='badge' style='background-color: red'>
                                 $jadisatu"; } ?>
                        </button>
                    </li>
                    <li class="dropdown" style="font-size: 30px">
                        <a href="" style="color:white; opacity: 0.6" class="dropdown-toggle" data-toggle="dropdown"><font size="4"><?php echo "$result[nama_orkes] "; ?></font><span style="color:white; opacity: 0.8" class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href='../pengguna/index.php?page=pengguna'><span class='glyphicon glyphicon-user'> Pengguna</span></a></li>
                            <li><a href='../penyedia/index.php?page=penyedia'><span class='glyphicon glyphicon-briefcase'> Penyedia</span></a></li>
                            <li><a href='index.php?logout'><span class='glyphicon glyphicon-log-out'> Keluar</span></a></li>
                        </ul>
                      </li>
                </ul>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <?php
        if (empty($_GET["page"])){
            include "profilpenyedia.php";
        }
        elseif ($_GET["page"]=='penyedia'){
            include "../penyedia/profilpenyedia.php";
        }
        elseif ($_GET["page"]=='perbaruiinformasitipeorkespenyedia'){
            include "../penyedia/perbaruiinformasitipeorkespenyedia.php";
        }
        elseif ($_GET["page"]=='perbaruiinformasiorkespenyedia'){
            include "../penyedia/perbaruiinformasiorkespenyedia.php";
        }
        elseif ($_GET["page"]=='perbaruiinformasigaleripenyedia'){
            include "../penyedia/perbaruiinformasigaleripenyedia.php";
        }
        elseif ($_GET["page"]=='transaksipenyedia'){
            include "../penyedia/transaksipenyedia.php";
        }
        elseif ($_GET["page"]=='jadwal'){
            include "../penyedia/jadwal.php";
        }
        elseif ($_GET["page"]=='sampulpenyedia'){
            include "ubahfotosampulpenyedia.php";
        }
        elseif ($_GET["page"]=='masukkandetail1'){
            include "masukkandetailorkes1.php";
        }
        elseif ($_GET["page"]=='masukkandetail2'){
            include "masukkandetailorkes2.php";
        }
        elseif ($_GET["page"]=='masukkandetail3'){
            include "masukkandetailorkes3.php";
        }
        elseif ($_GET["page"]=='masukkandetail4'){
            include "masukkandetailorkes4.php";
        }
        elseif ($_GET["page"]=='atm'){
            include "atmpenyedia.php";
        }
    ?>
    <div class="row" style="box-shadow: 0px -4px 5px -4px black; padding: 20px 0px 20px 0px; background-color: white">
        <div class="container">
            <div class="col-sm-12">
                <footer>
                    <font>&copy Copyright 2017 Si Podi</font>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>