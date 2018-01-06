	<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
		<script src="../src/jquery.maskMoney.js" type="text/javascript"></script>
	</head>
	<body>
    <div class="container">
    	<div class="row">
    		<div class="container">
			 	<?php 
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
								 		<img width="100%" height="100%" src="<?php echo "../penyedia/gambar/sampul/".$d['foto']; ?>">
								 		<?php } ?>
								</div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body" align="center">
                        <font style="font-size: 50px">" </font><font size="5"> <?php echo("$result[nama_orkes]") ?> </font><font style="font-size: 50px"> "</font>
                    </div>
                </div>
			  	<?php } ?>
			</div>
    	</div>
    	<div class="row">
    		<div class="col-md-12">
    			<legend style="color: black; border-color: black">
	       			<span class="glyphicon glyphicon-cog" style="font-size: 75px"> </span>
	       			<font style="font-size: 40px">Detail Orkes</font>
	       		</legend>
    		</div>
    	</div>
    	<div class="row">
			<div class="col-md-3">
				<div class="panel">
					<div class="sidebar content-box" style="display: block">
		                <ul class="nav">
		                    <!-- Main menu -->
		                    <li  class="pad" class="current"><a href="?page=sampulpenyedia" class="ukuran"><i class="glyphicon glyphicon-cog"></i> Ganti Foto Sampul</a></li>
		                    <li  class="pad" class="current"><a href="?page=perbaruiinformasiorkespenyedia" class="ukuran"><i class="glyphicon glyphicon-cog"></i> Perbarui Informasi</a></li>
		                    <li  class="pad" class="current"><a href="?page=perbaruiinformasitipeorkespenyedia" class="ukuran"><i class="glyphicon glyphicon-cog"></i> Perbarui Tipe Orkes</a></li>
		                    <li  class="pad" class="current"><a href="?page=perbaruiinformasigaleripenyedia" class="ukuran"><i class="glyphicon glyphicon-cog"></i> Perbarui Gallery</a></li>
		                    <li  class="pad" class="current"><a href="?page=atm" class="ukuran"><i class="glyphicon glyphicon-cog"></i> Perbarui ATM</a></li>
		                    <li class="pad"><a href="?page=penyedia" class="ukuran"><i class="glyphicon glyphicon-info-sign"></i> Informasi</a></li>
		                    <li class="pad"><a href="#" class="ukuran"><i class="glyphicon glyphicon-comment"></i> Chat</a></li>
		                    <li class="pad"><a href="?page=transaksipenyedia" class="ukuran"><i class="glyphicon glyphicon-transfer"></i> Transaksi</a></li>
		                    <li class="pad"><a href="?page=jadwal" class="ukuran"><i class="glyphicon glyphicon-calendar"></i> Jadwal</a></li>
		                </ul>
		             </div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="panel">
	       			<div style="padding: 40px 40px 40px 40px">
	       				<legend style="border-color: black; color: black">
						    <h2><b>Masukkan Detail Orkes Dangdut</b></h2>
						</legend>
	       				<div class="row">
	       					<div style="padding: 10px">
	       						<?php include ('../errors.php'); ?>
       						</div>
				            <div class="col-lg-6">
				                <div class="panel">
				                	<form method="POST" action="../penyedia/index.php?page=masukkandetail1" enctype="multipart/form-data">
							       			<div class="form-group">
									        	<h2><b>Ukuran Panggung : </b></h2>
									            <select name="tipe" style="height: 30px; width: 100%">
													<option value="konser">Konser</option>
													<option value="standar" selected>Standar</option>
													<option value="minimalis">Minimalis</option>
												</select><br>
									            <img id="panggung" width="100%" height="200">
									            <div class="input-group image-preview">
													<span class="input-group-btn">
													    <div class="btn btn-default image-preview-input">
													        <span class="glyphicon glyphicon-folder-open"></span>
													        <span class="image-preview-input-title">Browse</span>
													       	<input type="file" onchange="document.getElementById('panggung').src = window.URL.createObjectURL(this.files[0])" name="foto">
													    </div>
													</span>
													<input type="text" name="ukuran_panggung" class="form-control" placeholder="Masukkan Ukuran Panggung" required="">
												</div>
									        </div>
									        <div class="form-group">
									        	<h3><b>Harga Sesuai Ukuran : </b></h3>
									            <div class="input-group image-preview">
													<span class="input-group-btn">
													    <div class="btn btn-default image-preview-input">
													        <span class="image-preview-input-title">Rp.</span>
													    </div>
													</span>
													<input class="form-control" type="text" name="harga" required="" id="rp">
												</div>
												<script type="text/javascript">
												$("#rp").maskMoney({ formatOnBlur: true, reverse: true, selectAllOnFocus: true, precision: 2 });
												</script>
									        </div>

									        <div class="form-group">
									        	<h3><b>Besaran DP : </b></h3>
									            <div class="input-group image-preview">
													<span class="input-group-btn">
													    <div class="btn btn-default image-preview-input">
													        <span class="image-preview-input-title">Rp.</span>
													    </div>
													</span>
													<input class="form-control" type="text" name="dp" required="" id="dp">
												</div>
												<script type="text/javascript">
												$("#dp").maskMoney({ formatOnBlur: true, reverse: true, selectAllOnFocus: true, precision: 2 });
												</script>
									        </div>
											
											<div class="form-group">
												<button class="btn btn-warning" name="tambahtipe">Tambah Tipe Orkes</button>
											</div>
									</form>
				            	</div>
				        	</div>
				        	<div class="col-lg-12">
				        		<table border="1" align="right" style="width: 100%">
									<tr align="center">
										<td style="padding: 10px;width: 10%"><b>Panggung</b></td>
										<td style="padding: 10px;width: 20%"><b>Gambar</b></td>
										<td style="padding: 10px;width: 10%"><b>Ukuran</b></td>
										<td style="padding: 10px;width: 20%"><b>Harga</b></td>
										<td style="padding: 10px;width: 20%"><b>DP</b></td>
										<td style="padding: 10px"><b>Aksi</b></td>
									</tr>
				        		<?php
									while ($r=mysqli_fetch_array($dapatkan))
										{
 											echo"
										<tr align='center'>
											<td>$r[tipe]</td>
											<td style='padding: 10px'><img src='gambar/tipepanggung/$r[foto]' width='100%'></td>
											<td style='padding: 10px'>$r[ukuran]</td>
											<td style='padding: 10px'>Rp. $r[harga]</td>
											<td style='padding: 10px'>Rp. $r[dp]</td>
											<td style='padding: 10px'><a href='?page=masukkandetail2&imei=$r[id_tipe]' class='btn btn-success'>Masukkan Detail</a><br><a href='delete.php?stat=tipepanggung&imei=$r[tipe]' class='btn btn-danger' style='width:100%'>Hapus</a></td>
										</tr>";
									}
								echo "</table>";
								?>
				        	</div>
	       				</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    </body>
</html>