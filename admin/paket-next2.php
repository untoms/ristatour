<?php
include('../database/config.php');
?>
<html>
<div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Paket
                        <small>Form Admin</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Data tables <?php echo $_SESSION["paket"]; echo $_SESSION["isi"];?></li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Tambah Data Paket</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="index.php?halaman=terimapaketbaru" method='post' enctype="multipart/form-data">
                                            <div class="form-group">
                                            <label>Pilih Bus</label>
                                            <select class="form-control" name="bus" id="bus">
                                                <?php $sql = mysql_query("SELECT * FROM bus WHERE status = 1 ORDER BY id_bus ASC");
                                                while($cetakbus=mysql_fetch_array($sql)){
                                                ?>
                                                <option value="<?php echo $cetakbus['id_bus'];?>"><?php echo $cetakbus['nama_bus'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Pilih File Gambar:</label>
                                        <input type="file" name="file" size="20"><p>
                                        </div>
                                        <div>
                                            <input type="submit" name="button" id="button" value="OK" class="btn btn-primary">
                                            </div>
                                </form>
                            </div><!-- /.box -->
                        </div>
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside>
</div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../js/AdminLTE/demo.js" type="text/javascript"></script>
        <script src="select2-3.5.2/select2.js"></script>
</html>