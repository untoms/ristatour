<html>
<body>
<div id="featured_form">
<?php
error_reporting(0);
$idhotel=$_POST['idhotel'];
$queryhapus=mysql_query("
delete from hotel where id_hotel=$idhotel
");
if($queryapus){echo "<script>alert('Hapus Hotel gagal!');
    window.location=('index.php?halaman=penginapan');</script>";}else{
echo "<script>alert('Hapus Hotel berhasil!');
    window.location=('index.php?halaman=penginapan');</script>";
}
?>
</body>
</html>