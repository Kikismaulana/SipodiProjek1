<?php
    if (empty($_SESSION['email'])) {
        header('location: ../login.php');
    }
    $imei = $_GET['penyedia'];
    $tipe = $_GET['booking'];
	$galeri = "SELECT * from galeri WHERE id_penyedia = $imei LIMIT 4";
	$tampilgaleri = mysqli_query($db, $galeri);
	$galerisetelah4 = "SELECT * from galeri WHERE id_penyedia = $imei LIMIT 4,4";
	$tampilgalerisetelah4 = mysqli_query($db, $galerisetelah4);
	$galerisetelah8 = "SELECT * from galeri WHERE id_penyedia = $imei LIMIT 8,4";
	$tampilgalerisetelah8 = mysqli_query($db, $galerisetelah8);
	$galerisetelah12 = "SELECT * from galeri WHERE id_penyedia = $imei LIMIT 12,4";
	$tampilgalerisetelah12 = mysqli_query($db, $galerisetelah12);
	$galerisetelah16 = "SELECT * from galeri WHERE id_penyedia = $imei LIMIT 16,4";
	$tampilgalerisetelah16 = mysqli_query($db, $galerisetelah16);
	$gettipe = $_GET['tipe'];
	$dekorasi="SELECT * from jenis_dekorasi WHERE id_tipe = $gettipe";
   	$dapatdekorasi = mysqli_query($db, $dekorasi);
   	$penyanyi="SELECT * from penyanyi WHERE id_tipe = $gettipe";
   	$dapatpenyanyi = mysqli_query($db, $penyanyi);
   	$pemusik="SELECT * from pemusik WHERE id_tipe = $gettipe";
   	$dapatpemusik = mysqli_query($db, $pemusik);
