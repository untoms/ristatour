<?php
    session_start();
    $namalengkap=$_POST['nama'];
    $alamat=$_POST['alamat'];
    $_SESSION["namalengkap"]=$namalengkap;
    $_SESSION["alamat"]=$alamat;
    error_reporting(0);
    include('database/config.php');
    include 'class-captcha.php';
    $captcha2 = new mathcaptcha();
           
//$password=md5($_POST['password']);
//$password_confirm=md5($_POST['password_confirm']);

$cek_query=mysql_query("select*from user where username='$_POST[username]'");
$cek_query_hasil=mysql_num_rows($cek_query);
//$data=mysql_fetch_array($cek_query);

$cek_query1=mysql_query("select*from user where email='$_POST[email]'");
$cek_query_hasil1=mysql_num_rows($cek_query1);
//$data1=mysql_fetch_array($cek_query1);

//CEK USERNAME
if(empty($_POST['username'])){
	header('location:registrasi.php');
	$_SESSION["empty_username"]="Username harus diisi";	
}

if (isset($_POST['username']) and $cek_query_hasil>0){
$_SESSION["errorreg"]="Registrasi Gagal";
$_SESSION["username_ganda"]=" Username ".$_POST['username']." sudah digunakan";
header('location:registrasi.php');
} else {
	$_SESSION["username_valid"]=$_POST['username'];
}

//CEK EMAIL
if (empty($_POST['email'])){
header('location:registrasi.php');
$_SESSION["empty_email"]=" email harus diisi";
}


if (isset($_POST['email']) and $cek_query_hasil1>0){
$_SESSION["errorreg"]=" Registrasi Gagal";
$_SESSION["email_ganda"]=" email ini sudah digunakan";
header('location:registrasi.php');
}
else if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9._-]+)+$/",$_POST['email'])) {
$_SESSION["success_email"]=" oke ".$_POST['email']." valid";
$_SESSION["email"]=$_POST['email'];
 } else {
header('location:registrasi.php');
$_SESSION["invalid_email"]=" email yang anda masukkan tidak valid";
}

//Cek nomor telepon 
if( $_POST['phone'] != "" ){
    if( !is_numeric($_POST['phone']) ){
        header('location:registrasi.php');
        $_SESSION["fail_phone"]=" Inputan harus angka";                
        }else{
//header('location:registrasi.php');
    $_SESSION["success_phone"]=$_POST['phone'];
    
    }
    
}else{
    header('location:registrasi.php');
    $_SESSION["empty_phone"]=" Nomor telepon tidak boleh kosong";
}

//Cek Password
if (empty($_POST['password'])){
	header('location:registrasi.php');
	$_SESSION["empty_pass"]=" Password tidak boleh kosong!";
}
else {
if(strlen($_POST['password'])<4){
	header('location:registrasi.php');
$_SESSION["pass_weak"]=$_POST['password'];
}
else if (ereg("^[[:punct:]]+[[:alnum:]]",$_POST['password']) || ereg("^[[:alnum:]]+[[:punct:]]",$_POST['password']) )
{
$_SESSION["pass_strong"]=$_POST['password'];
}
else if (ereg("^[[:alnum:]]",$_POST['password']))
{
$_SESSION["pass_medium"]=$_POST['password'];
}
}
//Konfirm password
if($_POST['password']!= ($_POST['password_confirm'])){

	header('location:registrasi.php');
	$_SESSION['incorect_password'];
}   

//    cek captcha
    if (empty($_POST['captcha2'])) {
        header('location:registrasi.php');
        $_SESSION["empty_captcha"]=" Harus diisi!";
        die();	
//        unset($_SESSION['kode']);
    }else if( !is_numeric($_POST['captcha2']) ){
        header('location:registrasi.php');
        $_SESSION["num_captcha"]=" Inputan harus angka!";   
        die();         
//        unset($_SESSION['kode']);
    }else if($_POST['cap'] != $_POST['captcha2']){ 
        header('location:registrasi.php');
        $_SESSION['fail_captcha']=" Hasil salah!"; 
        die();        
//        unset($_SESSION['kode']);
    } 

//Query
if (isset ($_SESSION['pass_medium']) or isset ($_SESSION['pass_strong'])){
$_SESSION['success_password']="au";}

if (isset($_SESSION['username_valid']) AND 
	isset ($_SESSION['success_email']) AND
	isset ($_SESSION['success_phone']) AND	
	isset ($_SESSION['success_password'])
	//isset ($_SESSION['corect'])	
	){
	// define variables and set to empty values
	$username=$email=$phone=$password="";
	$username=$_POST['username'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$password=md5($_POST['password']);
	$regis_query=mysql_query("INSERT INTO user (
            `username`,
            `nama_lengkap`,
            `alamat`,
            `phone`,
            `password`,
            `email`,
            `role_id`,
            `status`)
            VALUES (
            '$username',
                '$namalengkap',
                    '$alamat',
                        '$phone',
                            '$password',
                                '$email',
                                    '2',
                                    '1'
                                    )");
												
	if ($regis_query == FALSE){
		echo "Registrasi gagal ".(mysql_error())."</p>";
		header('location:log in.php');
            } else {
                header('location:index.php');
		$_SESSION['register_valid']="Registrasi sukses";
		session_destroy();	
            }
	}


/*$_SESSION["pass_lemah"]="$_POST[password]";
}
else if(preg_match("/^[[:punct:]]+[[:alnum:]]/",$password) || preg_match("/^[[:alnum:]]+[[:punct:]]/",$password) ){


$_SESSION["pass_kuat"]="$_POST[password]";
}
else if(preg_match("/^[[:alnum:]]/",$password) ){


$_SESSION["pass_sedang"]="$_POST[password]";
}*/



/*if($password==$password_confirm){
if ($cek_query_hasil==0 && $cek_query_hasil1==0)
{$regis_query=mysql_query("INSERT INTO user (`username`,`phone`,`password`,`email`,`role_id`) VALUES ('$username','$phone','$password','$email','2')");
header('location:index.php');
} 
else {
	session_start();
	$_SESSION["errorreg"]="Registrasi Gagal";
		header('location:registrasi.php');

}
}else{
	session_start();
	$_SESSION["errorpass"]="password konfirmasi tidak cocok";
		header('location:registrasi.php');
}*/
?>