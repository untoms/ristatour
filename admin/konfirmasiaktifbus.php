<html>
<body>
<div id="featured_form">
<?php
include('../database/config.php');
error_reporting(0);
$idbus=$_GET['idbus'];
$query=mysql_query("
UPDATE `bus` SET `status`='1'
where `id_bus` = $idbus
");
if($query){echo "<script>alert('Bus diaktifkan!');
    window.location=('index.php?halaman=bus');</script>";}else{
echo "<script>alert('Aktivasi gagal!');
    window.location=('index.php?halaman=bus');</script>";
}
?>
</body>
</html>