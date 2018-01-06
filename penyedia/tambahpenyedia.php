<?php
    if (empty($_SESSION['email'])) {
        header('location: ../login.php');
    }
?>
    <div class="container">
    	<div class="row">
    		<div class="container">
			 	<?php
			 		$foto = "SELECT foto FROM pengguna WHERE id_pengguna = $id_pengguna";
    				$dapat = mysqli_query ($db, $foto); 
					while($d = mysqli_fetch_array($dapat)){
				?>
			  	<div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <div style="background-repeat: no-repeat; background-size: 100% 100%; height: 350px; width: 100%">
								 		<?php if ($d['foto']=="") { ?>
                                    		<img width="100%" height="100%" src="../gambar/SAMPUL.png">
                                    	<?php } else { ?>
								 		<img width="100%" height="100%" src="<?php echo "../pengguna/gambar/sampul/".$d['foto']; ?>">
								 		<?php } ?>
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" align="center">
                        <font style="font-size: 50px">" </font><font size="5"> <?php echo("$result[nama]") ?> </font><font style="font-size: 50px"> "</font>
                    </div>
                </div>
			  	<?php } ?>
			</div>
    	</div>
    	<div class="row">
    		<div class="col-md-12">
    			<legend style="color: black; border-color: black">
	       			<span class="glyphicon glyphicon-plus-sign" style="font-size: 75px"> </span>
	       			<font style="font-size: 40px">Tambah sebagai penyedia</font>
	       		</legend>
    		</div>
    	</div>
    	<div class="row">
			<div class="col-md-3">
				<div class="panel" style="box-shadow: 0px 0px 5px black">
					<div class="sidebar content-box" style="display: block">
		                <ul class="nav">
		                    <!-- Main menu -->
		                    <li  class="pad" class="current"><a href="?page=perbaruiinformasi" class="ukuran"><i class="glyphicon glyphicon-cog"></i> Perbarui Informasi</a></li>
		                    <li class="pad"><a href="?page=informasi"  class="ukuran"><i class="glyphicon glyphicon-info-sign"></i> Informasi</a></li>
		                    <li class="pad"><a href="#" class="ukuran"><i class="glyphicon glyphicon-comment"></i> Chat</a></li>
		                    <li class="pad"><a href="?page=transaksi" class="ukuran"><i class="glyphicon glyphicon-transfer"></i> Transaksi</a></li>
		                    <li class="pad"><a href="?page=sebagaipenyedia" class="ukuran"><i class="glyphicon glyphicon-plus-sign"></i> Sebagai Penyedia</a></li>		                
		                </ul>
		             </div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="panel" style="padding: 0px 40px 0px 40px; box-shadow: 0px 0px 5px black">
	       			<legend style="border-color: black; padding-top: 5px; color: black">
		       			<h2><b>Buat Grup Orkes Dangdut</b></h2>
		       		</legend>
		       		<form method="POST" action="../pengguna/menunggupersetujuan.php" enctype="multipart/form-data">
		       			<?php include ('../errors.php'); ?>
		       			<div class="form-group">
							<label>Nama Orkes Dangdut :</label>
							<input type="text" class="form-control" id="usr" placeholder="Masukkan Nama Lengkap" name="nama_orkes" required="">
						</div>
						<div class="form-group">
							<label>Alamat :</label>
							<input type="text" class="form-control" value="<?php echo ("$result[alamat]") ?>" name="alamat" required="">
						</div>
						<div class="form-group">
				            <h5><b>Upload Foto KTP : </b></h5>
				            <img id="blah" width="350" height="200">
				            <div class="input-group image-preview">
								<span class="input-group-btn">
								    <div class="btn btn-default image-preview-input">
								        <span class="glyphicon glyphicon-folder-open"></span>
								        <span class="image-preview-input-title">Browse</span>
								       	<input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" name="file" required="">
								    </div>
								</span>
							</div>
				        </div>
				        <div class="form-group">
				        	<label>Deskripsi Orkes Dangdut :</label>
				        	<textarea name="deskripsi_orkes"></textarea>
				        </div>
						<div class="form-group" align="center">
							<button name="daftarpenyedia" class="btn btn-lg btn-success">Daftar Penyedia!</button>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>