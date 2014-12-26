<!DOCTYPE html>

<html lang="en">
<body>

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Paket Tour</h1>
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
    <section id='portfolio' class='container'>
           
        <ul class="portfolio-items col-3">
            <?php
            $querypaket=mysql_query("SELECT * 
            FROM paket
            WHERE status=1
            LIMIT 0 , 30;
            ");
while($cetakpaket=mysql_fetch_array($querypaket)){
   ?>
            <li class="portfolio-item <?php echo $cetakpaket['wilayah'];?>">
                <div class="item-inner">
                    <a href="index.php?halaman=tour&judul=<?php echo $cetakpaket['nama_paket'];?>
                        &gambar=<?php echo $cetakpaket['gambar'];?>&idpaket=<?php echo $cetakpaket['id_paket'];?>"><img src="<?php echo $cetakpaket['gambar']; ?>" height="230" alt=""></a>
                    <h5><?php echo $cetakpaket['nama_paket'];?></h5>
                    Harga awal Rp.<?php echo $cetakpaket['harga'];?>,- untuk <?php echo $cetakpaket['durasi'];?> hari
                    <a href="index.php?halaman=tour&judul=<?php echo $cetakpaket['nama_paket'];?>
                        &gambar=<?php echo $cetakpaket['gambar'];?>">          
                </div>           
            </li><!--/.portfolio-item-->
            <?php } ?>
        </ul>
    </section><!--/#portfolio-->
</body>
</html>
