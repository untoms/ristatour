<html>
<body>
<div id="featured_form">
<?php
include('../database/config.php');
error_reporting(0);
$iduser=$_GET['iduser'];
$query=mysql_query("
UPDATE `user` SET `status`='1'
where `user_id` = $iduser
");
if($query){echo "<script>alert('Anggota diaktifkan!');
    window.location=('index.php?halaman=anggota');</script>";}else{
echo "<script>alert('Aktivasi gagal!');
    window.location=('index.php?halaman=anggota');</script>";
}
?>
</body>
</html>