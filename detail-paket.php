<!DOCTYPE html>
<?php
include('../database/config.php');
$namapaket=$_GET['judul'];
$gambar=$_GET['gambar'];
$idpaket=$_GET['idpaket'];
?>
<html lang="en">
<body>
    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1><?php echo $namapaket;?></h1>
                </div>
            </div>
        </div>
    </section><!--/#title-->
    <section id="blog" class="container">
        <div class="row">
            <aside class="col-sm-4 col-sm-push-8">
                <div class="widget search">
                    <h2><?php echo $namapaket;?></h2>
                    <div class="form-group">
                    <?php if(isset($_SESSION['admin'])OR empty($_SESSION['user'])){}else{?>
                    <button class="btn btn-success btn-md btn-block" data-popup-target="#example-popup"><h1>Booking</h3></button>
                    <?php }?>
                    </div>
                </div> 
<div id="example-popup" class="popup">
    <div class="popup-body"><span class="popup-exit"></span>
 
        <div class="popup-content">
            <h2 class="popup-title">Konfirmasi Pemesanan</h2>
            <form role="form" action="index.php?halaman=terimapesanbaru" method='post' enctype="multipart/form-data">
                                    <div class="box-body">
                                       
                                            <?php
                                            $hari = date("Y-m-d");
                                            $tambah = mktime(0,0,0,date("m"),date("d")+3,date("Y"));
                                            $awal = date("Y-m-d", $tambah);

                                    $querypesan=mysql_query("SELECT * 
                                    FROM paket
                                    WHERE id_paket='$idpaket'");
                                       $cetakpesan=mysql_fetch_array($querypesan)
                                    ?>                                        
                                        <div class="form-group">
                                            <label for="Input">Nama Paket</label>
                                            <input type="text" class="form-control" value="<?php echo $cetakpesan['nama_paket'] ?>" name="namapaket" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Durasi</label>
                                            <input type="text" class="form-control" value="<?php echo $cetakpesan['durasi'] ?>" name="durasi" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Harga</label>
                                            <input type="text" class="form-control" value="<?php echo $cetakpesan['harga'] ?>" name="harga" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Tanggal</label></br>
                                            <input type="date" name="day" min="<?php echo $awal ?>" required>
                                        </div>
                                        <input type="hidden" class="form-control" value="<?php echo $_SESSION["userid"] ?>" name="iduser" readonly>
                                        <input type="hidden" class="form-control" value="<?php echo $cetakpesan["id_paket"] ?>" name="idpaket" readonly>
                                        <!--<div class="form-group">
                                            <label for="Input">Objek</label>
                                            <?php
                        $queryobjek1=mysql_query("SELECT * 
                        FROM paket, objek, detail_paket_objek
                        WHERE objek.id_objek = detail_paket_objek.id_objek
                        AND paket.id_paket = detail_paket_objek.id_paket
                                    AND paket.id_paket='$idpaket'
                                    LIMIT 0 , 30;");
                        while($cetakobjek1=mysql_fetch_array($queryobjek1)){
                                    ?>
                                            <input type="text" class="form-control" value"<?php echo $cetakobjek1['nama_objek']?>" readonly>
                                        <?php }?>
                                        </div>-->
                                        <div class="box-footer">
                                        <?php ?> 
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
        </div>
    </div>
</div>
<div class="popup-overlay"></div>
            </aside>        
            <div class="col-sm-8 col-sm-pull-4">
                <div class="blog">
                    <div class="blog-item">
                        <img class="img-responsive img-blog" src="<?php echo $gambar;?>" width="100%" alt="" />
                        <div class="blog-content">
                            <h3><?php echo $namapaket;?></h3>
                            <h5>Harga Mulai Rp.<?php echo $cetakpesan['harga']; ?>,- Pemberangkatan dari Solo dan Sekitarnya</br></h5>
                            <p>
                            <section id="portfolio" class="container">
        <ul class="portfolio-filter">
            <li><a class="btn btn-default active" href="#" data-filter="*">All</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".objek">Objek</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".hotel">Hotel</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".bus">Bus</a></li>
        </ul>
                <ul class="portfolio-items col-9">
                    <li class="portfolio-item objek">
                        <?php
                        $queryobjek=mysql_query("SELECT * 
FROM paket, objek, detail_paket_objek
WHERE objek.id_objek = detail_paket_objek.id_objek
AND paket.id_paket = detail_paket_objek.id_paket
AND paket.id_paket='$idpaket'
LIMIT 0 , 30;");
                        ?>
                            <p class="lead">
                                <table >
                                    <tr>
                                        <td><h2>Objek</h2></td>
                                    </tr>
                                    <?php  while($cetakobjek=mysql_fetch_array($queryobjek)){?>
                                    <tr>
                                        <td><h3><?php echo $cetakobjek['nama_objek']?></h3></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Alamat      :</h5></td>
                                        <td><h5><p><?php echo $cetakobjek['alamat_objek']?></p></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Deskripsi   :</h5></td>
                                        <td><h5><textarea type="textarea" class="form-control" placeholder="<?php echo $cetakobjek['deskripsi_objek']?>" disabled></textarea></h5></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><img src="<?php echo $cetakobjek['gambar']; ?>" height="300" width="100" alt=""></td>
                                    </tr>
                                    <?php } ?>
                                    </table>
                            </p>
                    </li>
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
                    <li class="portfolio-item bus">
                        <?php
                        $querybus=mysql_query("SELECT * 
FROM paket, bus, detail_paket_bus
WHERE bus.id_bus = detail_paket_bus.id_bus
AND paket.id_paket = detail_paket_bus.id_paket
AND paket.id_paket='$idpaket'
LIMIT 0 , 30;");
                        ?>
                            <p class="lead">
                                <table>
                                    <tr>
                                        <td><h2>Bus</h2></td>
                                    </tr>
                                    <?php  while($cetakbus=mysql_fetch_array($querybus)){?>
                                    <tr>
                                        <td><h3><?php echo $cetakbus['nama_bus']?></h3></td>
                                    </tr>
                                    <tr>
                                        <td><h2>Fasilitas</h2></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Jumlah Kursi      :</h5></td>
                                        <td><h5><?php echo $cetakbus['jumlah_kursi']?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>AC      :</h5></td>
                                        <td><h5><?php if($cetakbus['AC']>1){
                                                    echo "Tidak ada";}else{echo "ada";}?></h5></td>
                                    </tr>
                                     <tr>
                                        <td><h5>Toilet      :</h5></td>
                                        <td><h5><?php if($cetakbus['toilet']>1){
                                                    echo "Tidak ada";}else{echo "ada";}?></h5></td>
                                    </tr>
                                     <tr>
                                        <td><h5>Full Music      :</h5></td>
                                        <td><h5><?php if($cetakbus['full_music']>1){
                                                    echo "Tidak ada";}else{echo "ada";}?></h5></td>
                                    </tr>
                                     <tr>
                                        <td><h5>Charger      :</h5></td>
                                        <td><h5><?php if($cetakbus['charger']>1){
                                                    echo "Tidak ada";}else{echo "ada";}?></h5></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><img src="<?php echo $cetakbus['gambar']; ?>" height="300" width="100" alt=""></td>
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