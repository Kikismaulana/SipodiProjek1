<?php include '../server.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        $idtransaksi = $_GET['penyewa'];
        $tf = "SELECT * FROM transaksi WHERE id_transaksi = $idtransaksi";
        $dapattf = mysqli_query ($db, $tf);
        $d = mysqli_fetch_array($dapattf)
    ?>
    <div class="container" style="padding: 50px">
    	<div class="row">
    		<div class="col-md-12" align="center">
    			<div class="panel panel-primary">
			        <div class="panel-heading"><h2><b>Bukti transfer penyewaan</b></h2></div>
			        <div class="panel-body">
    			      	
                        <?php if($d[bukti_transfer]=="") { ?>
                            <h3>Mohon bersabar, Penyewa belum mengirimkan bukti transfer.</h3>
                            <h4><b style="color: #a51c2c">Demi kenyamanan bersama anda dapat menghubungi kontak penyewa yang ada pada detail penyewaan.</b><br><br><b>Terimakasih.<a href="index.php?page=transaksipenyedia&tanggal=<?php echo $idtransaksi ?>">Kembali</a></b></h4>
                            <?php } else { ?>
                            <h3>Penyewa telah mentransfer DP dengan bukti sebagai berikut :</h3>
                            <img src="<?php echo "../pengguna/gambar/buktitf/".$d['bukti_transfer']; ?>" width="30%">
                            <h4><b style="color: #a51c2c">Demi kepercayaan penyewa dimohon untuk segera menghubungi kontak penyewa yang ada pada detail penyewaan.</b><br><br><b>Terimakasih. <a href="index.php?page=transaksipenyedia&tanggal=<?php echo $idtransaksi ?>"> Kembali</a></b></h4>

                        <?php } ?>
			        </div>
			    </div>
    		</div>
    	</div>
    </div>
    <div class="row" style="box-shadow: 0px -4px 5px -4px black; padding: 20px 0px 20px 0px">
        <div class="container">
            <div class="col-sm-12">
                <footer>
                    <font>&copy Copyright 2017 Si Podi</font>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>