<?php
$idresi=$_GET['idpesan'];
include('../database/config.php');
$qryresi=mysql_query("SELECT * 
FROM pemesanan,paket, user
WHERE pemesanan.user_id = user.user_id
AND pemesanan.id_paket = paket.id_paket AND 
pemesanan.id_pemesanan='$idresi'");
$cetakresi=mysql_fetch_array($qryresi);
?>
<html>
<div class="wrapper row-offcanvas row-offcanvas-left">

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Data Hotel
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Forms</a></li>
                        <li class="active">General Elements</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Edit Data Hotel</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <?php if(empty($cetakresi['bukti']))
                                {echo "<script>alert('Gambar masih kosong, anda dikembalikan ke halaman Pemesanan');
    window.location=('index.php?halaman=pemesanan');</script>";} else {
                                ?>
                                <form role="form" action="index.php?halaman=terimakonfirmasiresi" method='post'>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Input">Id Pemesanan</label>
                                            <input type="text" class="form-control" name="idpesan" value="<?php echo $cetakresi['id_pemesanan'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Nama User</label>
                                            <input type="text" class="form-control" name="hotelname" value="<?php echo $cetakresi['username'];?>" >
                                        </div>
                                        <div class="form-group">
                                            <img src="../<?php echo $cetakresi['bukti']; ?>" height="500" width="500" alt="">
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Konfirmasi</button>
                                        <a href="index.php?halaman=pemesanan">Batal</a>
                                    </div>
                                </form>
                                <?php } ?>
                            </div><!-- /.box -->
                        </div>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../js/AdminLTE/demo.js" type="text/javascript"></script>        
<body>
<!--<style type="text/css">
table {font-family: Calibri; color:#000; font-size: 11pt; font-style: normal; background-color:  #6699FF; border: 3px solid navy}
</style>-->
</body>
</html>