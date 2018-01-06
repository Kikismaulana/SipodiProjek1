<?php
include "../server.php";

if($_GET['stat']=='tipepanggung'){
$imei = $_GET['imei'];
$hapus = "DELETE FROM tipe_panggung where tipe='$imei'";
$laksanakan=mysqli_query($db,$hapus) or die ("Gagal hapus data").mysqli_error($db);
if ($laksanakan) {
// Konfirmasi Sukses
header('location: index.php?page=masukkandetail1');
}
else { 
header('location: index.php?page=masukkandetail1');
}
}

if($_GET['stat']=='dekorasi'){
$imei = $_GET['imei'];
$id = $_GET['id'];
$hapus = "DELETE FROM jenis_dekorasi where id_jenis_dekorasi='$id'";
$laksanakan=mysqli_query($db,$hapus) or die ("Gagal hapus data").mysqli_error($db);
$tetap = "index.php?page=masukkandetail2&imei=$imei&id=$id";
if ($laksanakan) {
// Konfirmasi Sukses
header('location: '.$tetap);
}
else { 
header('location: '.$tetap);
}
}

if($_GET['stat']=='penyanyi'){
$imei = $_GET['imei'];
$id = $_GET['id'];
$hapus = "DELETE FROM penyanyi where id_penyanyi='$id'";
$laksanakan=mysqli_query($db,$hapus) or die ("Gagal hapus data").mysqli_error($db);
$tetap = "index.php?page=masukkandetail3&imei=$imei&id=$id";
if ($laksanakan) {
// Konfirmasi Sukses
header('location: '.$tetap);
}
else { 
header('location: '.$tetap);
}
}

if($_GET['stat']=='pemusik'){
$imei = $_GET['imei'];
$id = $_GET['id'];
$hapus = "DELETE FROM pemusik where id_pemusik='$id'";
$laksanakan=mysqli_query($db,$hapus) or die ("Gagal hapus data").mysqli_error($db);
$tetap = "index.php?page=masukkandetail4&imei=$imei&id=$id";
if ($laksanakan) {
// Konfirmasi Sukses
header('location: '.$tetap);
}
else { 
header('location: '.$tetap);
}
}

if($_GET['stat']=='galeri'){
$id = $_GET['id'];
$hapus = "DELETE FROM galeri where id_galeri='$id'";
$laksanakan=mysqli_query($db,$hapus) or die ("Gagal hapus data").mysqli_error($db);
$tetap = "index.php?page=perbaruiinformasigaleripenyedia&id=$id";
if ($laksanakan) {
// Konfirmasi Sukses
header('location: '.$tetap);
}
else { 
header('location: '.$tetap);
}
}

?>