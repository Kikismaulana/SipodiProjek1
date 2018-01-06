<?php include '../server.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<style type="text/css" media="screen">
		.glyphicon-comment{
			font-size: 30px;
		}
		.glyphicon-bell{
			font-size: 30px;
		}
	</style>
</head>
<body>
    <div class="container" style="padding: 50px">
    	<div class="row">
    		<div class="col-md-12" align="center">
    			<div class="panel panel-primary">
			      <div class="panel-heading"><h2><b>Silahkan Isi Form Dengan Benar</b></h2></div>
			      <div class="panel-body">
			      	<?php 
						$imei = $_GET['booking'];
						$id_penyedia = $_GET['penyedia'];
					?>
			      	<form method="POST" action="booking.php?penyedia=<?php echo"$id_penyedia"?>&booking=<?php echo($imei) ?>">
				      	<div class="form-group">
						  <label>Nama Acara :</label>
						  <input required="" type="text" class="form-control" placeholder="Masukkan Nama Acara (Contoh : Hajatan/Konser dll.)" style="width: 50%" name="acara">
						</div>
						<div class="form-group">
						  <label>Alamat :</label>
						  <input required="" type="text" class="form-control" placeholder="Masukkan Lokasi Acara" style="width: 50%" name="alamat">
						</div>
						<div class="form-group">
						  <label for="phon">Nomor Handphone :</label>
						  <input required="" type="text" class="form-control" placeholder="Masukkan Nomor Handphone" style="width: 50%" name="no_hp">
						</div>
					    <div class="form-group">
						  <label>Deskripsi Acara :</label>
						  <input required="" type="textarea" class="form-control" placeholder="Masukkan Deskripsi Acara (Contoh : Sunatan/nikahan/17an dimulai dari pagi sampai malam)" style="width: 50%" name="deskripsi">
						</div>
						<div class="form-group">
							<label>Tanggal Booking : </label>
					        <input required="" type="date" class="form-control" style="width: 50%" name="tanggal_booking">
					    </div>
					    <div align="center" style="padding-bottom: 20px; padding-top: 20px">
					    	<a href="index.php?page=lihatorkes&penyedia=<?php echo($id_penyedia) ?>" class="btn btn-danger"><font size="5">BATAL</font></a>
						    <button class="btn btn-success" name="booking"><font size="5">KIRIM</font></button>
					    </div>
					</form>
			      </div>
			    </div>
    		</div>
    	</div>
    </div>
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