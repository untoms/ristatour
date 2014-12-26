<html>
<body>
<div id="featured_form">
<?php

$bus=$_POST['busname'];
$kursi=$_POST['kursi'];
$ac=$_POST['ac'];
$toilet=$_POST['toilet'];
$fullmusic=$_POST['fullmusic'];
$charger=$_POST['charger'];

$ext	= array('png', 'jpeg', 'jpg');
//data gambar
$file_name		= $_FILES['file']['name'];
$file_ext		= strtolower(end(explode('.', $file_name)));
$file_tmp		= $_FILES['file']['tmp_name'];

if (empty($_FILES['file']['name'])){
echo "<script>alert('Tambah Bus gagal!, File Upload anda Kosong');
window.location=('index.php?halaman=bus');</script>";
}
else{
if(in_array($file_ext, $ext) === true){
						$alamatfile = 'images/bus/'.$_POST['busname'].'.'.$file_ext;
						$lokasifile = '../images/bus/'.$_POST['busname'].'.'.$file_ext;
						//kode untuk upload ke folder gambar
						move_uploaded_file($file_tmp, $lokasifile);

						$query=mysql_query("INSERT INTO `bus`( `nama_bus`, `jumlah_kursi`, `AC`, `Toilet`, `full_music`,`charger`,`gambar`,`status`) VALUES 
							('$bus','$kursi','$ac','$toilet','$fullmusic','$charger','$alamatfile','1')");
						if($query){echo "<script>alert('Tambah Bus berhasil!');
    					window.location=('index.php?halaman=bus');</script>";}else{
						echo "<script>alert('Tambah Bus gagal!');
    					window.location=('index.php?halaman=bus');</script>";
    				}
				}else{
					echo "<script>alert('Tambah Bus gagal!, Ekstensi file upload tidak diperbolehkan');
   					window.location=('index.php?halaman=bus');</script>";
				}
}
?>
</body>
</html>