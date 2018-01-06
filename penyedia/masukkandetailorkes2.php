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
			<?php 

				$imei = $_GET['imei'];

			?>
			<div class="col-md-9">
				<div class="panel">
	       			<div style="padding: 40px 40px 40px 40px">
	       				<legend style="border-color: black; color: black">
						    <h2><b>Masukkan Detail Orkes Dangdut</b></h2>
						</legend>
	       				<div class="row">
				            <div class="col-lg-6">
				                <div class="panel">
				                	<form method="POST" action="../penyedia/index.php?page=masukkandetail2&imei=<?php echo"$imei"; ?>" enctype="multipart/form-data">
				                		<?php include ('../errors.php'); ?>
						       			<div class="form-group">
								        	<h3><b>Dekorasi Panggung : </b></h3>
								            <img id="panggung" width="100%" height="200">
								            <div class="input-group image-preview">
												<span class="input-group-btn">
												    <div class="btn btn-default image-preview-input">
												        <span class="glyphicon glyphicon-folder-open"></span>
												        <span class="image-preview-input-title">Browse</span>
												       	<input type="file" name="fotodekorasi" onchange="document.getElementById('panggung').src = window.URL.createObjectURL(this.files[0])">
												    </div>
												</span>
												<input type="text" name="nama_dekorasi" class="form-control" placeholder="(contoh:Lighting, Sound, dll)">
											</div>
								        </div>
										
										<div class="form-group">
											<button class="btn btn-warning" name="dekorasi">Tambah Dekorasi</button>
											<a href="?page=masukkandetail3&imei=<?php echo "$imei" ?>" class="btn btn-success" style="width: 58%">Selanjutnya</a>
										</div>
									</form>
				            	</div>
				        	</div>
				        	<div class="col-lg-12">
				                <table border="1" align="right" style="width: 100%">
									<tr align="center">
										<td style="padding: 10px 20px 10px 20px; width: 30%"><b>Gambar</b></td>
										<td style="padding: 10px; width: 15%"><b>Nama Dekorasi</b></td>
										<td style="padding: 10px 20px 10px 20px; width: 30%"><b>Aksi</b></td>
									</tr>
								<?php
				        			$tampil=mysqli_query($db, "SELECT * from jenis_dekorasi where id_tipe = '$imei'");
									while ($r=mysqli_fetch_array($tampil))
										{
 											echo"
									<tr align='center'>
										<td style='padding: 10px'><img src='gambar/dekorasi/$r[foto]' width='100%'></td>
										<td style='padding: 10px'>$r[nama_dekorasi]</td>
										<td><a href='?page=masukkandetail2' class='btn btn-success'>Edit </a> <a href='delete.php?stat=dekorasi&imei=$r[id_tipe]&id=$r[id_jenis_dekorasi]' class='btn btn-danger'> Hapus</a></td>
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