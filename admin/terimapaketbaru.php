<html>
<body>
<div id="featured_form">
<?php 
session_start();
$namapaket = $_SESSION["paket"];
$city = $_SESSION["city"];
$harga = $_SESSION["harga"];
$durasi = $_SESSION["durasi"];
$bus = $_POST['bus'];
$ext	= array('png', 'jpeg', 'jpg');

$file_name		= $_FILES['file']['name'];
$file_ext		= strtolower(end(explode('.', $file_name)));
$file_tmp		= $_FILES['file']['tmp_name'];

if (empty($_FILES['file']['name'])){
echo "<script>alert('Tambah Paket gagal!, File Upload anda Kosong');
window.location=('index.php?halaman=next2');</script>";
}
else{
if(in_array($file_ext, $ext) === true){
						$alamatfile = 'images/packet/'.$namapaket.'.'.$file_ext;
						$lokasifile = '../images/packet/'.$namapaket.'.'.$file_ext;
						//kode untuk upload ke folder gambar
						move_uploaded_file($file_tmp, $lokasifile);

						$query=mysql_query("INSERT INTO `paket`(`nama_paket`, `harga`, `wilayah`, `durasi`, `gambar`,`status`) VALUES ('$namapaket','$harga','$city','$durasi','$alamatfile','2')");
						if($query){
						$sql = mysql_query("SELECT * 
												FROM  `paket` 
												ORDER BY id_paket DESC 
												LIMIT 0 , 1");
							$cetakpesan=mysql_fetch_array($sql);
							$idpaket=$cetakpesan['id_paket'];
							$awal = $_SESSION["isi"];
							for ($i=0;$i<=$awal;$i++) {
						if (@$_SESSION['akhir'][$i][0]!=''){
						@$id = $_SESSION['akhir'][$i][0];
							$sqlobjek = mysql_query("INSERT INTO `detail_paket_objek`( `id_paket`, `id_objek`) VALUES ($idpaket,$id)");
						}
    					}
							$star = $_SESSION["isi1"];
						for ($a=0;$a<=$star;$a++) {
						if (@$_SESSION['akhir1'][$a][0]!=''){
						@$id1 = $_SESSION['akhir1'][$a][0];
						$sqlhotel = mysql_query("INSERT INTO `detail_paket_hotel`( `id_paket`, `id_hotel`) VALUES ($idpaket,$id1)");
						}
    				}
    					$sqlbus = mysql_query("INSERT INTO `detail_paket_bus`( `id_paket`, `id_bus`) VALUES ($idpaket,
    						$bus)");
    				
						echo "<script>alert('Tambah Paket berhasil! ');
    					window.location=('index.php?halaman=paket');</script>";
    					unset($_SESSION["paket"]);
						unset($_SESSION["city"]);
						unset($_SESSION["harga"]);
						unset($_SESSION["durasi"]);
						unset($_SESSION['akhir']);
						unset($_SESSION['isi']);
						unset($_SESSION['akhir1']);
						unset($_SESSION['isi1']);}else{
						echo "<script>alert('Tambah Paket gagal! $namapaket, $harga, $city, $durasi, $alamatfile');
    					window.location=('index.php?halaman=paket');</script>";}
    				
				}else{
					echo "<script>alert('Tambah Paket gagal!, Ekstensi file upload tidak diperbolehkan');
   					window.location=('index.php?halaman=next2');</script>";
				}
}
echo $namapaket;
echo $bus;

	/*$sql = mysql_query("SELECT * 
												FROM  `paket` 
												ORDER BY id_paket DESC 
												LIMIT 0 , 1");
							$cetakpesan=mysql_fetch_array($sql)
							$idpaket=$cetakpesan['id_paket'];
							@$awal = $_SESSION["isi"];
							for ($i=0;$i<=$awal;$i++) {
						if (@$_SESSION['akhir'][$i][0]!=''){
						@$id = $_SESSION['akhir'][$i][0];
							$sqlobjek = mysql_query("INSERT INTO `detail_paket_objek`( `id_paket`, `id_objek`) VALUES ($idpaket,$id)");
						}
    					}
							@$star = $_SESSION["isi1"];
						for ($a=0;$a<=$star;$a++) {
						if (@$_SESSION['akhir1'][$a][0]!=''){
						@$id1 = $_SESSION['akhir1'][$a][0];
						$sqlobjek = mysql_query("INSERT INTO `detail_paket_hotel`( `id_paket`, `id_hotel`) VALUES ($idpaket,$id1)");
						}
    				}*/
?>
</html>
</body>