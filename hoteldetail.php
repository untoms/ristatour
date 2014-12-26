<!DOCTYPE html>
<?php
include('../database/config.php');
$namahotel=$_GET['judul'];
$gambar=$_GET['gambar'];
$idhotel=$_GET['idhotel'];
?>
<html lang="en">
<body>
    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1><?php echo $namahotel;?></h1>
                </div>
            </div>
        </div>
    </section><!--/#title-->
   
<div class="popup-overlay"></div>    
            <div class="col-sm-8 col-sm-pull-4">
                <div class="blog">
                    <div class="blog-item">
                        <img class="img-responsive img-blog" src="<?php echo $gambar;?>" width="100%" alt="" />
                        <div class="blog-content">
                            <h3><?php echo $namahotel;?></h3>
                            <section id="portfolio" class="container">
        <ul class="portfolio-filter">
            <li><a class="btn btn-default active" href="#" data-filter="*">All</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".objek">Objek</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".hotel">Hotel</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".bus">Bus</a></li>
        </ul>
                <ul class="portfolio-items col-9">
                    <li class="portfolio-item hotel">
                        <?php
                        $queryhotel=mysql_query("SELECT * 
FROM paket, hotel, detail_paket_hotel
WHERE hotel.id_hotel = detail_paket_hotel.id_hotel
AND paket.id_paket = detail_paket_hotel.id_paket
AND paket.id_paket='$idpaket'
LIMIT 0 , 30;");
                        ?>
                            <p class="lead">
                                <table>
                                    <tr>
                                        <td><h2>Hotel</h2></td>
                                    </tr>
                                    <?php  while($cetakhotel=mysql_fetch_array($queryhotel)){?>
                                    <tr>
                                        <td><h3><?php echo $cetakhotel['nama_hotel']?></h3></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Alamat      :</h5></td>
                                        <td><h5><?php echo $cetakhotel['alamat']?></h5></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><img src="<?php echo $cetakhotel['gambar']; ?>" height="300" width="100" alt=""></td>
                                    </tr>
                                    <?php } ?>
                                    </table>
                            </p>
                    </li>
                </ul>
                            <hr>
                            <p>&nbsp;</p>
                        </div>
                    </div><!--/.blog-item-->
                </div>
            </div><!--/.col-md-8-->
        </div><!--/.row-->
    </section><!--/#blog-->
</body>
</html>