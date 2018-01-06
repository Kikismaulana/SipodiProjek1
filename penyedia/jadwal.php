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
                        <font style="font-size: 50px">" </font><font size="5"> <?php echo "$result[nama_orkes]"; ?> </font><font style="font-size: 50px"> "</font>
                    </div>
                </div>
			  	<?php } ?>
			</div>
    	</div>
    	<div class="row">
    		<div class="col-md-12">
    			<legend style="color: black; border-color: black">
	       			<span class="glyphicon glyphicon-calendar" style="font-size: 75px"> </span>
	       			<font style="font-size: 40px">Jadwal</font>
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
				<div class="panel" style="padding: 50px" align="center" id="embeddedExample">
			          <div id="embeddedCalendar"></div><br>
			          <div id="embeddedDateField" class="dateField">
			            Select Date
			          </div><br>
			          <div class="panel panel-primary">
			          	<div class="panel-heading"> Detail Jadwal</div>
			          	<div class="panel-body">
			          		<div class="panel-body" align="left">
				                <div class="panel-body">
				                	<h4>Nama Acara : </h4>
				                	<p>Hajatan</p>
				                </div>
				                <div class="panel-body">
				                	<h4>Alamat : </h4>
				                	<p>Jl. Stana Bojongsari blok ketapang</p>	
				                </div>
				                <div class="panel-body">
				                	<h4>Nomor Handphone : </h4>	
				                	<p>089509978533</p>
				                </div>
				                <div class="panel-body">
				                	<h4>Deskripsi Acara : </h4>
				                	<p>Sunatan Putu, acara siang-malam</p>	
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