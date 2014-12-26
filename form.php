<?php
include('../database/config.php');
$idpesan=$_GET["idpesan"];
$querypesan1=mysql_query("SELECT * 
FROM pemesanan, paket, user
WHERE pemesanan.user_id = user.user_id
AND pemesanan.id_paket = paket.id_paket
AND pemesanan.id_pemesanan = $idpesan
LIMIT 0 , 30;");
$cetakpesan1=mysql_fetch_array($querypesan1);
?>
<html>
	<head>
		<title>Membuat Laporan PDF dengan DomPDF</title>
		<style type="text/css">
			label{
				display:inline-block;
				width:100px;
			}
			
			#topdf{
				margin:0 0 0 100px;
			}
			
		</style>
	</head>
	<body>
	<section id='portfolio' class='container'>
          <h2 class="title">Bukti Pembayaran</h2>
             <div class="col-xs-6">
                <div class="portfolio-item">
		<form action="topdf.php" method="POST">
			<div class="form-group">
        		<label for="Input">ID Pemesanan</label>
        		<input type="text" class="form-control" name="idpesan" value="<?php echo $cetakpesan1['id_pemesanan'] ?>" readonly>
            </div>
            <div class="form-group">
        		<label for="Input">Nama Pemesanan</label>
        		<input type="text" class="form-control" name="username" value="<?php echo $cetakpesan1['username'] ?>" readonly>
            </div>
            <div class="form-group">
        		<label for="Input">Nama Paket</label>
        		<input type="text" class="form-control" name="namapaket" value="<?php echo $cetakpesan1['nama_paket'] ?>" readonly>
            </div>
            <div class="form-group">
        		<label for="Input">Harga Paket</label>
        		<input type="text" class="form-control" name="hargapaket" value="<?php echo $cetakpesan1['harga'] ?>" readonly>
            </div>
            <div class="form-group">
        		<label for="Input">Tanggal Berangkat</label>
        		<input type="text" class="form-control" name="tanggal_mulai" value="<?php echo $cetakpesan1['tanggal_mulai'] ?>" readonly>
            </div>
            <div class="form-group">
        		<label for="Input">Status</label>
        		<input type="text" class="form-control" name="tanggal_mulai" value="<?php echo $cetakpesan1['tanggal_mulai'] ?>" readonly>
            </div>
			<input type="submit" name="kirim" id="topdf" value="Ambil Laporan!" <?php if($cetakpesan1['pemesanan.status']==1){echo "disabled";}?>/>
		</div>
		</form>
	</div>
</section>
	</body>
</html>