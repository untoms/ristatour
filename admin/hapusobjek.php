<?php
$idhapusobjek=$_GET['idhapusobjek'];
include('../database/config.php');
$qryagt=mysql_query("SELECT * 
FROM objek, kota, provinsi
WHERE objek.wilayah = kota.id
AND kota.prov_id = provinsi.id
AND id_objek='$idhapusobjek'
LIMIT 0 , 30");
$cetak=mysql_fetch_array($qryagt);
?>
<html>
<div class="wrapper row-offcanvas row-offcanvas-left">

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Data Objek
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
                                     <h3 class="box-title">Hapus Data Objek</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="index.php?halaman=terimahapusobjek" method='post'>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Input">Id Objek</label>
                                            <input type="text" class="form-control" name="idobjek" value="<?php echo $cetak['id_objek'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Nama Objek</label>
                                            <input type="text" class="form-control" name="objekname" value="<?php echo $cetak['nama_objek'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Kota/Kabupaten</label>
                                            <input type="text" class="form-control" name="city" value="<?php echo $cetak['city']?>" readonly>
                                        </div>
                                          <div class="form-group">
                                            <label for="Input">Alamat Lengkap</label>
                                            <input type="text" class="form-control" name="alamat" value="<?php echo $cetak['alamat_objek'];?>" readonly>
                                        </div>
                                        </div>
                                          <div class="form-group">
                                            <label for="Input">Deskripsi Objek</label>
                                            <input type="text" class="form-control" name="deskripsi" value="<?php echo $cetak['deskripsi_objek'];?>" readonly>
                                        </div>
                                        </div>
                                          <div class="form-group">
                                            <label for="Input">Harga Objek</label>
                                            <input type="text" class="form-control" name="harga" value="<?php echo $cetak['harga_objek'];?>" readonly>
                                        </div>
                                        <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                        <a href="index.php?halaman=bus"> Cancel </a>
                                    </div>
                                        
                                    </div><!-- /.box-body -->

                                    
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