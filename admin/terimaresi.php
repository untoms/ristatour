<html>
<body>
<div id="featured_form">
<?php
error_reporting(0);
$idpesan=$_POST['idpesan'];
$querykonfirm=mysql_query("
UPDATE `pemesanan` SET `status`='1'
where `id_pemesanan` = $idpesan
");
if($querykonfirm){echo "<script>alert('Pemesanan dikonfirmasi!');
    window.location=('index.php?halaman=pemesanan');</script>";}else{
echo "<script>alert('Konfirmasi gagal!');
    window.location=('index.php?halaman=pemesanan');</script>";
}
?>
<!--<a href='cetak.pp'>- Cetak Data Mahasiswa -</a>-->
</body>
</html>