?>
    <div class="container">
    	<div class="row">
    		<div class="container">
			 	<?php 
			 		$tampilanorkes="SELECT * from penyedia WHERE id_penyedia = $imei";
					$dapatorkes = mysqli_query($db, $tampilanorkes);
					while($d = mysqli_fetch_array($dapatorkes)){
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
                                <font size="6"> <b><?php echo $d['nama_orkes'] ?> </b></font> <br>
                                <font size="3"> <?php  echo $d['alamat']; ?> </font>
                        </div>
                    </div>
			  	<?php } ?>
			</div>
    	</div>
    			<div class="well">
		            <div id="myCarousel" class="carousel slide">
		                
		                <!-- Carousel items -->
		                <div class="carousel-inner">
		                    <!--/item-->
		                    <div class="item active">
		                        <div class="row">
		                        	<?php
		                        		while ($g = mysqli_fetch_array($tampilgaleri)){
		                        	?>
		                            <div class="col-sm-3" class="thumbnail"><img src="<?php echo "../penyedia/gambar/galeri/".$g['gambar']; ?>" alt="Image" class="img-responsive" style="width: 100%; height: 150px">
		                            </div>
		                            <?php } ?>
		                        </div>
		                        <!--/row-->
		                    </div>
		                    <!--/item-->
		                    <?php
		                    $penyedia = $_GET['penyedia'];
		                    $sqlgaleri = "SELECT * FROM galeri where id_penyedia = $penyedia";
		                    $querygaleri = mysqli_query($db, $sqlgaleri);
		                    $hasil=mysqli_num_rows($querygaleri);
		                    if ($hasil > 4) { ?>
		                    <div class="item">
		                        <div class="row">
		                            <?php
		                        		while ($g = mysqli_fetch_array($tampilgalerisetelah4)){
		                        	?>
		                            <div class="col-sm-3" class="thumbnail"><img src="<?php echo "../penyedia/gambar/galeri/".$g['gambar']; ?>" alt="Image" class="img-responsive" style="width: 100%; height: 150px">
		                            </div>
		                            <?php } ?>
		                        </div>
		                        <!--/row-->
		                    </div>
		                    <!--/item-->
		                    <?php } ?>
		                    <?php if ($hasil > 8) { ?>
		                    <div class="item">
		                        <div class="row">
		                            <?php
		                        		while ($g = mysqli_fetch_array($tampilgalerisetelah8)){
		                        	?>
		                            <div class="col-sm-3" class="thumbnail"><img src="<?php echo "../penyedia/gambar/galeri/".$g['gambar']; ?>" alt="Image" class="img-responsive" style="width: 100%; height: 150px">
		                            </div>
		                            <?php } ?>
		                        </div>
		                        <!--/row-->
		                    </div>
		                    <!--/item-->
		                    <?php } ?>
		                    <?php if ($hasil > 12) { ?>
		                    <div class="item">
		                        <div class="row">
		                            <?php
		                        		while ($g = mysqli_fetch_array($tampilgalerisetelah12)){
		                        	?>
		                            <div class="col-sm-3" class="thumbnail"><img src="<?php echo "../penyedia/gambar/galeri/".$g['gambar']; ?>" alt="Image" class="img-responsive" style="width: 100%; height: 150px">
		                            </div>
		                            <?php } ?>
		                        </div>
		                        <!--/row-->
		                    </div>
		                    <!--/item-->
		                    <?php } ?>
		                    <?php if ($hasil > 16) { ?>
		                    <div class="item">
		                        <div class="row">
		                            <?php
		                        		while ($g = mysqli_fetch_array($tampilgalerisetelah16)){
		                        	?>
		                            <div class="col-sm-3" class="thumbnail"><img src="<?php echo "../penyedia/gambar/galeri/".$g['gambar']; ?>" alt="Image" class="img-responsive" style="width: 100%; height: 150px">
		                            </div>
		                            <?php } ?>
		                        </div>
		                        <!--/row-->
		                    </div>
		                    <!--/item-->
		                    <?php } ?>
		                </div>
		                <!--/carousel-inner--> 
		                <a class="prev" href="#myCarousel" data-slide="prev">‹</a>

		                <a class="next" href="#myCarousel" data-slide="next">›</a>
		            </div>
		            <!--/myCarousel-->
		        </div>
    	<div class="row">
    		<div class="col-md-12">
    			<legend style="color: black; border-color: black">
	       			<span class="glyphicon glyphicon-info-sign" style="font-size: 75px"> </span>
	       			<font style="font-size: 40px">Informasi</font>
	       		</legend>
    		</div>
    	</div>
    	<?php 
    		$tampilanorkes="SELECT * from penyedia WHERE id_penyedia = $imei";
			$dapatorkes = mysqli_query($db, $tampilanorkes);
			while($d = mysqli_fetch_array($dapatorkes)){
		?>
    	<div class="row">
			<div class="col-md-12">
				<div class="panel" style="padding: 10px; box-shadow: 0px 0px 5px black" align="center">
					<legend><div>Deskripsi Orkes Dangdut</div></legend>
					<font size="5"> <?php echo  $d['deskripsi_orkes'] ?> </font>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="row">
			<?php
				$tampil=mysqli_query($db, "SELECT * from tipe_panggung WHERE id_penyedia = $imei");
					while ($r=mysqli_fetch_array($tampil))
						{
 							echo"
			<div class='col-sm-6 col-md-4 col-lg-4'>
				<div class='thumbnail'>
					<img src='../penyedia/gambar/tipepanggung/$r[foto]'>
					<div class='caption'>
						<h3>Rp. $r[harga]</h3>
						<p>Ukuran $r[ukuran]</p>
						<p><b>$r[tipe]</b></p>
						<a href='detailpanggung.php?penyedia=$r[id_penyedia]&tipe=$r[id_tipe]' class='btn btn-primary' role='button'>Lihat Datail Orkes</a>
						<a href='booking.php?penyedia=$r[id_penyedia]&booking=$r[id_tipe]' class='btn btn-danger' role='button'>BOOKING</a>
					</div>
				</div>
			</div>";
					}
			?>
		</div>
    </div>