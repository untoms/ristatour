<?php
session_start();
$jenis=$_GET['jenis'];
if($jenis==1){
unset($_SESSION['akhir']);
unset($_SESSION['isi']);
echo "<meta http-equiv='refresh' content='0;url=http://localhost:81/flat/admin/index.php?halaman=paketnext&status=1'>";
}else{
unset($_SESSION['akhir1']);
unset($_SESSION['isi1']);
echo "<meta http-equiv='refresh' content='0;url=http://localhost:81/flat/admin/index.php?halaman=next1&status=1'>";	
}
?>

