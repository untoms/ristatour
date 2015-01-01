<?php
session_start();
//include('set.php');
error_reporting(0);
$halaman=$_GET['halaman'];
include('database/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | Rista Tour and Travel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/modals.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->
<body>
    <!--/header-->
    <?php
    include('header.php');
    if(!isset($_GET['halaman'])){
        include('slider.php');
        include('menu-bus.php');
    }else if($halaman=='tour'){
        include('detail-paket.php');
    }
    else if($halaman=='hotel'){
    include('hotel.php');
    }
    else if($halaman=='paket'){
    include('paket.php');
    }
    else if($halaman=='login'){
    include('login.php');
    }
     else if($halaman=='proseslogin'){
    include('loginproses.php');
    }
    else if($halaman=='objek'){
    include('objek.php');
    }
    else if($halaman=='cart'){
    include('cart.php');
    }
    else if($halaman=='uploadresi'){
    include('terimauploadresi.php');
    }
    else if($halaman=='upload'){
    include('uploadresi.php');
    }
    else if($halaman=='lihatresi'){
    include('lihatresi.php');
    }
    else if($halaman=='terimapesanbaru'){
    include ('terimapesanbaru.php');
    }
    else if($halaman=='hoteldetail'){
    include('detailhotel.php');    
    }
    else if($halaman=='cetakbukti'){
    include('form.php');
    }
    else if($halaman=='topdf'){
    include ('topdf.php');
    }
    ?>
    <section id="bottom" class="wet-asphalt">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <h4>About Us</h4>
                    <p>Travel Rista Tour Travel Terbaik</p>
                    <p>Melayani pemesanan paket pariwisata</p>
                    <p>Untuk kawasan Jawa, Bali dan Lombok</p>
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>Latest Packet</h4>
                    <div>
                        <?php 
                        $paketqry=mysql_query("SELECT * FROM paket LIMIT 0,3");
                        while($cetakpkt=mysql_fetch_array($paketqry)){
                        ?>
                        <div class="media">
                            <div class="pull-left">
                                <img src="<?php echo $cetakpkt['gambar']?>" width="50" height="50"alt="">
                            </div>
                            <div class="media-body">
                                <span class="media-heading"><a href="index.php?halaman=tour&judul=<?php echo $cetakpkt['nama_paket'];?>
                        &gambar=<?php echo $cetakpkt['gambar'];?>&idpaket=<?php echo $cetakpkt['id_paket'];?>"><?php echo $cetakpkt['nama_paket'];?></a></span>
                            </div>
                        </div>
                        <?php } ?>
                    </div>  
                </div><!--/.col-md-3-->

                <div class="col-md-3 col-sm-6">
                    <h4>Address</h4>
                    <address>
                        <strong>Klaten</strong><br>
                        Mlese, Klaten<br>
                        Jawa Tengah<br>
                        <abbr title="Phone">Phone:</abbr> (0271) 456-7890
                    </address>
                </div> <!--/.col-md-3-->
            </div>
        </div>
    </section><!--/#bottom-->

    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2013 <a target="_blank" href="http://shapebootstrap.net/" title="Free Twitter Bootstrap WordPress Themes and HTML templates">ShapeBootstrap</a>. All Rights Reserved.
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/modals.js"></script>
</body>
</html>