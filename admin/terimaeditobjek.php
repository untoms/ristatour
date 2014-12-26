<html>
<body>
<div id="featured_form">
<?php
error_reporting(0);
$idobjek=$_POST['idobjek'];
$objekname=$_POST['objekname'];
$city=$_POST['city'];
$alamat=$_POST['alamat'];
$deskripsi=$_POST['deskripsi'];
$harga=$_POST['harga'];
$queryedit=mysql_query("
UPDATE `objek` SET `wilayah`='$city',`nama_objek`='$objekname',`alamat_objek`='$alamat',`deskripsi_objek`='$deskripsi',`harga_objek`='$harga'
where `id_objek` = $idobjek
");
if($queryedit){echo "<script>alert('Edit Objek berhasil!');
    window.location=('index.php?halaman=objek');</script>";}else{
echo "<script>alert('Edit Objek gagal!');
    window.location=('index.php?halaman=objek');</script>";
}
?>
<!--<a href='cetak.php'>- Cetak Data Mahasiswa -</a>-->
</body>
</html>