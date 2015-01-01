<?php
session_start();
//error_reporting(0);
include('header.php');
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
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.jpg">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script type="text/javascript" src="js/keyboard.js" charset="UTF-8"></script>
    <link rel="stylesheet" type="text/css" href="css/keyboard.css">
</head>
<script language="JavaScript">
var ajaxRequest;
//mengecek apakah web browser support AJAX atau tidak
function getAjax() {
    try{// Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
    }
    catch (e){// Internet Explorer Browsers
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");       
        }catch (e){
            try{
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }catch (e){// Something went wrong
                alert("Your browser broke!");
                return false;
            }
        }
    }
}
//fungsi untuk mengambil nilai setiap huruf yang dimasukkan
function validasi (keyEvent,pilihan) {
    keyEvent = (keyEvent)?keyEvent: window.event;
    input = (keyEvent.target)?keyEvent.target: keyEvent.srcElement;
    //jika input dimasukkan, masuk ke fungsi cekEmail
    if (input.value){
        if (pilihan == 1) {
            cekPass("cekpass.php?password=1&input=" + input.value,1); //mengirim inputan ke file cekpass.php
        }else if (pilihan == 2){
            pass = document.getElementById("pass").value; //mengambil nilai dari form password yangtelah dicek
            cekPass("cekpass.php?password=2&pass=" + pass + "&input=" + input.value,2); //mengirim inputan konfirmasi password
        }
    }
}
//fungsi untuk menampilkan hasil pengecekan
function cekPass(fileCek,keterangan) {
    getAjax();
    ajaxRequest.open("GET",fileCek);
    ajaxRequest.onreadystatechange = function(){
        if (keterangan == 1){
            document.getElementById("hasil").innerHTML = ajaxRequest.responseText; //hasil cek kekuatan password
        }else if (keterangan == 2){
            document.getElementById("cocok").innerHTML = ajaxRequest.responseText; //hasil cek konfirmasi password
        }
    }
    ajaxRequest.send(null);
}
</script>
<body>
<?php
    error_reporting(0);
    include('header.php');
    include 'class-captcha.php';
    
    $captcha2 = new mathcaptcha();
    $captcha2->generatekode();
