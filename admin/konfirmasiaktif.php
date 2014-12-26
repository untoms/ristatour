<html>
<body>
<div id="featured_form">
<?php
include('../database/config.php');
error_reporting(0);
$idpaket=$_GET['idpaket'];
$query=mysql_query("
UPDATE `paket` SET `status`='1'
where `id_paket` = $idpaket
");
if($query){echo "<script>alert('Paket diaktifkan!');
    window.location=('index.php?halaman=paket');</script>";}else{
echo "<script>alert('Aktivasi gagal!');
    window.location=('index.php?halaman=paket');</script>";
}
?>
</body>
</html>