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
								 		<img width="100%" height="100%" src="<?php echo "gambar/sampul/".$d['foto']; ?>">
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
	       			<span class="glyphicon glyphicon-transfer"" style="font-size: 75px"> </span>
	       			<font style="font-size: 40px">Transaksi</font>
	       		</legend>
    		</div>
    	</div>
    	<div class="row">
			<div class="col-md-3">
				<div class="panel" style="box-shadow: 0px 0px 5px black">
					<div class="sidebar content-box" style="display: block">
		                <ul class="nav">
		                    <!-- Main menu -->
		                    <li  class="pad" class="current"><a href="?page=sampul" class="ukuran"><i class="glyphicon glyphicon-cog"></i> Ganti Foto Sampul</a></li>
		                    <li  class="pad" class="current"><a href="?page=perbaruiinformasi" class="ukuran"><i class="glyphicon glyphicon-cog"></i> Perbarui Informasi</a></li>
		                    <li class="pad"><a href="?page=informasi"  class="ukuran"><i class="glyphicon glyphicon-info-sign"></i> Informasi</a></li>
		                    <li class="pad"><a href="#" class="ukuran"><i class="glyphicon glyphicon-comment"></i> Chat</a></li>
		                    <li class="pad"><a href="?page=transaksi" class="ukuran"><i class="glyphicon glyphicon-transfer"></i> Transaksi</a></li>
		                     <?php
		                    $cari = "SELECT * FROM penyedia where id_pengguna = $id_pengguna";
		                    $query = mysqli_query($db, $cari);
		                    $dapat = mysqli_fetch_array($query);
		                    if ($result['status']=='pengguna' && $dapat['id_pengguna']=='') {
		                    	echo "<li class='pad'><a href='?page=sebagaipenyedia' class='ukuran'><i class='glyphicon glyphicon-plus-sign'></i> Sebagai Penyedia</a></li>";
		                    	}
		                    ?>
		                </ul>
		             </div>
				</div>
			</div>
			<div class="col-md-9">
				<div class="panel" style="box-shadow: 0px 0px 5px black">
	       			<div style="padding: 40px 40px 40px 40px">
	       				<div class="row">
				            <div class="col-lg-4">
				                <div class="panel panel-default">
				                    <div class="panel-heading">
				                        <div class="row">
				                            <div class="col-xs-12 text-center">
				                                <div style="font-size: 20px">Daftar Tanggal</div>
				                            </div>
				                        </div>
				                    </div>
				                	<div class="panel-body" align="center">
				                		<?php
										while ($r=mysqli_fetch_array($dapattransaksi))
										{
											?>
										<?php if ($r['keterangan']=='Bersedia' && $r['bukti_transfer']=='') { ?>
				                   		<div style="border-radius: 5px; box-shadow: 0px 0px 2px black" align="center">
				                   			<form method="POST" action="suruhtransfer.php?tanggal=<?php echo "$r[id_transaksi]"?>">
				                   				<button name="bukapengguna" class="btn btn-link btn-lg"><?php echo "$r[tanggal]"?>
				                   				</button>
					                            <?php if($r['status']==3) { echo"
					                            <span class='badge' style='background-color: red'>
					                                 !
					                            </span>"; } ?>
				                   			</form>
				                   		</div><br>
				                   		<?php } ?>
				                   		<?php if ($r['keterangan']=='Bersedia' && $r['bukti_transfer']!='') {?>
				                   		<div style="border-radius: 5px; box-shadow: 0px 0px 2px black" align="center">
				                   				<a href="?page=transaksi&tanggal=<?php echo "$r[id_transaksi]"?>" class="btn btn-link btn-lg"><?php echo "$r[tanggal]"?>
				                   				</a>
				                   		</div><br>
				                   		<?php } ?>
				                   		<?php if ($r['keterangan']=='Tidak bersedia') { ?>
				                   		<div style="border-radius: 5px; box-shadow: 0px 0px 2px black" align="center">
				                   			<form method="POST" action="tolak.php?tanggal=<?php echo "$r[id_transaksi]"?>">
				                   				<button name="bukapengguna" class="btn btn-link btn-lg"><?php echo "$r[tanggal]"?>
					                            <?php if($r['status']==3) { echo"
					                            <span class='badge' style='background-color: red'>
					                                 !
					                            </span>"; } ?>
				                   				</button>
				                   			</form>
				                   		</div><br>
				                   		<?php } ?>
				                   	<?php } ?>
				                	</div>
				            	</div>
				        	</div>
				        	<div class="col-lg-8">
				                <div class="panel panel-primary">
				                    <div class="panel-heading">
				                        <div class="row">
				                            <div class="col-xs-12 text-center">
				                                <div style="font-size: 20px">Detail Penyewaan</div>
				                            </div>
				                        </div>
				                    </div>
				                    <?php
				                    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
				                    $transaksi = $_GET['tanggal'];
				                    $sqltransaksi = "SELECT * from transaksi where id_transaksi = $transaksi";
				                    $dapattransaksi = mysqli_query($db, $sqltransaksi);
				                    while ($t=mysqli_fetch_array($dapattransaksi))
										{

				                    ?>
				                	<div class="panel-body" align="left">
				                		<div class="panel-body">
				                			<h4>Nama Acara : </h4>
				                			<p><?php echo "$t[nama_acara]"; ?></p>
				                		</div>
				                		<div class="panel-body">
				                			<h4>Alamat : </h4>
				                			<p><?php echo "$t[alamat]"; ?></p>	
				                		</div>
				                		<div class="panel-body">
				                			<h4>Nomor Handphone : </h4>	
				                			<p><?php echo "$t[no_hp]"; ?></p>
				                		</div>
				                		<div class="panel-body">
				                			<h4>Deskripsi Acara : </h4>
				                			<p><?php echo "$t[deskripsi]"; ?></p>	
				                		</div>
				                		<?php
				                			if ($t[bukti_transfer]=='') {
				                		?>
				                		<form method="POST" action="index.php?page=transaksi&tanggal=<?php echo $transaksi ?>"" enctype="multipart/form-data">
				                		<div class="panel-body">
				                			<h4>Upload Bukti Transfer : </h4>
				                			<img id="blah" width="350" height="200">
				                			<div class="input-group image-preview">
								                <span class="input-group-btn">
								                    <!-- image-preview-input -->
								                    <div class="btn btn-default image-preview-input">
								                        <span class="glyphicon glyphicon-folder-open"></span>
								                        <span class="image-preview-input-title">Browse</span>
								                        <input type="file" name="bukti" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
								                    </div>
								                </span>
								            </div>
				                		</div>
					                		<div class="panel-body">
					                			<button name="tf" class="btn btn-success">Kirim</button>
					                		</div>
					                	</form>
					                	<?php } else {
					                		echo "
					                		<div class='row' align='center'>
						                		<div class='col-md-12'>
						                			<img src='gambar/buktitf/$t[bukti_transfer]' width='30%'>
						                		</div>
						                	</div><br>
					                		<div class='alert alert-success alert-dismissible' role='alert' style='font-size: 20px'>
										            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										            </button>
										            <i class='glyphicon glyphicon-ok-circle'></i>
										            <strong>Bukti transfer berhasil di upload !</strong><br>
										            <strong>Penyedia akan segera menghubungi anda !</strong>
										          </div>";
					                	} ?>
				                	</div>
				                	<?php } ?>
				            	</div>
				        	</div>
	       				</div>
					</div>
				</div>
			</div>
		</div>
    </div>