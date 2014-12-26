<!DOCTYPE html>
<html lang="en">
<body>
    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Objek Pariwisata</h1>
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
FROM objek, kota, provinsi
WHERE objek.wilayah = kota.id
AND kota.prov_id = provinsi.id
LIMIT 0 , 30;
");
while($cetakobjek=mysql_fetch_array($queryhotel)){
   ?>
            <li class="portfolio-item <?php echo $cetakobjek['prov_id'];?>">
                <div class="item-inner">
                    <a href="index.php?halaman=tour"><img src='<?php echo $cetakobjek['gambar']; ?>' height="230" alt=""></a>
                    <h5><?php echo $cetakobjek['nama_objek'];?></h5>
                    <a href="index.php?halaman=tour">          
                </div>           
            </li><!--/.portfolio-item-->
            <?php
}
?>
        </ul>
    </section><!--/#portfolio-->
</body>
</html>
