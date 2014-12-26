<html>
<body>
<div id="featured_form">
<?php
error_reporting(0);
$idhotel=$_POST['idhotel'];
$hotelname=$_POST['hotelname'];
$city=$_POST['city'];
$alamat=$_POST['alamat'];
$queryedit=mysql_query("
UPDATE `hotel` SET `nama_hotel`='$hotelname',`alamat`='$alamat',`wilayah`='$city'
where `id_hotel` = $idhotel
");
if($queryedit){echo "<script>alert('Edit Hotel berhasil!');
    window.location=('index.php?halaman=penginapan');</script>";}else{
echo "<script>alert('Edit Hotel gagal!');
    window.location=('index.php?halaman=penginapan');</script>";
}
?>
<!--<a href='cetak.php'>- Cetak Data Mahasiswa -</a>-->
</body>
</html>