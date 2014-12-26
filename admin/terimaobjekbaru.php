<html>
<body>
<div id="featured_form">
<?php

$objek=$_POST['objek'];
$city=$_POST['city'];
$alamat=$_POST['alamat'];
$deskripsi=$_POST['deskripsi'];
$harga=$_POST['harga'];

$ext	= array('png', 'jpeg', 'jpg');
//data gambar
$file_name		= $_FILES['file']['name'];
$file_ext		= strtolower(end(explode('.', $file_name)));
$file_tmp		= $_FILES['file']['tmp_name'];

if (empty($_FILES['file']['name'])){
echo "<script>alert('Tambah Objek gagal!, File Upload anda Kosong');
window.location=('index.php?halaman=objek');</script>";
}
else{
if(in_array($file_ext, $ext) === true){
						$alamatfile = 'images/objek/'.$_POST['objek'].'.'.$file_ext;
						$lokasifile = '../images/objek/'.$_POST['objek'].'.'.$file_ext;
						//kode untuk upload ke folder gambar
						move_uploaded_file($file_tmp, $lokasifile);

						$query=mysql_query("INSERT INTO `objek`( `nama_objek`, `alamat_objek`, `wilayah`,`deskripsi_objek`,`harga_objek`,`gambar`,`status`) VALUES ('$objek','$alamat','$city','$deskripsi','$harga','$alamatfile','1')");
						if($query){echo "<script>alert('Tambah Objek berhasil!');
    					window.location=('index.php?halaman=objek');</script>";}else{
						echo "<script>alert('Tambah Objek gagal!');
    					window.location=('index.php?halaman=objek');</script>";
    				}
				}else{
					echo "<script>alert('Tambah Objek gagal!, Ekstensi file upload tidak diperbolehkan');
   					window.location=('index.php?halaman=objek');</script>";
				}
}
?>
</body>
</html>