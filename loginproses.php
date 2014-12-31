<?php
    error_reporting(0);
    include('database/config.php');
    include 'class-captcha.php';
        // membuat obyek class
    $captcha1 = new mathcaptcha();
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $_IP_SERVER = $_SERVER['SERVER_ADDR'];
    $_IP_ADDRESS = $_SERVER['REMOTE_ADDR']; 

    if($captcha1->resultcaptcha() == $_POST['captcha']){

        $login_query=sprintf("select*from user where status='1' and username='%s'"
                ,mysql_real_escape_string($username) );
        $ceklogin=mysql_query($login_query);
        $data=mysql_fetch_array($ceklogin);
        
        if($_IP_ADDRESS == $_IP_SERVER){
            
            ob_start();
            system('ipconfig /all');
            $_PERINTAH  = ob_get_contents();
            ob_clean();
            $_PECAH = strpos($_PERINTAH, "Physical");
            $_HASIL = substr($_PERINTAH,($_PECAH+36),17);
            
            } else {
                
            $_PERINTAH = "arp -a $_IP_ADDRESS";
            ob_start();
            system($_PERINTAH);
            $_HASIL = ob_get_contents();
            ob_clean();
            $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
            $_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
            $_HASIL = substr($_PECAH_STRING[1], 0, 17);

	}
        
        $ceklogin1=mysql_query("SELECT count(*) as total FROM log_ip where mac_address='$_HASIL' ");
        $jml_log=mysql_fetch_assoc($ceklogin1);
        
        if ($jml_log['total'] <= 2){
            
            if (isset($_POST['username'])){
                if ($password === $data['password']){
                    
                    $_IP_SERVER = $_SERVER['SERVER_ADDR'];
                    $_IP_ADDRESS = $_SERVER['REMOTE_ADDR']; 
                    
                    if($_IP_ADDRESS == $_IP_SERVER){
                        ob_start();
                        system('ipconfig /all');
                        $_PERINTAH  = ob_get_contents();
                        ob_clean();
                        $_PECAH = strpos($_PERINTAH, "Physical");
                        $_HASIL = substr($_PERINTAH,($_PECAH+36),17);
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
                        $queries=mysql_query("delete from log_ip where mac_address='$_HASIL' ");
                    }
                    
                    session_start();
                    $_SESSION["user_id"]=$data[user_id];
                    $_SESSION["username"]=$data[username];
                    $_SESSION["password"]=$data[password];
                    $_SESSION["akses"]=$data[role_id];

                    if ($_SESSION["akses"]<2){
                        $_SESSION["admin"]=$data[username];
                        header('location:/ristatour/admin/index.php');                
                    } else{
                        $_SESSION["user"]=$data[username];
                        $_SESSION["userid"]=$data[user_id];
                        header('location:index.php');                
                    }   
                    
                }else {

                    $_IP_SERVER = $_SERVER['SERVER_ADDR'];
                    $_IP_ADDRESS = $_SERVER['REMOTE_ADDR']; 
                    
                    if($_IP_ADDRESS == $_IP_SERVER)  {
                        ob_start();
                        system('ipconfig /all');
                        $_PERINTAH  = ob_get_contents();
                        ob_clean();
                        $_PECAH = strpos($_PERINTAH, "Physical");
                        $_HASIL = substr($_PERINTAH,($_PECAH+36),17);
                        $queries=mysql_query("insert into log_ip values('$_HASIL','$_IP_ADDRESS',now())");

                    } else {
                        
			$_PERINTAH = "arp -a $_IP_ADDRESS";
                        ob_start();
                        system($_PERINTAH);
                        $_HASIL = ob_get_contents();
                                ob_clean();
                        $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
                        $_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
                        $_HASIL = substr($_PECAH_STRING[1], 0, 17);
                        $queries=mysql_query("insert into log_ip values('$_HASIL','$_IP_ADDRESS',now())");
                    }
                    session_start();
                    $_SESSION["errorlogin"]="Kombinasi username dan password salah";
                    header('location:log in.php');                        
                }        
            }
            
        }else {
            echo 'tunggu selama 10 detik hingga redirect ke halaman login...';
            echo '<meta http-equiv="refresh" content="10;log in.php?a=1"></meta>';
//            $tunggu=time()+10;
//            $salah="salah";
//            setcookie('masuk', $salah, $tunggu,'/');
//            $_SESSION["errorlogin"]="Tunggu selama ".$tunggu;
//            header('location:log in.php');
			
        }        

    }else {
        session_start();
        $_SESSION["errorlogin"]="Captcha salah";
        header('location:log in.php');

    }

?>