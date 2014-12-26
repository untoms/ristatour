<html>
<body>
<div id="featured_form">
<?php
error_reporting(0);
$idpaket=$_POST['idpaket'];
$iduser=$_POST['iduser'];
$day=$_POST['day'];
$querycek=mysql_query("SELECT * 
FROM  `pemesanan` 
WHERE  `user_id` =$iduser
AND  `id_paket` =$idpaket");

$hasil=mysql_num_rows($querycek);

if($hasil==0){
$queryedit=mysql_query("
INSERT INTO `pemesanan`(`user_id`, `id_paket`, `tanggal_mulai`, `status`) VALUES ('$iduser','$idpaket','$day', 2)
");
if($queryedit==1){echo "<script>alert('Pemesanan berhasil!');
    window.location=('index.php?halaman=paket');</script>";}else{
echo "<script>alert('Pemesanan gagal!');
    window.location=('index.php?halaman=tour');</script>";
}
}else{echo "<script>alert('Pemesanan gagal! $idpaket , $iduser,$day');
    window.location=('index.php?halaman=paket');</script>";}
?>
<!--<a href='cetak.php'>- Cetak Data Mahasiswa -</a>-->
</body>
</html>