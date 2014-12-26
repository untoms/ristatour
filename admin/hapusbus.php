<?php
$idhapusbus=$_GET['idhapusbus'];
include('../database/config.php');
$qryagt=mysql_query("SELECT*FROM bus where id_bus='$idhapusbus'");
$cetak=mysql_fetch_array($qryagt);
?>
<html>
<div class="wrapper row-offcanvas row-offcanvas-left">

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Data User
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                     <h3 class="box-title">Hapus Data User</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="index.php?halaman=terimahapusbus" method='post'>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Input">Id Bus</label>
                                            <input type="text" class="form-control" name="idbus" value="<?php echo $cetak['id_bus'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Nama Bus</label>
                                            <input type="text" class="form-control" name="busname" value="<?php echo $cetak['nama_bus'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Jumlah Kursi</label>
                                            <input type="text" class="form-control" name="kursi" value="<?php echo $cetak['jumlah_kursi'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>AC</label>
                                            <input type="text" class="form-control" name="ac" value="<?php if($cetak['AC']>1){
                                                    echo "Tidak ada";}else{echo "ada";}?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Toilet</label>
                                            <input type="text" class="form-control" name="Toilet" value="<?php if($cetak['toilet']>1){
                                                    echo "Tidak ada";}else{echo "ada";}?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Full Music</label>
                                            <input type="text" class="form-control" name="fullmusic" value="<?php if($cetak['full_music']>1){
                                                    echo "Tidak ada";}else{echo "ada";}?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Charger</label>
                                            <input type="text" class="form-control" name="charger" value="<?php if($cetak['cahrger']>1){
                                                    echo "Tidak ada";}else{echo "ada";}?>" readonly>
                                        </div>
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                        <a href="index.php?halaman=bus" class="btn btn-primary"> Cancel </a>
                                    </div>
                                </form>
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