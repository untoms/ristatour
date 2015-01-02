<?php
include 'kripto.php';
    $crypt = new kriptograpi();
$id = $crypt->encryptDecrypt('eskade',$_POST['idpesan'],false);
$nama = $crypt->encryptDecrypt('eskade',$_POST['username'],false);
$namapaket = $crypt->encryptDecrypt('eskade',$_POST['namapaket'],false);
$harga = $crypt->encryptDecrypt('eskade',$_POST['hargapaket'],false);
$tanggal = $crypt->encryptDecrypt('eskade',$_POST['tanggal_mulai'],false);

require_once("dompdf/dompdf_config.inc.php");

$gabung =$id.$nama.$namapaket.$harga.$tanggal;

$html =
  '<html><body>'.
  '<h1>BUKTI PEMBAYARAN PAKET</h1>'.
  '<table>'.
  '<tr>'.
  '<td>Id Pemesanan</td>'.
  '<td>:</td>'.
  '<td>'.$id.'</td>'.
  '</tr>'.
  '<tr>'.
  '<td>Nama Pemesan</td>'.
  '<td>:</td>'.
  '<td>'.$nama.'</td>'.
  '</tr>'.
  '<tr>'.
  '<td>Nama Paket</td>'.
  '<td>:</td>'.
  '<td>'.$namapaket.'</td>'.
  '</tr>'.
  '<tr>'.
  '<td>Harga Paket</td>'.
  '<td>:</td>'.
  '<td>'.$harga.'</td>'.
  '</tr>'.
  '<tr>'.
  '<td>Tanggal Pesan</td>'.
  '<td>:</td>'.
  '<td>'.$tanggal.'</td>'.
  '</tr>'.
  '<tr>'.
  '<td>Pemesanan ini telah dikonfirmasi</td>'.
  '</tr>'.
  '</body></html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
//$dompdf->stream('bukti_bayar_'.$nama.'.pdf');
echo hash_hmac_file("md5", $dompdf->stream('bukti_bayar_'.$nama.'.pdf'), "secret");
?>