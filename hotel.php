<!DOCTYPE html>
<html lang="en">
<body>
    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Hotel</h1>
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
    <section id="portfolio" class="container">
        <ul class="portfolio-filter">
            <li><a class="btn btn-default active" href="#" data-filter="*">All</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".31">DKI Jakarta</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".32">Jawa Barat</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".33">Jawa Tengah</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".34">DIY</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".35">Jawa Timur</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".36">Banten</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".51">Bali</a></li>
            <li><a class="btn btn-default" href="#" data-filter=".52">NTB</a></li>
        </ul><!--/#portfolio-filter-->
        <ul class="portfolio-items bootstrap">

    <section id='portfolio' class='container'>
           
        <ul class="portfolio-items col-3">
            <?php
$queryhotel=mysql_query("SELECT * 
FROM hotel, kota, provinsi
WHERE hotel.wilayah = kota.id
AND kota.prov_id = provinsi.id
LIMIT 0 , 30;
");
while($cetakhotel=mysql_fetch_array($queryhotel)){
   ?>
            <li class="portfolio-item <?php echo $cetakhotel['prov_id'];?>">
                <div class="item-inner">
                    <a href="index.php?halaman=hoteldetail&judul=<?php echo $cetakhotel['nama_hotel'];?>
                        &gambar=<?php echo $cetakhotel['gambar'];?>&idhotel=<?php echo $cetakhotel['id_hotel'];?>">
                        <img src='<?php echo $cetakhotel['gambar']; ?>' height="230" alt=""></a>
                    <h5><?php echo $cetakhotel['nama_hotel'];?></h5>
                    <a href="index.php?halaman=hoteldetail">          
                </div>           
            </li><!--/.portfolio-item-->
            <?php
}
?>
        </ul>
    </section><!--/#portfolio-->
</body>
</html>
