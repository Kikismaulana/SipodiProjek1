<?php include '../server.php';
	$transaksi = $_GET['tanggal'];
	$sqltransaksi = "SELECT * FROM transaksi where id_transaksi = $transaksi";
	$querytransaksi = mysqli_query($db, $sqltransaksi);
	$dapattransaksi = mysqli_fetch_array($querytransaksi);
	$sqlatm = "SELECT * FROM atm where id_penyedia = $dapattransaksi[id_penyedia]";
	$queryatm = mysqli_query($db, $sqlatm);
	$dapatatm = mysqli_fetch_array($queryatm);
	$sqlpanggung = "SELECT * FROM tipe_panggung where id_tipe = $dapattransaksi[id_tipe]";
	$querypanggung = mysqli_query($db, $sqlpanggung);
	$dapatpanggung = mysqli_fetch_array($querypanggung);
?>
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
    <div class="container" style="padding: 50px">
    	<div class="row">
    		<div class="col-md-12" align="center">
    			<div class="panel panel-primary">
			      <div class="panel-heading"><h2><b>Permintaan Penyewaan Orkes Dangdut Telah di tanggapi</b></h2></div>
			      <div class="panel-body">
			      	<h3>Silahkan transfer DP untuk melanjutkan proses transaksi,</h3>
			      	<table align="center" style="font-size: 20px">
				    	<tr>
				    		<td style="padding: 5px">Tipe</td>
				    		<td width="50px" align="center">:</td>
				    		<td><?php echo "$dapatpanggung[tipe]"; ?></td>
				    	</tr>
				    	<tr>
				    		<td style="padding: 5px">Harga</td>
				    		<td width="50px" align="center">:</td>
				    		<td><?php echo "$dapatpanggung[harga]"; ?></td>
				    	</tr>
				    	<tr>
				    		<td style="padding: 5px">DP</td>
				    		<td width="50px" align="center">:</td>
				    		<td><?php echo "$dapatpanggung[dp]"; ?></td>
				    	</tr>
				    	<tr>
				    		<td style="padding: 5px">No. Rek</td>
				    		<td width="50px" align="center">:</td>
				    		<td><?php echo "$dapatatm[no_rek]"; ?></td>
				    	</tr>
				    	<tr>
				    		<td style="padding: 5px">A.n</td>
				    		<td width="50px" align="center">:</td>
				    		<td><?php echo "$dapatatm[atas_nama]"; ?></td>
				    	</tr>
				    	<tr>
				    		<td style="padding: 5px">Bank</td>
				    		<td width="50px" align="center">:</td>
				    		<td><?php echo "$dapatatm[bank]"; ?></td>
				    	</tr>
				    </table>
			      	<h4>Penyedia akan mengubungi anda setelah anda mengupload bukti transfer, <a href="index.php?page=transaksi&tanggal=<?php echo "$transaksi"; ?>"><b> Upload Bukti Transfer</b></a></h4>
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