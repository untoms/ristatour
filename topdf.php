<?php
$id = $_POST['idpesan'];
$nama = $_POST['username'];
$namapaket = $_POST['namapaket'];
$harga = $_POST['hargapaket'];
$tanggal = $_POST['tanggal_mulai'];

require_once("dompdf/dompdf_config.inc.php");

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
$dompdf->stream('bukti_bayar_'.$nama.'.pdf');
?>