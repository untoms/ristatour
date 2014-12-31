 <?php 
    error_reporting(0);

    include('database/config.php');
    session_start();
    if (isset($_SESSION['username']) and isset ($_SESSION['password'])) {
        header('location:index.php');
        
        }
    include('header.php');
 // memanggil script class
    include 'class-captcha.php';
    // membuat obyek class
    $captcha1 = new mathcaptcha();
    // panggil method untuk mengenerate kode
    $captcha1->generatekode();
    
    if (isset($_GET['a'])){
        $_IP_SERVER = $_SERVER['SERVER_ADDR'];
        $_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];
        
        if($_IP_ADDRESS == $_IP_SERVER) {
            ob_start();
            system('ipconfig /all');
            $_PERINTAH  = ob_get_contents();
            ob_clean();
            $_PECAH = strpos($_PERINTAH, "Physical");
            $_HASIL = substr($_PERINTAH,($_PECAH+36),17);
//            echo "IP Anda1 : ".$_IP_ADDRESS."
//        MAC ADDRESS Anda1 : ".$_HASIL;
//$queries=mysql_query("delete from log_ip where mac_address='$_HASIL' and IP_ADDRESS='$_IP_ADDRESS'");
            $queries=mysql_query("delete from log_ip where mac_address='$_HASIL' ");
            
            } else {
                
                $_PERINTAH = "arp -a $_IP_ADDRESS";
                ob_start();
                system($_PERINTAH);
                $_HASIL = ob_get_contents();
		ob_clean();
                $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
                $_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
                $_HASIL = substr($_PECAH_STRING[1], 0, 17);
//                echo "IP Anda : ".$_IP_ADDRESS."
//                MAC ADDRESS Anda : ".$_HASIL;
	//$queries=mysql_query("delete from log_ip where mac_address='$_HASIL' and IP_ADDRESS='$_IP_ADDRESS'");
                $queries=mysql_query("delete from log_ip where mac_address='$_HASIL' ");
	}
        
    }
    
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
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
    <script>
        function runScript(e) {
           if (e.keyCode == 34) {
                        return false
            }else if (e.keyCode == 61){
                        return false
                }else if (e.keyCode == 35){
                return false}
                else if (e.keyCode == 39){
                return false}
                else
                {
                        return true;
                }
        }
    </script>
<body>     

    <section id="registration" class="container">

        <form class="center" method='post' action="loginproses.php">
            <fieldset class="registration-form">
                <h3>LOGIN</h3>
                <div class="form-group">
                    <?php if (isset($_SESSION['errorlogin'])){ echo $_SESSION['errorlogin'];}?></br>
                    <input type="text" id="email" name="username" placeholder="Username"
                           class="form-control" onkeypress="return runScript(event) ">
                </div>
                <div class="form-group">
                    <input type="password" id="password" name="password" placeholder="Password"
                           class="form-control">
                </div>
                <?php // menampilkan kode captcha berisi soal matematika
                   $captcha1->showcaptcha(); ?>
                <div class="form-group">
                    <input type="text" id="captcha" name="captcha" placeholder="Result"
                           class="form-control" >
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-md btn-block" type="submit">Login</button>
                </div>
            </fieldset>
        </form>
    </section>
    </body>
</html>