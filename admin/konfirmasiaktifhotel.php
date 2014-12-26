<html>
<body>
<div id="featured_form">
<?php
include('../database/config.php');
error_reporting(0);
$idhotel=$_GET['idhotel'];
$query=mysql_query("
UPDATE `hotel` SET `status`='1'
where `id_hotel` = $idhotel
");
if($query){echo "<script>alert('Hotel diaktifkan!');
    window.location=('index.php?halaman=penginapan');</script>";}else{
echo "<script>alert('Aktivasi gagal!');
    window.location=('index.php?halaman=penginapan');</script>";
}
?>
</body>
</html>