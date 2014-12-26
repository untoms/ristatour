<html>
<body>
<div id="featured_form">
<?php
error_reporting(0);
$idbus=$_POST['idbus'];
$busname=$_POST['busname'];
$kursi=$_POST['kursi'];
$ac=$_POST['ac'];
$toilet=$_POST['toilet'];
$fullmusic=$_POST['fullmusic'];
$charger=$_POST['charger'];
$queryedit=mysql_query("
UPDATE `bus` SET `nama_bus`='$busname',`jumlah_kursi`='$kursi',`AC`='$ac',`Toilet`='$toilet',`full_music`='$fullmusic',`charger`='$charger'
where `id_bus` = $idbus
");
if($queryedit){echo "<script>alert('Edit bus berhasil!');
    window.location=('index.php?halaman=bus');</script>";}else{
echo "<script>alert('Edit bus gagal!');
    window.location=('index.php?halaman=bus');</script>";
}
?>
<!--<a href='cetak.php'>- Cetak Data Mahasiswa -</a>-->
</body>
</html>