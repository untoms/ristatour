<?php
$idedithotel=$_GET['idedithotel'];
include('../database/config.php');
$qryagt=mysql_query("SELECT * 
FROM hotel, kota, provinsi
WHERE hotel.wilayah = kota.id
AND kota.prov_id = provinsi.id
AND id_hotel = '$idedithotel'
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
                        Data Hotel
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
                                    <h3 class="box-title">Edit Data Hotel</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="index.php?halaman=terimaedithotel" method='post'>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Input">Id Hotel</label>
                                            <input type="text" class="form-control" name="idhotel" value="<?php echo $cetak['id_hotel'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Nama Hotel</label>
                                            <input type="text" class="form-control" name="hotelname" value="<?php echo $cetak['nama_hotel'];?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Kabupaten/Kota</label>
                                           <select class="form-control" name="city" id="city">
                                                <?php $sql = mysql_query("SELECT * FROM kota ORDER BY id ASC");
                                                while($cetakhotel=mysql_fetch_array($sql)){
                                                ?>
                                                <option value="<?php echo $cetakhotel['id'] ?>" <?php if( $cetakhotel['id']==  $cetak['wilayah']){echo "selected";}?> ><?php echo $cetakhotel['city'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                          <div class="form-group">
                                            <label for="Input">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" value="<?php echo $cetak['alamat'];?>" >
                                        </div>
                                        
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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