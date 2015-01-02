<?php
//    error_reporting(E_ALL);
//    include 'kripto.php';
//    $crypt = new kriptograpi();
//    echo '<br/>';
//    echo 'Hasil : '.$crypt->encryptDecrypt("eskade", "dpi5qGhG6MiNAJwTYToagEhoPcZB+P8F7D+vzMhShKM=",true);
    echo hash_hmac_file("md5", "images/resi/10.jpg", "secret");
?>
