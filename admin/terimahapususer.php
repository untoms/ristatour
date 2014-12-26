<html>
<body>
<div id="featured_form">
<?php
error_reporting(0);
$iduser=$_POST['iduser'];
$queryhapus=mysql_query("
delete from user where user_id=$iduser
");
if($queryapus){echo "<script>alert('Hapus anggota gagal!');
    window.location=('index.php?halaman=anggota');</script>";}else{
echo "<script>alert('Hapus anggota berhasil!');
    window.location=('index.php?halaman=anggota');</script>";
}
?>
</body>
</html>