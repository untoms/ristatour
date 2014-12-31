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
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
                </div>
            </div>
        </div>
    </section><!--/#title-->
    <section id="blog" class="container">
        <div class="row">
            <aside class="col-sm-4 col-sm-push-8">
                <div class="widget search">
                    <form role="form">
                        <div class="input-group">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-danger" type="button"><i class="icon-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <h2><?php echo $namahotel;?></h2>
                    <div class="form-group">
                    <button class="btn btn-success btn-md btn-block" data-popup-target="#example-popup"><h1>Booking</h3></button>
                    </div>
                </div> 
    <div class="popup-overlay"></div>
                <!--/.search-->
                <div class="widget ads">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#"><img class="img-responsive img-rounded" src="images/ads/ad1.png" alt=""></a>
                        </div>

                        <div class="col-xs-6">
                            <a href="#"><img class="img-responsive img-rounded" src="images/ads/ad2.png" alt=""></a>
                        </div>
                    </div>
                    <p> </p>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="#"><img class="img-responsive img-rounded" src="images/ads/ad3.png" alt=""></a>
                        </div>

                        <div class="col-xs-6">
                            <a href="#"><img class="img-responsive img-rounded" src="images/ads/ad4.png" alt=""></a>
                        </div>
                    </div>
                </div><!--/.ads-->     

                <div class="widget categories">
                    <h3>Blog Categories</h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="arrow">
                                <li><a href="#">Development</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Updates</a></li>
                                <li><a href="#">Tutorial</a></li>
                                <li><a href="#">News</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="arrow">
                                <li><a href="#">Joomla</a></li>
                                <li><a href="#">Wordpress</a></li>
                                <li><a href="#">Drupal</a></li>
                                <li><a href="#">Magento</a></li>
                                <li><a href="#">Bootstrap</a></li>
                            </ul>
                        </div>
                    </div>                     
                </div><!--/.categories-->
                <div class="widget tags">
                    <h3>Tag Cloud</h3>
                    <ul class="tag-cloud">
                        <li><a class="btn btn-xs btn-primary" href="#">CSS3</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">HTML5</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">WordPress</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Joomla</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Drupal</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Bootstrap</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">jQuery</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Tutorial</a></li>
                        <li><a class="btn btn-xs btn-primary" href="#">Update</a></li>
                    </ul>
                </div><!--/.tags-->

                <div class="widget facebook-fanpage">
                    <h3>Facebook Fanpage</h3>
                    <div class="widget-content">
                        <div class="fb-like-box" data-href="https://www.facebook.com/shapebootstrap" data-width="292" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                    </div>
                </div>
            </aside>        
            <div class="col-sm-8 col-sm-pull-4">
                <div class="blog">
                    <div class="blog-item">
                        <img class="img-responsive img-blog" src="<?php echo $gambar;?>" width="100%" alt="" />
                        <div class="blog-content">
                            <h3><?php echo $namahotel;?></h3>
                            <div class="entry-meta">
                                <span><i class="icon-user"></i> <a href="#">John</a></span>
                                <span><i class="icon-folder-close"></i> <a href="#">Bootstrap</a></span>
                                <span><i class="icon-calendar"></i> Sept 16th, 2012</span>
                                <span><i class="icon-comment"></i> <a href="blog-item.html#comments">3 Comments</a></span>
                            </div>
                            <section id="portfolio" class="container">
                <ul class="portfolio-items col-9">
                    <li class="portfolio-item objek">
                        <?php
                        $queryhotel=mysql_query("SELECT * 
                        FROM hotel, kota, provinsi
                        WHERE hotel.wilayah = kota.id
                        AND kota.prov_id = provinsi.id
                        AND id_hotel =$idhotel");
                        ?>
                            <p class="lead">
                                <table>
                                    <tr>
                                        <td><h2>Data Hotel</h2></td>
                                    </tr>
                                    <?php  $cetakhotel=mysql_fetch_array($queryhotel)?>
                                    <tr>
                                        <td><h3><?php echo $cetakhotel['nama_hotel']?></h3></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Alamat      :</h5></td>
                                        <td><h5><?php echo $cetakhotel['alamat']?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Lokasi   :</h5></td>
                                        <td><h5><?php echo $cetakhotel['city']?></h5></td>
                                    </tr>
                                    <tr>
                                        <td><h5>Provinsi   :</h5></td>
                                        <td><h5><?php echo $cetakhotel['province']?></h5></td>
                                    </tr>
                                    </table>
                            </p>
                    </li>
                    <li class="portfolio-item disclaimer">
                            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis</p>
                    </li>
                </ul>
                            <hr>

                            <div class="tags">
                                <i class="icon-tags"></i> Tags <a class="btn btn-xs btn-primary" href="#">CSS3</a> <a class="btn btn-xs btn-primary" href="#">HTML5</a> <a class="btn btn-xs btn-primary" href="#">WordPress</a> <a class="btn btn-xs btn-primary" href="#">Joomla</a>
                            </div>

                            <p>&nbsp;</p>
                        </div>
                    </div><!--/.blog-item-->
                </div>
            </div><!--/.col-md-8-->
        </div><!--/.row-->
    </section><!--/#blog-->
</body>
</html>