<?php
include "../server.php";

if($_GET['stat']=='penyedia'){
$imei = $_GET['imei'];
$hapus = "delete from penyedia where id_penyedia='$imei'";
$cari = "SELECT * FROM penyedia where id_penyedia = '$imei'";
$querycari = mysqli_query($db, $cari);
$hasilcari = mysqli_fetch_array($querycari);
$idpenyedianya = $hasilcari[id_pengguna];
$update = "UPDATE pengguna SET status = 'pengguna' where id_pengguna=$idpenyedianya";
mysqli_query($db,$hapus) or die ("Gagal hapus data".mysqli_error($db));
mysqli_query($db,$update) or die ("Gagal hapus data".mysqli_error($db));
header('location: index.php?page=penyedia');
}

else if($_GET['stat']=='pengguna'){
$imei = $_GET['imei'];
$hapus = "delete from pengguna where id_pengguna='$imei'";
mysqli_query($db,$hapus) or die ("Gagal hapus data".mysqli_error($db));
header('location: index.php?page=pengguna');
}

?>