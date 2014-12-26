<html>
<body>
<div id="featured_form">
<?php
error_reporting(0);
$idobjek=$_POST['idobjek'];
$queryhapus=mysql_query("
delete from objek where id_objek=$idobjek
");
if($queryapus){echo "<script>alert('Hapus Objek gagal!');
    window.location=('index.php?halaman=objek');</script>";}else{
echo "<script>alert('Hapus Objek berhasil!');
    window.location=('index.php?halaman=objek');</script>";
}
?>
</body>
</html>