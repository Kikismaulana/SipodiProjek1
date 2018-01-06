<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
    <div class="container" align="center">
    	<div style="padding-top: 40px">
    		<a href="index.php?page=home"><img src="gambar//logo1.png" width="300px" height="150px"></a>
    		<div style="box-shadow: 0px -4px 5px -4px black; padding: 10px 0px 1px 0px"></div>
	     	<h3><b>Daftar akun Sistem Pemesanan Orkes Dangdut Indramayu</b></h3><br>
			<p>Sudah punya akun Si PODI ? login
				<a href="login.php">disini</a>
			</p>
    	</div>
    	<div style="width: 50%" align="center">
	    	<?php if (empty($_GET['alert'])) {
	    			echo "";
	  				}
	  				elseif ($_GET['alert'] == 1) {
			    	echo "<div class='alert alert-success alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-ok-circle'></i> Pendaftaran Sukses!</strong>
			          </div>";
			  		}
			?>
		</div>
		<form action="daftar.php" method="POST" style="padding-bottom: 40px; width: 35%">
			<?php include ('errors.php'); ?>
  			<div class="form-group">
			  <label for="usr">Nama Lengkap :</label>
			  <input type="text" class="form-control" id="usr" placeholder="Masukkan Nama Lengkap" name="nama">
			</div>
			<div class="form-group">
			  <label for="pwd">Password :</label>
			  <input type="password" class="form-control" id="pwd" placeholder="Masukkan Password" name="password">
			</div>
			<div class="form-group">
			  <label>Alamat :</label>
			  <input type="text" class="form-control" placeholder="Masukkan alamat" name="alamat" required="">
			</div>
			<div class="form-group">
			  <label for="phon">No. Handphone :</label>
			  <input type="text" class="form-control" placeholder="Masukkan Nomor Handphone" name="no_hp" required="">
			</div>
			<div class="form-group">
				<label for="email">Email address:</label>
    			<input type="email" class="form-control" placeholder="Masukkan email" name="email" required="">
    		</div>
    		<div class="form-group">
    			<label class="radio-inline"><input type="radio" name="jk" value="LAKI-LAKI">Laki-Laki</label>
				<label class="radio-inline"><input type="radio" name="jk" value="PEREMPUAN">Perempuan</label>
			</div>
			<div class="form-group">
				<label>Tanggal Lahir : </label>
        		<input type="date" class="form-control" name="tgl_lahir" required=""><br>
     	 	</div>
     	 	<div class="form-group">
			  <label><img src="captcha/gambar.php" alt="gambar"></label><br>
			  <label>Isikan captcha</label>
			  <input class="form-control" placeholder="Masukkan Captah" name="nilaiCaptcha" value="" maxlength="6">
    		</div>
			<div class="form-group">
				<button style="width: 100%" class="btn btn-lg btn-success" name="daftar">Daftar</button>
			</div>
		</form>
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