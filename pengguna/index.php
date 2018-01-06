<?php
    include ('../server.php');
    if (empty($_SESSION['email'])) {
        header('location: ../login.php');
    }
    $id_pengguna = $_SESSION['id_pengguna'];
    $sql = "SELECT * FROM pengguna where id_pengguna = $id_pengguna";
    $data = mysqli_query($db, $sql);
    $result = mysqli_fetch_array($data);
    $foto = "SELECT foto FROM pengguna WHERE id_pengguna = $id_pengguna";
    $dapat = mysqli_query ($db, $foto);
    $sqlpenyedia = "SELECT * FROM penyedia where id_pengguna = $id_pengguna";
    $datapenyedia = mysqli_query($db, $sqlpenyedia);
    $resultpenyedia = mysqli_fetch_array($datapenyedia);
    $tampilanpenyedia = "SELECT foto FROM penyedia WHERE id_pengguna = $id_pengguna";
    $dapatfotopenyedia = mysqli_query ($db, $foto);
    $transaksi="SELECT * from transaksi WHERE id_pengguna = $id_pengguna";
    $dapattransaksi = mysqli_query($db, $transaksi);
    $sql2="SELECT * FROM transaksi WHERE id_pengguna = $id_pengguna && status = 2 && keterangan != 'Request'";
    $result2=mysqli_query($db, $sql2);
    $count=mysqli_num_rows($result2);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../tinymce/js/tinymce/tinymce.min.js"></script>
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
		.glyphicon-comment{
			font-size: 30px;
		}
		.glyphicon-bell{
			font-size: 30px;
		}
        .ukuran {
            font-size: 20px;
            color: black;
        }
        .pad{
            padding: 10px;
        }
        .prev, .next {
          cursor: pointer;
          position: absolute;
          top: 50%;
          width: auto;
          padding: 16px;
          margin-top: -22px;
          color: white;
          font-weight: bold;
          font-size: 18px;
          transition: 0.6s ease;
          border-radius: 0 3px 3px 0;
        }

        /* Position the "next button" to the right */
        .next {
          right: 0;
          border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
          background-color: rgba(0,0,0,0.8);
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
<body style="background-color: #F5F5F5">
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
                <a href="?page=dashboard"><img src="../gambar//LOGO1.png" width="140px" height="70px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form method="POST" action="index.php?page=transaksi">
                <ul class="nav navbar-nav navbar-right" style="padding: 18px 30px 0px 0px">
                    <li>
                        <a href="#">
                            <span style="color:white; opacity: 0.6; font-size: 30px" class="glyphicon glyphicon-comment"></span>
                            <span class="badge" style="background-color: red"></span>
                        </a>
                    </li>
                    <li style="padding-top: 15px">
                        <button name="ditanggapi" class="btn-link">
                            <span style="color:white; opacity: 0.6; font-size: 30px" class="glyphicon glyphicon-bell"></span>
                            <?php if($count>0) { echo"
                            <span class='badge' style='background-color: red'>
                                 $count"; } ?>
                            </span>
                        </button>
                    </li>
                    <li class="dropdown" style="font-size: 30px">
			            <a href="" style="color:white; opacity: 0.6" class="dropdown-toggle" data-toggle="dropdown"><font size="4"><?php echo "$result[nama] "; ?></font><span style="color:white; opacity: 0.8" class="glyphicon glyphicon-user"></span><b class="caret"></b></a>
			            <ul class="dropdown-menu">
			              <?php
                            if ($result['status']=="pengguna"){
                                echo "<li><a href='?page=pengguna'><span class='glyphicon glyphicon-user'> Pengguna</span></a></li>
                                      <li><a href='index.php?logout'><span class='glyphicon glyphicon-log-out'> Keluar</span></a></li>";
                                }
                            else {
                                echo "<li><a href='?page=pengguna'><span class='glyphicon glyphicon-user'> Pengguna</span></a></li>
                                      <li><a href='../penyedia/index.php?page=penyedia'><span class='glyphicon glyphicon-briefcase'> Penyedia</span></a></li>
                                      <li><a href='index.php?logout'><span class='glyphicon glyphicon-log-out'> Keluar</span></a></li>";
                            }
                          ?>
			            </ul>
			        </li>
                </ul>
                </form>
                <form action="?page=dashboard" method="POST" class="navbar-right" role="search" style="width: 50%; padding: 35px 20px 20px 0px">
                    <div class="form-group-sm">
                        <div class="input-group">
                            <input name="masukkan" type="text" class="form-control" placeholder="Cari orkes dangdut">
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-sm" name="cari">Cari</button>
                            </span>
                        </div>
                    </div>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <?php
        if (empty($_GET["page"])){
            include "dashboard.php";
        }
        elseif ($_GET["page"]=='lihatorkes'){
            include "tampilanorkes.php";
        }
        elseif ($_GET["page"]=='dashboard'){
            include "dashboard.php";
        }
        elseif ($_GET["page"]=='pesan'){
            include "dashboard.php";
        }
        elseif ($_GET["page"]=='notif'){
            include "transaksi.php";
        }
        elseif ($_GET["page"]=='pengguna'){
            include "profil.php";
        }
        elseif ($_GET["page"]=='informasi'){
            include "profil.php";
        }
        elseif ($_GET["page"]=='perbaruiinformasi'){
            include "perbarui.php";
        }
        elseif ($_GET["page"]=='transaksi'){
            include "transaksi.php";
        }
        elseif ($_GET["page"]=='sebagaipenyedia'){
            include "../penyedia/tambahpenyedia.php";
        }
        elseif ($_GET["page"]=='sampul'){
            include "../pengguna/ubahforosampul.php";
        }
    ?>
    <div class="row" style="box-shadow: 0px -4px 5px -4px black; padding: 20px 0px 20px 0px">
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