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
	       			<font style="font-size: 40px">Perbarui Informasi</font>
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
				<div class="panel" style="padding: 50px">
	       			<form action="index.php?page=atm" method="POST">
	       				<legend style="border-color: black">
	       					<h4><b>Ini sangat diperlukan untuk dapat melakukan proses transaksi dari penyewa kepada anda sebagai penyedia.</b></h4>
	       				</legend>
	       				<?php
		       				$sqlatm = "SELECT * FROM atm where id_penyedia = $id";
							$queryatm = mysqli_query($db, $sqlatm);
							$dapatatm = mysqli_fetch_array($queryatm);
						?>
						<div class="form-group">
							<label>Bank :</label>
							<select name="bank" style="height: 30px; width: 100%">
								<?php if ($dapatatm[bank]=="") { ?>
								<option value="BNI" selected>BNI</option>
								<option value="BRI">BRI</option>
								<option value="BCA">BCA</option>
								<option value="MANDIRI">MANDIRI</option>
								<?php } ?>
								<?php if($dapatatm[bank]=="BNI") { ?>
								<option value="BRI">BRI</option>
								<option value="BCA">BCA</option>
								<option value="MANDIRI">MANDIRI</option>
								<option selected><?php echo($dapatatm[bank]) ?></option>
								<?php } ?>
								<?php if($dapatatm[bank]=="BRI") { ?>
								<option value="BNI">BNI</option>
								<option value="BCA">BCA</option>
								<option value="MANDIRI">MANDIRI</option>
								<option selected><?php echo($dapatatm[bank]) ?></option>
								<?php } ?>
								<?php if($dapatatm[bank]=="BCA") { ?>
								<option value="BNI">BNI</option>
								<option value="BRI">BRI</option>
								<option value="MANDIRI">MANDIRI</option>
								<option selected><?php echo($dapatatm[bank]) ?></option>
								<?php } ?>
								<?php if($dapatatm[bank]=="MANDIRI") { ?>
								<option value="BNI">BNI</option>
								<option value="BRI">BRI</option>
								<option value="BCA">BCA</option>
								<option selected><?php echo($dapatatm[bank]) ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label>No. Rekening :</label>
							<input name="norek" value="<?php echo($dapatatm[no_rek]) ?>" type="text" class="form-control">
						</div>
						<div class="form-group">
							<label>Atas Nama :</label>
							<input name="an" value="<?php echo($dapatatm[atas_nama]) ?>" type="text" class="form-control">
						</div>
						<div class="form-group" align="center">
							<?php
								$queryid = "SELECT * FROM penyedia WHERE id_pengguna = {$_SESSION['id_pengguna']}";
							    $resultid = mysqli_query($db, $queryid);
							    $dapatid = mysqli_fetch_array($resultid);
							    $id = $dapatid['id_penyedia'];
								$cari = "SELECT * FROM atm where id_penyedia = $id";
								$queryatm = mysqli_query($db, $cari);
								$nemu = mysqli_fetch_array($queryatm);
								if (empty($nemu['id_penyedia'])) {
									echo "<button class='btn btn-success' name='insertatm'>MASUKKAN</button>";
								}
								else{
									echo"<button class='btn btn-danger' name='updateatm'>UPDATE</button>";
								}
							?>
						</div>
					</form>
				</div>
			</div>
		</div>
    </div>