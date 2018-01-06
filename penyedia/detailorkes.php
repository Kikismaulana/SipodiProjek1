<?php
	include '../server.php';
	$imei = $_GET['imei'];
	$dekorasi="SELECT * from jenis_dekorasi WHERE id_tipe = $imei";
   	$dapatdekorasi = mysqli_query($db, $dekorasi);
   	$penyanyi="SELECT * from penyanyi WHERE id_tipe = $imei";
   	$dapatpenyanyi = mysqli_query($db, $penyanyi);
   	$pemusik="SELECT * from pemusik WHERE id_tipe = $imei";
   	$dapatpemusik = mysqli_query($db, $pemusik);
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
</head>
<body>
	<div class="container" style="padding: 50px">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="panel panel-primary">
			      	<div class="panel-heading" align="center"><h2><b>Detail Tipe Panggung</b></h2></div>
			      		<div class="panel-body">
			      			<div style="padding: 30px">
						    	<legend class="col-md-12" style="border-color: #797a7c">
					       			<b>Dekorasi</b>
					       		</legend>
					       		<?php
									while($d = mysqli_fetch_array($dapatdekorasi)){
								?>
					       		<div class="col-md-4 col-sm-6 col-lg-2">
								    <div class="thumbnail">
								      <img src="<?php echo "gambar/dekorasi/".$d['foto']; ?>">
								      <div class="caption">
								        <h3><?php echo $d['nama_dekorasi'] ?></h3>
								      </div>
								    </div>
								</div>
								<?php } ?>
								<legend class="col-md-12" style="border-color: #797a7c; padding-top: 30px">
					       			<b>Penyanyi</b>
					       		</legend>
					       		<?php
									while($p = mysqli_fetch_array($dapatpenyanyi)){
								?>
					       		<div class="col-md-4 col-sm-6 col-lg-2">
								    <div class="thumbnail">
								      <img src="<?php echo "gambar/penyanyi/".$p['foto']; ?>">
								      <div class="caption">
								        <h4><?php echo $p['nama_penyanyi'] ?></h4>
								      </div>
								    </div>
								</div>
								<?php } ?>
						    	<legend class="col-md-12" style="border-color: #797a7c; padding-top: 30px">
					       			<b>Pemusik</b>
					       		</legend>
					       		<?php
									while($pe = mysqli_fetch_array($dapatpemusik)){
								?>
					       		<div class="col-md-4 col-sm-6 col-lg-2">
								    <div class="thumbnail">
								      <img src="<?php echo "gambar/pemusik/".$pe['foto']; ?>">
								      <div class="caption">
								        <h3><?php echo $pe['nama_alat_pemusik'] ?></h3>
								        <p><?php echo $pe['nama_pemusik'] ?></p>
								      </div>
								    </div>
								</div>
								<?php } ?>
								<div class="col-md-12">
									<span class="pull-right">
										<a href="index.php?page=penyedia" class="btn btn-info">Kembali</a>
									</span>
								</div>
				   	 		</div>
				   	 	</div>
				   	</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>