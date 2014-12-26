<html>
<body>
<div id="featured_form">
<?php
error_reporting(0);
$paket=$_POST['idpaket'];
$queryhapus=mysql_query("
delete from paket where id_paket=$paket
");
if($queryapus){echo "<script>alert('Hapus Paket gagal!');
    window.location=('index.php?halaman=paket');</script>";}else{
echo "<script>alert('Hapus Paket berhasil!');
    window.location=('index.php?halaman=paket');</script>";
}
?>
</body>
</html>