<html>
<body>
<div id="featured_form">
<?php
error_reporting(0);
$idbus=$_POST['idbus'];
$queryhapus=mysql_query("
delete from bus where id_bus=$idbus
");
if($queryapus){echo "<script>alert('Hapus Bus gagal!');
    window.location=('index.php?halaman=bus');</script>";}else{
echo "<script>alert('Hapus Bus berhasil!');
    window.location=('index.php?halaman=bus');</script>";
}
?>
</body>
</html>