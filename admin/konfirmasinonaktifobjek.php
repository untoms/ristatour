<html>
<body>
<div id="featured_form">
<?php
include('../database/config.php');
error_reporting(0);
$idobjek=$_GET['idobjek'];
$query=mysql_query("
UPDATE `objek` SET `status`='2'
where `id_objek` = $idobjek
");
if($query){echo "<script>alert('Objek dinonaktifkan!');
    window.location=('index.php?halaman=objek');</script>";}else{
echo "<script>alert('Nonaktivasi gagal!');
    window.location=('index.php?halaman=objek');</script>";
}
?>
</body>
</html>