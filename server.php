<?php
	session_start();

	
	$status = "";
	$nama = "";
	$alamat = "";
	$no_hp = "";
	$email = "";
	$password = "";
	$jk = "";
	$tgl_lahir = "";
	$namaorkes = "";
	$alamatorkes = "";
	$ktp = "";
	$deskripsiorkes = "";
	$errors = array();
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	
	$db = mysqli_connect('localhost', 'root', '', 'sipodi');

	
	if (isset($_POST['daftar'])) {
		$nama = mysqli_real_escape_string($db, $_POST['nama']);
		$alamat = mysqli_real_escape_string($db, $_POST['alamat']);
		$no_hp = mysqli_real_escape_string($db, $_POST['no_hp']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$jk = mysqli_real_escape_string($db, $_POST['jk']);
		$tgl_lahir = mysqli_real_escape_string($db, $_POST['tgl_lahir']);
		$cariemail = "SELECT * FROM pengguna where email = '$email'";
		$querycari = mysqli_query($db, $cariemail);
		$dapatemail = mysqli_fetch_array($querycari);

		if ($email==$dapatemail[email]) {
			array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Email telah digunakan!</strong>
			          </div>");
		}
		if (empty($nama)) {
			array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Nama harus diisi!</strong>
			          </div>");
		}
		if (empty($password)) {
			array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Password harus diisi!</strong>
			          </div>");
		}
		else if ($_SESSION['Captcha']!=$_POST['nilaiCaptcha']) {
			array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Captah Salah!</strong>
			          </div>");
		}
		if (count($errors) == 0) {
			$sqlpengguna = "INSERT INTO pengguna (status, nama, alamat, no_hp, email, password, jk, tanggal_lahir)
						VALUES ('pengguna', '$nama', '$alamat', '$no_hp', '$email', '$password', '$jk', '$tgl_lahir')";
			mysqli_query($db, $sqlpengguna);
			header('location: daftar.php?alert=1');
		}
	}

	if(isset($_POST['upload'])){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['file']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'gambar/sampul/'.$nama);
					$query = "UPDATE pengguna SET foto = '$nama' WHERE id_pengguna = {$_SESSION['id_pengguna']}";
					$in = mysqli_query($db, $query);
					if($in){
						array_push($errors, "<div class='alert alert-success alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-ok-circle'></i> Gambar berhasil di upload!</strong>
			          </div>");
					}else{
						array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Gagal mengupload gambar!</strong>
			          </div>");
					}
				}else{
					array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Ukuran File terlalu besar!</strong>
			          </div>");
				}
			}else{
				array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Ekstensi gambar harus jpg / png !</strong>
			          </div>");
			}
		}

	if(isset($_POST['uploadpenyedia'])){
			$ekstensi_diperbolehkan	= array('png','jpg');
			$nama = $_FILES['filepenyedia']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['filepenyedia']['size'];
			$file_tmp = $_FILES['filepenyedia']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'gambar/sampul/'.$nama);
					$query = "UPDATE penyedia SET foto = '$nama' WHERE id_pengguna = {$_SESSION['id_pengguna']}";
					$in = mysqli_query($db, $query);
					if($in){
						array_push($errors, "<div class='alert alert-success alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-ok-circle'></i> Gambar berhasil di upload!</strong>
			          </div>");
					}else{
						array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Gagal mengupload gambar!</strong>
			          </div>");
					}
				}else{
					array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Ukuran File terlalu besar!</strong>
			          </div>");
				}
			}else{
				array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Ekstensi gambar harus jpg / png !</strong>
			          </div>");
			}
		}

	if(isset($_POST['hapussampulpenyedia'])){
		$query = "DELETE foto FROM penyedia WHERE id_pengguna = {$_SESSION['id_pengguna']}";
		$in = mysqli_query($db, $query);
		if($in){
				array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Sampul berhasil di hapus !</strong>
			          </div>");
					}
		}

	if (isset($_POST['daftarpenyedia'])) {
		$ekstensi_diperbolehkan	= array('png','jpg');
		$nama = $_FILES['file']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$nama_orkes = mysqli_real_escape_string($db, $_POST['nama_orkes']);
		$alamat = mysqli_real_escape_string($db, $_POST['alamat']);
		$deskripsi_orkes = mysqli_real_escape_string($db, $_POST['deskripsi_orkes']);
		$id_penyedia = "";

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'gambar/ktp/'.$nama);
					$sqlpenyedia = "INSERT INTO penyedia (id_pengguna, nama_orkes, alamat, ktp, deskripsi_orkes, status)
								VALUES ({$_SESSION['id_pengguna']},'$nama_orkes', '$alamat', '$nama', '$deskripsi_orkes', 'Request')";
					mysqli_query($db, $sqlpenyedia);
					mysqli_query($db, $update);
					header('location: ../pengguna/menunggupersetujuan.php');
				}
		}
	}

	if (isset($_POST['setujui'])) {
		$dapatid = $_GET['permintaan'];
        $identitas = "SELECT * FROM penyedia WHERE id_penyedia = $dapatid";
        $queryidentitas = mysqli_query($db, $identitas);
        $resultid = mysqli_fetch_array($queryidentitas);
        $result = $resultid['id_pengguna'];
        $updatepengguna = "UPDATE pengguna SET status = 'penyedia' WHERE id_pengguna = $result ";
        $updatepenyedia = "UPDATE penyedia SET status = 'Disetujui' WHERE id_pengguna = $result ";
        mysqli_query($db, $updatepengguna);
        mysqli_query($db, $updatepenyedia);
	}

	if (isset($_POST['tolakpenyedia'])) {
		$dapatid = $_GET['permintaan'];
        $identitas = "SELECT * FROM penyedia WHERE id_penyedia = $dapatid";
        $queryidentitas = mysqli_query($db, $identitas);
        $resultid = mysqli_fetch_array($queryidentitas);
        $result = $resultid['id_pengguna'];
        $updatepenyedia = "DELETE FROM penyedia WHERE id_pengguna = $result ";
        mysqli_query($db, $updatepenyedia);
	}

	if (isset($_POST['update'])) {
		$nama = mysqli_real_escape_string($db, $_POST['updatenama']);
		$password = mysqli_real_escape_string($db, $_POST['updatepassword']);
		$tgl_lahir = mysqli_real_escape_string($db, $_POST['updatetgl_lahir']);
		$alamat = mysqli_real_escape_string($db, $_POST['updatealamat']);
		$no_hp = mysqli_real_escape_string($db, $_POST['updatehp']);
		$jk = mysqli_real_escape_string($db, $_POST['updatejk']);
		if (empty($nama)) {
			array_push($errors, "Nama hengkap harus diisi!");
		}
		if (empty($password)) {
			array_push($errors, "Password harus diisi!");
		}
		if (count($errors) == 0) {
			$sqlpengguna = "UPDATE pengguna SET nama='$nama', alamat='$alamat', no_hp='$no_hp', password='$password', jk='$jk', tanggal_lahir='$tgl_lahir' WHERE id_pengguna = {$_SESSION['id_pengguna']}";
			mysqli_query($db, $sqlpengguna);
			array_push($errors, "<div class='alert alert-success alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-ok-circle'></i> Data berhasil di update!</strong>
			          </div>");
		}
	}

	if (isset($_POST['updatepenyedia'])) {
		$nama_orkes = mysqli_real_escape_string($db, $_POST['nama_orkes']);
		$alamat_orkes = mysqli_real_escape_string($db, $_POST['alamat_orkes']);
		$deskripsi_orkes = mysqli_real_escape_string($db, $_POST['deskripsi_orkes']);
		if (empty($nama_orkes)) {
			array_push($errors, "Nama orkes harus diisi!");
		}
		if (empty($alamat_orkes)) {
			array_push($errors, "Alamat orkes harus diisi!");
		}
		if (count($errors) == 0) {
			$updatepenyedia = "UPDATE penyedia SET nama_orkes='$nama_orkes', alamat='$alamat_orkes', deskripsi_orkes='$deskripsi_orkes' WHERE id_pengguna = {$_SESSION['id_pengguna']}";
			mysqli_query($db, $updatepenyedia);
			array_push($errors, "<div class='alert alert-success alert-dismissible' role='alert'>
				            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				              <span aria-hidden='true'>&times;</span>
				            </button>
				            <strong><i class='glyphicon glyphicon-ok-circle'></i> Data berhasil di update!</strong>
				          </div>");
		}
	}

	if (isset($_POST['masuk'])) {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email harus diisi!");
		}
		if (empty($password)) {
			array_push($errors, "Password harus diisi!");
		}
		if (count($errors) == 0) {
			$query = "SELECT * FROM pengguna WHERE email = '$email' AND password = '$password'";
			$result = mysqli_query($db, $query);
			$dapat = mysqli_fetch_array($result);
			$id_pengguna = "";
			if (mysqli_num_rows($result) == 1) {
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				$_SESSION['id_pengguna'] = $dapat['id_pengguna'];
				header('location: pengguna/index.php');
			}else{
				array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Kombinasi yang salah antara Email dan Password!</strong>
			          </div>");
			}
		}
	}

	if (isset($_POST['masukadmin'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Username harus diisi!!</strong>
			          </div>");
		}
		if (empty($password)) {
			array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Password harus diisi!</strong>
			          </div>");
		}
		if (count($errors) == 0) {
			$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
			$result = mysqli_query($db, $query);
			$dapat = mysqli_fetch_array($result);
			if (mysqli_num_rows($result) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				header('location: index.php');
			}else{
				array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Kombinasi yang salah antara Username dan Password!</strong>
			          </div>");
			}
		}
	}

	if (isset($_POST['tambahtipe'])) {
		$ekstensi_diperbolehkan	= array('png','jpg');
		$nama = $_FILES['foto']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['foto']['size'];
		$file_tmp = $_FILES['foto']['tmp_name'];
		$tipe = mysqli_real_escape_string($db, $_POST['tipe']);
		$ukuran_panggung = mysqli_real_escape_string($db, $_POST['ukuran_panggung']);
		$harga = mysqli_real_escape_string($db, $_POST['harga']);
		$dp = mysqli_real_escape_string($db, $_POST['dp']);
		$queryid = "SELECT * FROM penyedia WHERE id_pengguna = {$_SESSION['id_pengguna']}";
	    $resultid = mysqli_query($db, $queryid);
	    $dapatid = mysqli_fetch_array($resultid);
	    $id = $dapatid['id_penyedia'];
	    $query = mysqli_query($db,"SELECT * FROM tipe_panggung WHERE id_penyedia = $id");
	    while ($dapatya=mysqli_fetch_array($query))
		{
			$tipenyasama = $dapatya['tipe'];
		}
		if ($tipe == $tipenyasama) {
					array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Tipe Panggung sudah ada!</strong>
			          </div>");
				}

		elseif(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'gambar/tipepanggung/'.$nama);
					$sqlpenyedia = "INSERT INTO tipe_panggung (tipe, id_penyedia, ukuran, foto, harga, dp)
								VALUES ('$tipe', $id,'$ukuran_panggung', '$nama', '$harga', '$dp')";
					mysqli_query($db, $sqlpenyedia);
					array_push($errors, "<div class='alert alert-success alert-dismissible' role='alert'>
				            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				              <span aria-hidden='true'>&times;</span>
				            </button>
				            <strong><i class='glyphicon glyphicon-ok-circle'></i> Data berhasil di masukkan!</strong>
				          </div>");
				}
		}
	}

	if (isset($_POST['dekorasi'])) {
		$ekstensi_diperbolehkan	= array('png','jpg');
		$nama = $_FILES['fotodekorasi']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['fotodekorasi']['size'];
		$file_tmp = $_FILES['fotodekorasi']['tmp_name'];
		$nama_dekorasi = mysqli_real_escape_string($db, $_POST['nama_dekorasi']);
		$id_tipe=$_GET['imei'];
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'gambar/dekorasi/'.$nama);
					$sqlpenyedia = "INSERT INTO jenis_dekorasi (id_tipe, nama_dekorasi, foto)
								VALUES ('$id_tipe', '$nama_dekorasi', '$nama')";
					mysqli_query($db, $sqlpenyedia);
					array_push($errors, "<div class='alert alert-success alert-dismissible' role='alert'>
				            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				              <span aria-hidden='true'>&times;</span>
				            </button>
				            <strong><i class='glyphicon glyphicon-ok-circle'></i> Data berhasil di masukkan!</strong>
				          </div>");
				}
		}
	}

	if (isset($_POST['penyanyi'])) {
		$ekstensi_diperbolehkan	= array('png','jpg');
		$nama = $_FILES['fotopenyanyi']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['fotopenyanyi']['size'];
		$file_tmp = $_FILES['fotopenyanyi']['tmp_name'];
		$nama_penyanyi = mysqli_real_escape_string($db, $_POST['nama_penyanyi']);
		$id_tipe=$_GET['imei'];
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'gambar/penyanyi/'.$nama);
					$sqlpenyedia = "INSERT INTO penyanyi (id_tipe, nama_penyanyi, foto)
								VALUES ('$id_tipe', '$nama_penyanyi', '$nama')";
					mysqli_query($db, $sqlpenyedia);
					array_push($errors, "<div class='alert alert-success alert-dismissible' role='alert'>
				            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				              <span aria-hidden='true'>&times;</span>
				            </button>
				            <strong><i class='glyphicon glyphicon-ok-circle'></i> Data berhasil di masukkan!</strong>
				          </div>");
				}
		}
	}

	if (isset($_POST['pemusik'])) {
		$ekstensi_diperbolehkan	= array('png','jpg');
		$nama = $_FILES['fotopemusik']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['fotopemusik']['size'];
		$file_tmp = $_FILES['fotopemusik']['tmp_name'];
		$nama_pemusik = mysqli_real_escape_string($db, $_POST['nama_pemusik']);
		$nama_alat_pemusik = mysqli_real_escape_string($db, $_POST['nama_alat_pemusik']);
		$id_tipe=$_GET['imei'];
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'gambar/pemusik/'.$nama);
					$sqlpenyedia = "INSERT INTO pemusik (id_tipe, nama_pemusik, nama_alat_pemusik, foto)
								VALUES ('$id_tipe', '$nama_pemusik', '$nama_alat_pemusik', '$nama')";
					mysqli_query($db, $sqlpenyedia);
					array_push($errors, "<div class='alert alert-success alert-dismissible' role='alert'>
				            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				              <span aria-hidden='true'>&times;</span>
				            </button>
				            <strong><i class='glyphicon glyphicon-ok-circle'></i> Data berhasil di masukkan!</strong>
				          </div>");
				}
		}
	}

	if (isset($_POST['galeri'])) {
		$ekstensi_diperbolehkan	= array('png','jpg');
		$nama = $_FILES['galeri']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['galeri']['size'];
		$file_tmp = $_FILES['galeri']['tmp_name'];
		$queryid = "SELECT * FROM penyedia WHERE id_pengguna = {$_SESSION['id_pengguna']}";
	    $resultid = mysqli_query($db, $queryid);
	    $dapatid = mysqli_fetch_array($resultid);
	    $id = $dapatid['id_penyedia'];
	    $sqlgaleri = "SELECT * FROM galeri where id_penyedia = $id";
		$querygaleri = mysqli_query($db, $sqlgaleri);
		$hasil=mysqli_num_rows($querygaleri);
		if ($hasil >= 20) {
			array_push($errors, "<div class='alert alert-danger alert-dismissible' role='alert'>
			            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			              <span aria-hidden='true'>&times;</span>
			            </button>
			            <strong><i class='glyphicon glyphicon-alert'></i> Galeri Penuh! Silahkan hapus galeri lama!</strong>
			          </div>");
		}
		else {
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
					if($ukuran < 1044070){			
						move_uploaded_file($file_tmp, 'gambar/galeri/'.$nama);
						$sqlpenyedia = "INSERT INTO galeri (id_penyedia, gambar)
									VALUES ($id,'$nama')";
						mysqli_query($db, $sqlpenyedia);
						array_push($errors, "<div class='alert alert-success alert-dismissible' role='alert'>
					            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					              <span aria-hidden='true'>&times;</span>
					            </button>
					            <strong><i class='glyphicon glyphicon-ok-circle'></i> Data berhasil di masukkan!</strong>
					          </div>");
					}
			}
		}
	}

	if (isset($_POST['insertatm'])) {
		$bank = mysqli_real_escape_string($db, $_POST['bank']);
		$norek = mysqli_real_escape_string($db, $_POST['norek']);
		$an = mysqli_real_escape_string($db, $_POST['an']);
		$queryid = "SELECT * FROM penyedia WHERE id_pengguna = {$_SESSION['id_pengguna']}";
	    $resultid = mysqli_query($db, $queryid);
	    $dapatid = mysqli_fetch_array($resultid);
	    $id = $dapatid['id_penyedia'];
		$sqlatm = "INSERT INTO atm (id_penyedia, bank, no_rek, atas_nama) VALUES ($id, '$bank', '$norek', '$an')";
		$queryatm = mysqli_query($db, $sqlatm);
	}

	if (isset($_POST['updateatm'])) {
		$bank = mysqli_real_escape_string($db, $_POST['bank']);
		$norek = mysqli_real_escape_string($db, $_POST['norek']);
		$an = mysqli_real_escape_string($db, $_POST['an']);
		$queryid = "SELECT * FROM penyedia WHERE id_pengguna = {$_SESSION['id_pengguna']}";
	    $resultid = mysqli_query($db, $queryid);
	    $dapatid = mysqli_fetch_array($resultid);
	    $id = $dapatid['id_penyedia'];
		$sqlatm = "UPDATE atm SET bank='$bank', no_rek='$norek', atas_nama='$an' WHERE id_penyedia = $id";
		$queryatm = mysqli_query($db, $sqlatm);
	}

	if(isset($_POST['booking'])){
		$nama = mysqli_real_escape_string($db, $_POST['acara']);
		$alamat = mysqli_real_escape_string($db, $_POST['alamat']);
		$no_hp = mysqli_real_escape_string($db, $_POST['hp']);
		$des = mysqli_real_escape_string($db, $_POST['deskripsi']);
		$tgl = mysqli_real_escape_string($db, $_POST['tanggal_booking']);
		$no_hp = mysqli_real_escape_string($db, $_POST['no_hp']);
		$bookingorkes = $_GET['penyedia'];
		$booking = $_GET['booking'];
		$sqlbooking = "INSERT INTO transaksi (id_penyedia, id_pengguna, id_tipe, nama_acara, tanggal, alamat, deskripsi, no_hp, keterangan)
					VALUES ($bookingorkes,{$_SESSION['id_pengguna']}, $booking,'$nama','$tgl','$alamat','$des', '$no_hp','Request')";
		mysqli_query($db, $sqlbooking);
		header('location: sudahbooking.php');
	}

	if (isset($_POST['permintaanpenyedia'])) {
		$sql="UPDATE penyedia SET notif=1 WHERE notif=0";	
		$result=mysqli_query($db, $sql);
	}

	if (isset($_POST['ada'])) {
		$queryid = "SELECT * FROM penyedia WHERE id_pengguna = {$_SESSION['id_pengguna']}";
	    $resultid = mysqli_query($db, $queryid);
	    $dapatid = mysqli_fetch_array($resultid);
	    $id = $dapatid['id_penyedia'];
		$sql="UPDATE transaksi SET status=1 WHERE status=0";	
		$result=mysqli_query($db, $sql);
		$sqltf="UPDATE transaksi SET statustf=1 WHERE statustf=0 && status=4 && bukti_transfer !='' && id_penyedia = $id";	
		$resulttf=mysqli_query($db, $sqltf);
	}

	if (isset($_POST['buka'])) {
		$transaksi = $_GET['tanggal'];
		$queryid = "SELECT * FROM penyedia WHERE id_pengguna = {$_SESSION['id_pengguna']}";
	    $resultid = mysqli_query($db, $queryid);
	    $dapatid = mysqli_fetch_array($resultid);
	    $id = $dapatid['id_penyedia'];
		$sql="UPDATE transaksi SET status=2 WHERE status=1 && id_transaksi = $transaksi";	
		$result=mysqli_query($db, $sql);
		$sqltf="UPDATE transaksi SET statustf=2 WHERE statustf=1 && status=4 && bukti_transfer !='' && id_penyedia = $id && id_transaksi = $transaksi";	
		$resulttf=mysqli_query($db, $sqltf);
	}

	if (isset($_POST['tolak'])) {
		$transaksi = $_GET['tanggal'];
		$sql="UPDATE transaksi SET keterangan='Tidak bersedia' WHERE id_transaksi = $transaksi";	
		$result=mysqli_query($db, $sql);
	}

	if (isset($_POST['bersedia'])) {
		$transaksi = $_GET['tanggal'];
		$sql="UPDATE transaksi SET keterangan='Bersedia' WHERE id_transaksi = $transaksi";	
		$result=mysqli_query($db, $sql);
	}

	if (isset($_POST['ditanggapi'])) {
		$sql="UPDATE transaksi SET status=3 WHERE status=2";	
		$result=mysqli_query($db, $sql);
	}

	if (isset($_POST['bukapengguna'])) {
		$transaksi = $_GET['tanggal'];
		$sql="UPDATE transaksi SET status=4 WHERE status=3 && id_transaksi = $transaksi";	
		$result=mysqli_query($db, $sql);
	}

	if (isset($_POST['tf'])) {
		$ekstensi_diperbolehkan	= array('png','jpg');
		$nama = $_FILES['bukti']['name'];
		$x = explode('.', $nama);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['bukti']['size'];
		$file_tmp = $_FILES['bukti']['tmp_name'];
		$transaksi = $_GET['tanggal'];
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 1044070){			
					move_uploaded_file($file_tmp, 'gambar/buktitf/'.$nama);
					$sqltf = "UPDATE transaksi SET bukti_transfer = '$nama' WHERE id_transaksi = $transaksi";
					mysqli_query($db, $sqltf);
					array_push($errors, "<div class='alert alert-success alert-dismissible' role='alert'>
				            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				              <span aria-hidden='true'>&times;</span>
				            </button>
				            <strong><i class='glyphicon glyphicon-ok-circle'></i> Bukti transfer berhasil dikirim!</strong>
				          </div>");
				}
		}
	}

	if(isset($_GET['logout'])){
		unset($_SESSION['email']);
		header('location: ../login.php');
	}

	if(isset($_GET['logoutadmin'])){
		session_destroy();
		unset($_SESSION['username']);
		header('location: loginadmin.php');
	}	

?>