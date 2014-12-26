<html>
<body>
<div id="featured_form">
<?php
include('../database/config.php');
error_reporting(0);
$idbus=$_GET['idbus'];
$query=mysql_query("
UPDATE `bus` SET `status`='2'
where `id_bus` = $idbus
");
if($query){echo "<script>alert('Bus dinonaktifkan!');
    window.location=('index.php?halaman=bus');</script>";}else{
echo "<script>alert('Nonaktivasi gagal!');
    window.location=('index.php?halaman=bus');</script>";
}
?>
</body>
</html>