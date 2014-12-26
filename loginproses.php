<?php
include('database/config.php');
$username=$_POST['username'];
$password=md5($_POST['password']);

$login_query=mysql_query("select*from user where username='$username' and password='$password' and status='1'");
$hasil_query=mysql_num_rows($login_query);
$data=mysql_fetch_array($login_query);

if($hasil_query>0){
	
	session_start();
	$_SESSION["user_id"]=$data[user_id];
	$_SESSION["username"]=$data[username];
	$_SESSION["password"]=$data[password];
	$_SESSION["akses"]=$data[role_id];
	
	if ($_SESSION["akses"]<2){$_SESSION["admin"]=$data[username]; header('location:/flat/admin/index.php');} else{$_SESSION["user"]=$data[username];$_SESSION["userid"]=$data[user_id];
	header('location:index.php');}
} else {
	session_start();
	$_SESSION["errorlogin"]="Kombinasi username dan password salah";
		header('location:log in.php');
}
?>