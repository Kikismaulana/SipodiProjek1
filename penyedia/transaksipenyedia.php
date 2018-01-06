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
	       			<span class="glyphicon glyphicon-transfer" style="font-size: 75px"> </span>
	       			<font style="font-size: 40px">Transaksi</font>
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
											if ($r['keterangan']!='Tidak bersedia') { echo "
				                   		<div style='border-radius: 5px; box-shadow: 0px 0px 2px black' align='center'>
				                   			<form method='POST' action='?page=transaksipenyedia&tanggal=$r[id_transaksi]'>
				                   				<button name='buka' class='btn btn-link btn-lg'>$r[tanggal]";?>
					                            <?php if($r['status']==1) { echo"
					                            <span class='badge' style='background-color: red'>
					                                 !
					                            </span>"; } ?>
					                            <?php if ($r['statustf']==1) { echo "
					                            	<i style='color: #0ab22c' class='glyphicon glyphicon-ok-circle'></i>";
					                            } ?>
				                   				</button>
				                   			</form>
				                   		</div><br>
						                   	<?php }
						                   }
				                   		?>
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
				                		<div class="panel-body">
				                			<?php
				                				if ($t['keterangan']=='Bersedia'){ ?>
				                					
						                			<a href="buktitf.php?penyewa=<?php echo $t['id_transaksi']; ?>" class="btn default btn-lg"><h4>Lihat Bukti Transfer</h4></a>
						                	<?php } ?>
				                		</div>
				                		<div class="panel-body" align="center">
				                			<form method="POST" action="index.php?page=transaksipenyedia&tanggal=<?php echo "$t[id_transaksi]"; ?>">
				                				<?php
				                				if ($t['keterangan']=='Request'){
				                				echo "
					                			<button name='tolak' class='btn btn-lg btn-danger'>Tolak</button>
					                			<button name='bersedia' class='btn btn-lg btn-success'>Bersedia</button>";
					                			}
					                			?>
					                		</form>
				                		</div>
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