<?php
include('../database/config.php');
$idpesan=$_GET['idpesan'];
$querypesan1=mysql_query("SELECT * 
FROM pemesanan, paket, user
WHERE pemesanan.user_id = user.user_id
AND pemesanan.id_paket = paket.id_paket
AND pemesanan.id_pemesanan = $idpesan
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
                    <h1>Portfolio</h1>
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
                </div>
                <div class="col-sm-6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Portfolio</li>

                    </ul>
                </div>
            </div>
        </div>
    </section><!--/#title--> 
    <section id='portfolio' class='container'>
                        <h2 class="title">Upload Resi Anda</h2>
                        <form role="form" action="index.php?halaman=uploadresi" method='post' enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Input">ID Pemesanan</label>
                                            <input type="text" class="form-control" name="idpesan" value="<?php echo $cetakpesan1['id_pemesanan']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih File Foto:</label>
                                            <input type="file" name="file" size="20"><p>
                                        </div>
                                        <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="index.php?halaman=cart" class="btn btn-primary">Batal</a>
                                        </div>
                                    </div>
                                </form>
                    </section>
        </body>
</html>