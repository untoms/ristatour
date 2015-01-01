<?php
session_start();
error_reporting(0); 
$halaman=$_GET['halaman'];
include('../database/config.php');
    if (!isset($_SESSION['username']) and !isset ($_SESSION['password'])) {
        $_SESSION["errorlogin"]="Anda harus login dahulu.";
        header('location:../log in.php');        
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
       <link href="../css/modals.css" rel="stylesheet">
        <link href="../css/prettyPhoto.css" rel="stylesheet">
         <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
         <link href="select2-3.5.2/select2.css" rel="stylesheet"/>
        <link rel="shortcut icon" href="../images/ico/favicon.jpg">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <!--Index Css Flat user-->
    
    </head>
    <body class="skin-blue">
        <?php
           include('sidebar.php');
           include('header.php');
           if(!isset($_GET['halaman'])){
            include('anggota.php');
            }
            else if ($halaman=='anggota'){
            include('anggota.php');              
            }
            else if ($halaman=='paket'){
            include('paketadmin.php');
            }
            else if ($halaman=='objek'){
            include('objekadmin.php');
            }
            else if ($halaman=='penginapan'){
            include('hoteladmin.php');
            }
            else if ($halaman=='bus'){
            include('busadmin.php');
            }
            else if ($halaman=='pemesanan'){
            include('pemesanan.php');
            }
            else if ($halaman=='calendar'){
            include('calendar.php');
            }
            else if ($halaman=='edit'){
            include('edituser.php');
            }
            else if ($halaman=='terimaedituser'){
            include('terimaedituser.php');
            }
            else if ($halaman=='hapus') {
            include('hapususer.php');
            }
            else if ($halaman=='terimahapususer'){
            include('terimahapususer.php');
            }
            else if ($halaman=='terimahotelbaru'){
            include('terimahotelbaru.php');
            }
            else if($halaman=='terimabusbaru'){
            include('terimabusbaru.php');
            }
            else if($halaman=='editbus'){
            include('editbus.php');
            }
            else if($halaman=='terimaeditbus'){
            include('terimaeditbus.php');
            }
            else if($halaman=='hapusbus'){
            include('hapusbus.php');
            }
            else if($halaman=='terimahapusbus'){
            include('terimahapusbus.php');
            }
            else if($halaman=='edithotel'){
            include('edithotel.php');
            }
            else if($halaman=='terimaedithotel'){
            include('terimaedithotel.php');
            }
            else if($halaman=='hapushotel'){
            include('hapushotel.php');
            }
            else if($halaman=='terimahapushotel'){
            include('terimahapushotel.php');
            }
            else if($halaman=='editobjek'){
            include('editobjek.php');
            }
            else if($halaman=='hapusobjek'){
            include('hapusobjek.php');
            }
            else if($halaman=='terimaobjekbaru'){
            include('terimaobjekbaru.php');
            }
            else if($halaman=='terimaeditobjek'){
            include('terimaeditobjek.php');
            }
            else if($halaman=='terimahapusobjek'){
            include('terimahapusobjek.php');
            }
            else if($halaman=='lihatresi'){
            include('lihatresi.php');
            }
            else if($halaman=='terimakonfirmasiresi'){
            include('terimaresi.php');
            }
            else if($halaman=='okeoke'){
            include('pemesanan.php');
            }
            else if($halaman=='paketnext'){
            include('paket-next.php');
            }
            else if($halaman=='next1'){
            include ('paket-next1.php');
            }
            else if($halaman=='next2'){
            include ('paket-next2.php');
            }
            else if($halaman=='terimapaketbaru'){
            include('terimapaketbaru.php');
            }
            else if($halaman=='editpaket'){
            include('editpaket.php');
            }
            else if($halaman=='terimaeditpaket'){
            include('terimaeditpaket.php');
            }
            else if($halaman=='hapuspaket'){
            include('hapuspaket.php');
            }
            else if($halaman=='terimahapuspaket'){
            include('terimahapuspaket.php');
            }
           ?> 
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <!-- Right side column. Contains the navbar and content of the page -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


        <!-- jQuery 2.0.2 -->
        <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>     
        
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- Js from index flat user-->
    <!--<script src="js/jquery1.js"></script>-->
    <!--<script src="js/bootstrap1.min.js"></script>-->
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/jquery.isotope.min.js"></script>
    <script src="../js/main.js"></script>
    </body>
</html>