<?php
$idedithotel=$_GET['idedithotel'];
include('../database/config.php');
$idedit=$_GET['ideditpaket'];
$qryagt=mysql_query("SELECT * 
FROM paket, provinsi
WHERE paket.wilayah = provinsi.id
AND paket.id_paket = $idedit
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
                        Data Paket
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
                                    <h3 class="box-title">Edit Data Paket</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="index.php?halaman=terimaeditpaket" method='post'>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Input">Id Paket</label>
                                            <input type="text" class="form-control" name="idpaket" value="<?php echo $cetak['id_paket'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Nama Paket</label>
                                            <input type="text" class="form-control" name="paket" value="<?php echo $cetak['nama_paket'];?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Wilayah</label>
                                           <select class="form-control" name="city" id="city">
                                                <?php $sql = mysql_query("SELECT * FROM provinsi ORDER BY id ASC");
                                                while($cetakpaket=mysql_fetch_array($sql)){
                                                ?>
                                                <option value=" <?php echo $cetakpaket['id'];?>" <?php if( $cetakpaket['id']==$cetak['wilayah']){echo "selected";}?>><?php echo $cetakpaket['province'];?>  </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                          <div class="form-group">
                                            <label for="Input">Durasi</label>
                                            <input type="text" class="form-control" name="durasi" value="<?php echo $cetak['durasi'];?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Harga</label>
                                            <input type="text" class="form-control" name="harga" value="<?php echo $cetak['harga'];?>" >
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="index.php?halaman=paket" class="btn btn-primary">Batal</a>
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