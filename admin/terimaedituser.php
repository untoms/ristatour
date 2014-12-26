<html>
<body>
<div id="featured_form">
<?php
error_reporting(0);
$iduser=$_POST['iduser'];
$username=$_POST['username'];
$telpon=$_POST['phone'];
$email=$_POST['email'];
$queryedit=mysql_query("
update user set
`username` = '$username',
`phone` = '$phone',
`email` = '$email'
where `user_id` = $iduser
");
if($queryedit){echo "<script>alert('Edit anggota berhasil!');
    window.location=('index.php?halaman=anggota');</script>";}else{
echo "<script>alert('Edit anggota gagal!');
    window.location=('index.php?halaman=anggota');</script>";
}
?>
<!--<a href='cetak.php'>- Cetak Data Mahasiswa -</a>-->
</body>
</html>