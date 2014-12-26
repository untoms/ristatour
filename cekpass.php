<?php
error_reporting(0);
$input = $_GET['input']; //menangkap password yang diinput oleh user
$cek = $_GET['password']; //menangkap nilai apakah untuk input password atau konfirmasi
$pass = $_GET['pass']; //menangkap nilai dari form password yang diisi
if ( $cek == 1 ) //untuk melakukan pengecekan kekuatan password
{
	if(strlen($input)<4){
echo "Lemah";
session_start();
$_SESSION["pass_weak"]=" Password terlalu lemah";
}
else if (ereg("^[[:punct:]]+[[:alnum:]]",$input) || ereg("^[[:alnum:]]+[[:punct:]]",$input) )
{
echo "Kuat";
session_start();
$_SESSION["pass_strong"];
session_unset('pass_weak');
}
else if (ereg("^[[:alnum:]]",$input))
{
echo "Sedang";
session_start();
$_SESSION["pass_medium"];
session_unset('pass_weak');
}
}

else if ( $cek == 2 ) //untuk melakukan pengecekan konfirmasi password
{
if ($pass == $input) {echo "Cocok";
session_start();
$_SESSION["valid_cocok"];
session_unset('fail_cocok');}
else if ($pass != $input){echo "Tidak Cocok";
session_start();
$_SESSION["fail_cocok"]="Password konfirmasi salah";
session_unset("valid_cocok");}
}
?>