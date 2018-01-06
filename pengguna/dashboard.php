<?php
    if (empty($_SESSION['email'])) {
        header('location: ../login.php');
    }
?>
	<div class="container">
    	<div class="row">

    		<?php if(isset($_POST['cari'])){ ?>
    			<?php
    				$name = mysqli_real_escape_string($db, $_POST['masukkan']);
					if(empty($name)) { ?>
					<?php
						$tampil=mysqli_query($db, "SELECT * from penyedia where status = 'Disetujui'");
						while ($r=mysqli_fetch_array($tampil)) {
					?>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<div class="thumbnail">
								<?php if ($r['foto']=="") { ?>
									<img src="../gambar/PICT.png">
									<div class="caption">
										<h3><?php echo "$r[nama_orkes]"; ?></h3>
										<p><?php echo "$r[alamat]"; ?></p>
										<a href="?page=lihatorkes&penyedia=<?php echo($r['id_penyedia']) ?>" class="btn btn-primary" role="button">Lihat Orkes</a>
									</div>
								<?php } else { ?>
									<img src="<?php echo "../penyedia/gambar/sampul/".$r['foto']; ?>">
									<div class="caption">
										<h3><?php echo "$r[nama_orkes]"; ?></h3>
										<p><?php echo "$r[alamat]"; ?></p>
										<a href="?page=lihatorkes&penyedia=<?php echo($r['id_penyedia']) ?>" class="btn btn-primary" role="button">Lihat Orkes</a>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				<?php } else { ?>
					<?php
						$tampil=mysqli_query($db, "SELECT * from penyedia where status = 'Disetujui' && nama_orkes LIKE '%$name%'");
						if($r = mysqli_num_rows($tampil) > 0){
						while ($r=mysqli_fetch_array($tampil)) {
					?>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<div class="thumbnail">
								<?php if ($r['foto']=="") { ?>
									<img src="../gambar/PICT.png">
									<div class="caption">
										<h3><?php echo "$r[nama_orkes]"; ?></h3>
										<p><?php echo "$r[alamat]"; ?></p>
										<a href="?page=lihatorkes&penyedia=<?php echo($r['id_penyedia']) ?>" class="btn btn-primary" role="button">Lihat Orkes</a>
									</div>
								<?php } else { ?>
									<img src="<?php echo "../penyedia/gambar/sampul/".$r['foto']; ?>">
									<div class="caption">
										<h3><?php echo "$r[nama_orkes]"; ?></h3>
										<p><?php echo "$r[alamat]"; ?></p>
										<a href="?page=lihatorkes&penyedia=<?php echo($r['id_penyedia']) ?>" class="btn btn-primary" role="button">Lihat Orkes</a>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } } else { ?>
						<?php echo'<h2>Orkes tidak ditemukan</h2>'; ?>
					<?php } ?>
				<?php } ?>
    		<?php } else { 
    				$tampil=mysqli_query($db, "SELECT * from penyedia where status = 'Disetujui'");
					while ($r=mysqli_fetch_array($tampil)) { ?>
						<div class="col-sm-6 col-md-4 col-lg-4">
							<div class="thumbnail">
								<?php if ($r['foto']=="") { ?>
									<img src="../gambar/PICT.png">
									<div class="caption">
										<h3><?php echo "$r[nama_orkes]"; ?></h3>
										<p><?php echo "$r[alamat]"; ?></p>
										<a href="?page=lihatorkes&penyedia=<?php echo($r['id_penyedia']) ?>" class="btn btn-primary" role="button">Lihat Orkes</a>
									</div>
								<?php } else { ?>
									<img src="<?php echo "../penyedia/gambar/sampul/".$r['foto']; ?>">
									<div class="caption">
										<h3><?php echo "$r[nama_orkes]"; ?></h3>
										<p><?php echo "$r[alamat]"; ?></p>
										<a href="?page=lihatorkes&penyedia=<?php echo($r['id_penyedia']) ?>" class="btn btn-primary" role="button">Lihat Orkes</a>
									</div>
								<?php } ?>
							</div>
						</div>
			<?php } } ?>
		</div>
	</div><br><br><br><br>