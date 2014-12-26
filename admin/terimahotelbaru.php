<html>
<body>
<div id="featured_form">
<?php

$hotel=$_POST['hotel'];
$city=$_POST['city'];
$alamat=$_POST['alamat'];
$ext	= array('png', 'jpeg', 'jpg');
//data gambar
$file_name		= $_FILES['file']['name'];
$file_ext		= strtolower(end(explode('.', $file_name)));
$file_tmp		= $_FILES['file']['tmp_name'];

if (empty($_FILES['file']['name'])){
echo "<script>alert('Tambah Hotel gagal!, File Upload anda Kosong');
window.location=('index.php?halaman=penginapan');</script>";
}
else{
if(in_array($file_ext, $ext) === true){
						$alamatfile = 'images/hotel/'.$_POST['hotel'].'.'.$file_ext;
						$lokasifile = '../images/hotel/'.$_POST['hotel'].'.'.$file_ext;
						//kode untuk upload ke folder gambar
						move_uploaded_file($file_tmp, $lokasifile);

						$query=mysql_query("INSERT INTO `hotel`( `nama_hotel`, `alamat`, `wilayah`, `gambar`,`status`) VALUES ('$hotel','$alamat','$city','$alamatfile','1')");
						if($query){echo "<script>alert('Tambah Hotel berhasil!');
    					window.location=('index.php?halaman=penginapan');</script>";}else{
						echo "<script>alert('Tambah Hotel gagal!');
    					window.location=('index.php?halaman=penginapan');</script>";
    				}
				}else{
					echo "<script>alert('Tambah Hotel gagal!, Ekstensi file upload tidak diperbolehkan');
   					window.location=('index.php?halaman=penginapan');</script>";
				}
}
?>
</body>
</html>