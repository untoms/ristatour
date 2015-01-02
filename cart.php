<?php
include('../database/config.php');
$iduser=$_SESSION["userid"];
$querypesan1=mysql_query("SELECT * 
FROM pemesanan, paket, user
WHERE pemesanan.user_id = user.user_id
AND pemesanan.id_paket = paket.id_paket
AND pemesanan.user_id = $iduser
LIMIT 0 , 30;");
$cetakpesan1=mysql_fetch_array($querypesan1);
?>
<!DOCTYPE html>
<html lang="en">
<body>
    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Pemesanan</h1>
                </div>
            </div>
        </div>
    </section><!--/#title--> 
    <section id='portfolio' class='container'>
<table class='center' border="1">
    <tr>
        <th>ID Pemesanan</th>
        <th>Pemesan</th>
        <th>Nama Paket</th>
        <th>Tanggal mulai</th>
        <th>Status</th>
        <th>Resi</th>
        <th>Lihat</th>
        <th>Bukti</th>
    </tr>
    <?php
$querypesan=mysql_query("SELECT * 
FROM paket, user,pemesanan
WHERE pemesanan.user_id = user.user_id
AND pemesanan.id_paket = paket.id_paket
AND pemesanan.user_id = $iduser
LIMIT 0 , 30;
");
while($cetakpesan=mysql_fetch_array($querypesan)){
?>
    <tr>
        <td><?php echo $cetakpesan['id_pemesanan'];?></td>
        <td><?php echo $cetakpesan['username'];?></td>
        <td><?php echo $cetakpesan['nama_paket'];?></td>
        <td><?php echo $cetakpesan['tanggal_mulai'];?></td>
        <td><?php if($cetakpesan['status']>1){
            echo "Belum terkonfirmasi";}else{echo "telah terkonfirmasi";}?></td>
        <td><a type="button" href="index.php?halaman=upload&idpesan=<?php echo $cetakpesan['id_pemesanan'];?>">
            <input type='button' class="btn btn-primary" value='Upload'></a></td>
        <td><a href="index.php?halaman=lihatresi&idpesan=<?php echo $cetakpesan['id_pemesanan'];?>">
            <input type='button' class="btn btn-primary" value='Lihat Resi'></a></td>
       <td><a href="index.php?halaman=cetakbukti&idpesan=<?php echo $cetakpesan['id_pemesanan'];?>">
            <input type='button' class="btn btn-primary <?php if($cetakpesan['status']>1){echo "disabled";}?>" value='Cetak Bukti'></a></td>
    </tr>
    <?php } ?>
</table>
<div id="upload-popup" class="popup">
    <div class="popup-body"><span class="popup-exit"></span>
 
        <div class="popup-content">
            <h2 class="popup-title">Upload Resi Anda</h2>
          <form role="form" action="index.php?halaman=uploadresi" method='post' enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="Input">ID Pemesanan</label>
                                <input type="text" class="form-control" name="idpesan" value="
                                    <?php echo $cetakpesan1['id_pemesanan'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Pilih File Foto:</label>
                                <input type="file" name="file" size="20"><p>
                            </div>
                            <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </div>
             </form>
        </div>
    </div>
</div>
<div id="cek-upload" class="popup">
    <div class="popup-body"><span class="popup-exit"></span>
        <div class="popup-content">
            <h2 class="popup-title">Lihat Resi</h2>
             <div class="col-xs-6">
                <div class="portfolio-item">
                        <div class="item-inner">
                            <a href="#"><img class="img-responsive" src="<?php echo $cetakpesan1['bukti'] ?>" alt=""></a>
                    <div class="overlay">
                    <a class="preview btn btn-danger" title="Resi" href="<?php
                    echo $cetakpesan1['bukti'] ?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                     </div>
                </div>
                </div>
              </div>
        </div>
    </div>
</div>
</section>
</body>
</html>