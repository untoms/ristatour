<html>
<body>
<div id="featured_form">
<?php
include('../database/config.php');
error_reporting(0);
$idpaket=$_GET['idpaket'];
$querykonfirm=mysql_query("
UPDATE `paket` SET `status`='2'
where `id_paket` = $idpaket
");
if($querykonfirm){echo "<script>alert('Paket dinonaktifkan!');
    window.location=('index.php?halaman=paket');</script>";}else{
echo "<script>alert('Nonaktivasi gagal!');
    window.location=('index.php?halaman=paket');</script>";
}
?>
</body>
</html>