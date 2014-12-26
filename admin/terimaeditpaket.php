<html>
<body>
<div id="featured_form">
<?php
error_reporting(0);
$idpaket=$_POST['idpaket'];
$paket=$_POST['paket'];
$city=$_POST['city'];
$durasi=$_POST['durasi'];
$harga=$_POST['harga'];
$queryedit=mysql_query("
UPDATE `paket` SET `nama_paket`='$paket',`harga`=$harga,`wilayah`=$city,`durasi`=$durasi WHERE `id_paket`=$idpaket
");
if($queryedit){echo "<script>alert('Edit Paket berhasil!');
    window.location=('index.php?halaman=paket');</script>";}else{
echo "<script>alert('Edit Paket gagal!');
    window.location=('index.php?halaman=objek');</script>";
}
?>
<!--<a href='cetak.php'>- Cetak Data Mahasiswa -</a>-->
</body>
</html>