<?php
    if (empty($_SESSION['email'])) {
        header('location: ../login.php');
    }
?>
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
	       			<span class="glyphicon glyphicon-info-sign" style="font-size: 75px"> </span>
	       			<font style="font-size: 40px">Informasi</font>
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
				<div class="panel" style="padding: 0px 40px 20px 40px">
	       			<legend style="border-color: black; padding-top: 20px; color: black">
		       			<font size="5"><b>Deskripsi </b></font> <span class="glyphicon glyphicon-pencil" style="font-size: 30px"></span>
		       			<br><br><font size="5"><?php echo "$result[deskripsi_orkes]" ?></font>
		       		</legend>
		       		<legend style="border-color: black; padding-top: 10px; color: black">
		       			<h3><b>Alamat</b></h3>
		       			<span class="glyphicon glyphicon-map-marker" style="font-size: 50px"></span><font size="5" style="padding-left: 15px"><?php echo "$result[alamat]" ?></font>
		       		</legend>
		       		<legend style="border-color: black; padding-top: 10px; color: black">
		       			<h3><b>Detail Orkes</b></h3>
		       		<div class="row">
		       			<?php
							$tampil=mysqli_query($db, "SELECT * from tipe_panggung WHERE id_penyedia = $id");
								while ($r=mysqli_fetch_array($tampil))
									{
 										echo"
												<div class='col-sm-6 col-md-4 col-lg-4'>
													<div class='thumbnail'>
														<img src='gambar/tipepanggung/$r[foto]'>
														<div class='caption'>
															<p><b>Tipe $r[tipe]</b></p>
															<h4>Rp. $r[harga]</h4>
															<h5>Ukuran panggung $r[ukuran]</h5>
															<p><a href='detailorkes.php?imei=$r[id_tipe]' class='btn btn-primary' role='button'>Lihat detail</a></p>
														</div>
													</div>
												</div>";
											}
						?>
						<div class="col-md-12" style="padding-bottom: 20px">
							<a href="?page=perbaruiinformasitipeorkespenyedia" class="btn btn-lg btn-warning">Tambah Detail Orkes</a>
						</div>
					</div>
					</legend>
				</div>
			</div>
		</div>
    </div>