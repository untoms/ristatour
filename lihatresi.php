<?php
include('../database/config.php');
$idpesan=$_GET['idpesan'];
$querypesan1=mysql_query("SELECT * 
FROM pemesanan, paket, user
WHERE pemesanan.user_id = user.user_id
AND pemesanan.id_paket = paket.id_paket
AND pemesanan.id_pemesanan = $idpesan
LIMIT 0 , 30;");
$cetakpesan1=mysql_fetch_array($querypesan1);
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Portfolio</h1>
                    <?php echo $cetakpesan1['id_pemesanan']; ?>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Portfolio</li>
                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title--> 
    <section id='portfolio' class='container'>
            <h2 class="title">Lihat Resi</h2>
             <div class="col-xs-6">
                <div class="portfolio-item">
                    <div class="form-group">
                        <label for="Input">ID Pemesanan</label>
                         <input type="text" class="form-control" name="idpesan" value="<?php echo $cetakpesan1['id_pemesanan']; ?>" readonly>
                        </div>
                    <div class="item-inner">
                        <a href="#"><img class="img-responsive" src="<?php echo $cetakpesan1['bukti'] ?>" alt=""></a>
                    <div class="overlay">
                    <a class="preview btn btn-danger" title="Resi" href="<?php echo $cetakpesan1['bukti'] ?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                     </div>
                    </div>
                    <a href="index.php?halaman=cart" class="btn btn-primary">Kembali</a>
                </div>
              </div>
</section>
</body>
</html>