<?php
include('../database/config.php');
?>
<!DOCTYPE html>
<html>
<body>
<div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Pemesanan
                        <small>Form Admin</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Tabel Paket</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID Pemesanan</th>
                                                <th>Pemesan</th>
                                                <th>Nama Paket</th>
                                                <th>Tanggal mulai</th>
                                                <th>Status</th>
                                                <th>Konfirmasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $querypesan=mysql_query("SELECT * 
                                        FROM paket, user, pemesanan
                                        WHERE pemesanan.user_id = user.user_id
                                        AND pemesanan.id_paket = paket.id_paket
                                        LIMIT 0 , 30");
                                        while($cetakpesan=mysql_fetch_array($querypesan)){
                                        ?>
                                            <tr>
                                                <td><?php echo $cetakpesan['id_pemesanan'];?></td>
                                                <td><?php echo $cetakpesan['username'];?></td>
                                                <td><?php echo $cetakpesan['nama_paket'];?></td>
                                                <td><?php echo $cetakpesan['tanggal_mulai'];?></td>
                                                <td><?php if($cetakpesan['status']>1){
                                                    echo "Belum terkonfirmasi";}else{echo "telah terkonfirmasi";}?></td>
                                                <td><a href="index.php?halaman=lihatresi&idpesan=<?php echo $cetakpesan['id_pemesanan'];?>">
                                                    Lihat Resi </a></td>
                                            </tr>
                                            
                                           <?php }?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                    </div>
                </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
            <!-- Right side column. Contains the navbar and content of the page -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../js/AdminLTE/demo.js" type="text/javascript"></script>
    </body>        
</html>