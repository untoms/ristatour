<?php
$db_username = 'root';
	$db_password = '';
	$db_name = 'kmm';
	$db_host = 'localhost';
	
    require_once("class.phpmailer.php");
    $sendmail = new PHPMailer();
    $sendmail->setFrom('yoxgii@gmail.com','User'); //email pengirim
    $sendmail->addReplyTo('yoxgii@gmail.com','User'); //email replay
    $sendmail->addAddress('bustomiraharjo@gmail.com','pelanggan'); //email tujuan
    $sendmail->Subject = 'Terimakasih telah menggunaka jasa tour kami!'; //subjek email
    $sendmail->Body='<h2>Thanks you.</h2><p>Terimakasih telah membayar kami ya!</p>
    <table><tr><td>Tabel</td></tr></table>'; //isi pesan
    $sendmail->isHTML(true);
    if(!$sendmail->Send())
    {
      echo "Email gagal dikirim : " . $sendmail->ErrorInfo; 
    }
    else
    {
      echo "Email berhasil terkirim!"; 
    }
?>