?>    
    <section id="registration" class="container">
        <form class="center" role="form" method='post' action="registrasiproses.php">
            <h1>Registrasi</h1>
            <h4>Silahkan isi data diri anda dengan benar.</h4>
            <fieldset class="registration-form">
                <div class="form-group">
                    <?php if (isset($_SESSION['errorreg'])){ 
                        echo $_SESSION['errorreg'];                        
                        }
                    ?></br>
                    <input type="text" id="username" name="username" placeholder="Username" class="form-control" value="<?php if (isset($_SESSION['username_valid'])){ echo $_SESSION['username_valid'];}?>">
                    <?php if (isset($_SESSION['username_ganda'])){
                        ?> <i class="icon-remove"></i><?php echo $_SESSION['username_ganda'];                        
                            } else if (isset($_SESSION['empty_username'])){
                            ?> <i class="icon-remove"></i><?php echo $_SESSION['empty_username'];                            
                            } else if (isset($_SESSION['username_valid'])){
                                ?> <i class="icon-ok"></i> username <?php echo  $_SESSION['username_valid'];
                                ?> tersedia<?php } ?>
                </div>
                <div class="form-group">
                    <input type="text" id="email" name="email" placeholder="E-mail" class="form-control" value="<?php if (isset($_SESSION['email'])){ echo $_SESSION['email'];}?>">
                    <?php if (isset($_SESSION['empty_email'])){ ?> <i class="icon-remove"></i><?php echo $_SESSION['empty_email'];}
                     else if (isset($_SESSION['invalid_email'])){ ?> <i class="icon-remove"></i><?php echo $_SESSION['invalid_email'];}
                     else if (isset($_SESSION['email_ganda'])){ ?> <i class="icon-remove"></i><?php echo $_SESSION['email_ganda'];}
                     else if (isset($_SESSION['success_email'])){ ?> <i class="icon-ok"></i> E-mail <?php echo $_SESSION['success_email'];}?>
                </div>
                <div class="form-group">
                    <input type="text" id="nama" name="nama" placeholder="nama lengkap" class="form-control" value="<?php if (isset($_SESSION['success_phone'])){ echo $_SESSION['namalengkap'];}?>">
                    <?php if (isset($_SESSION['empty_phone'])){ ?> <i class="icon-remove"></i><?php  echo $_SESSION['namalengkap'];}
                    else if (isset($_SESSION['fail_phone'])) { ?> <i class="icon-remove"></i><?php echo $_SESSION['namalengkap'];}?>
                </div>
                <div class="form-group">
                    <input type="text" id="alamat" name="alamat" placeholder="alamat lengkap" class="form-control" value="<?php if (isset($_SESSION['success_phone'])){ echo $_SESSION['alamat'];}?>">
                    <?php if (isset($_SESSION['empty_phone'])){ ?> <i class="icon-remove"></i><?php  echo $_SESSION['alamat'];}
                    else if (isset($_SESSION['fail_phone'])) { ?> <i class="icon-remove"></i><?php echo $_SESSION['alamat'];}?>
                </div>
                <div class="form-group">
                    <input type="text" id="phone" name="phone" placeholder="phone" class="form-control" value="<?php if (isset($_SESSION['success_phone'])){ echo $_SESSION['success_phone'];}?>">
                    <?php if (isset($_SESSION['empty_phone'])){ ?> <i class="icon-remove"></i><?php  echo $_SESSION['empty_phone'];}
                    else if (isset($_SESSION['fail_phone'])) { ?> <i class="icon-remove"></i><?php echo $_SESSION['fail_phone'];}?>
                </div>
                <div class="form-group">
                    <input type="password" id="pass" name="password" onkeyup="validasi(event,1)" 
                    value="<?php if (isset($_SESSION['pass_weak'])){echo $_SESSION['pass_weak'];}
                                else if (isset($_SESSION['pass_medium'])){echo $_SESSION['pass_medium'];}
                                else if (isset($_SESSION['pass_strong'])){echo $_SESSION['pass_strong'];}
                    ?>"
                    placeholder="Password" class="keyboardInputCenter"><div id="hasil"></div>
                <?php if (isset($_SESSION['empty_pass'])){
                    ?> <i class="icon-remove"></i><?php echo $_SESSION['empty_pass'];                    
                    } else if (isset($_SESSION['pass_weak'])){
                        ?> <i class="icon-remove"></i>password lemah <?php                         
                    } else if (isset($_SESSION['pass_medium'])){ 
                        ?> <i class="icon-remove"></i>password medium <?php
                    } else if (isset($_SESSION['pass_strong'])){ 
                        ?> <i class="icon-remove"></i>password setrong <?php                         
                    } ?>
                    </div>
                <div class="form-group">
                    <input type="password" id="password_confirm" name="password_confirm" 
                           onkeyup="validasi(event,2)" placeholder="Password (Confirm)"
                           class="keyboardInputCenter"
                    ><div id="cocok"></div>
                    <?php 
                    if (isset($_SESSION['errorpass'])){ 
                        ?> <i class="icon-remove"></i>
                            <?php echo $_SESSION['errorpass'];
                        } else if (isset($_SESSION['fail_cocok'])){ 
                                ?> <i class="icon-remove"></i>
                                    <?php echo $_SESSION['fail_cocok'];
                        }?>
                </div> 
                <?php $captcha2->showcaptcha(); ?>
                <div class="form-group">
                    <input type="hidden" name="cap" value="<?php echo $captcha2->resultcaptcha(); ?>">
                    <input type="text" id="captcha" name="captcha2" placeholder="Result"
                           class="form-control" 
                    >
                    <?php 
                        if (isset($_SESSION['empty_captcha'])){                        
                    ?> <i class="icon-remove"></i>
                    <?php  
                        echo $_SESSION['empty_captcha'];   
                        }else if (isset($_SESSION['num_captcha'])) {
                    ?> <i class="icon-remove"></i>
                    <?php
                        echo $_SESSION['num_captcha'];
                        }else if(isset($_SESSION['fail_captcha'])){
                    ?> <i class="icon-remove"></i>
                    <?php                             
                        echo $_SESSION['fail_captcha']; 
                        }
                    ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-success btn-md btn-block" type="submit">Register
                    </button>
                </div>
            </fieldset>
        </form>
    </section>
    </body>
</html>
<?php session_unset('username_ganda');?>