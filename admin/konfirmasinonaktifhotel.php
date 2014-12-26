<html>
<body>
<div id="featured_form">
<?php
include('../database/config.php');
error_reporting(0);
$idhotel=$_GET['idhotel'];
$query=mysql_query("
UPDATE `hotel` SET `status`='2'
where `id_hotel` = $idhotel
");
if($query){echo "<script>alert('Hotel dinonaktifkan!');
    window.location=('index.php?halaman=penginapan');</script>";}else{
echo "<script>alert('Nonaktivasi gagal!');
    window.location=('index.php?halaman=penginapan');</script>";
}
?>
</body>
</html>