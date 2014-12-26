<?php
include('../database/config.php');
?>
<html>
<div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Hotel
                        <small>Form Hotel</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Tabel Hotel</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID Hotel</th>
                                                <th>Nama Hotel</th>
                                                <th>Alamat</th>
                                                <th>Wilayah</th>
                                                <th>Edit</th>
                                                <th>Status</th>
                                                <th></th>
                                                <th></th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $queryhotel=mysql_query("SELECT * 
                                        FROM hotel, kota, provinsi
                                        WHERE hotel.wilayah = kota.id
                                        AND kota.prov_id = provinsi.id
                                        LIMIT 0 , 30;");
                                        while($cetak=mysql_fetch_array($queryhotel)){
                                        ?>
                                            <tr>
                                                <td><?php echo $cetak['id_hotel'];?></td>
                                                <td><?php echo $cetak['nama_hotel'];?></td>
                                                <td><?php echo $cetak['alamat'];?></td>
                                                <td><?php echo $cetak['province'];?></td>
                                                <td><a href="index.php?halaman=edithotel&idedithotel=<?php echo $cetak['id_hotel'];?>">
                                                    Edit</a></td>
                                                <td><?php if($cetak['status']==1){echo "Aktif";} else {echo "Nonaktif";}?></td>
                                                <td><a href="konfirmasiaktifhotel.php?idhotel=<?php echo $cetak['id_hotel'];?>">   
                                                <input type='button' class="btn btn-primary <?php if($cetak['status']==1){echo "disabled";}?>" value='aktifkan'></a></td>
                                                <td><a href="konfirmasinonaktifhotel.php?idhotel=<?php echo $cetak['id_hotel'];?>">
                                                    <input type='button' class="btn btn-primary <?php if($cetak['status']==2){echo "disabled";}?>" value='nonaktifkan'></a></td>
                                                <td><a href="index.php?halaman=hapushotel&idhapushotel=<?php echo $cetak['id_hotel'];?>">
                                                    Hapus</a></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->

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
                                    <h3 class="box-title">Tambah Data Hotel</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="index.php?halaman=terimahotelbaru" method='post' enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Input">Nama Hotel</label>
                                            <input type="text" class="form-control" name="hotel" >
                                        </div>
                                        <div class="form-group">
                                            <label>Kota/Kabupaten</label>
                                            <select class="form-control" name="city" id="city">
                                                <?php $sql = mysql_query("SELECT * FROM kota ORDER BY id ASC");
                                                while($cetakhotel=mysql_fetch_array($sql)){
                                                ?>
                                                <option value="<?php echo $cetakhotel['id'] ?>"><?php echo $cetakhotel['city'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Alamat Lengkap</label>
                                            <input type="textarea" class="form-control" name="alamat" >
                                        </div>
                                        <div class="form-group">
                                        <label>Pilih File Gambar:</label>
                                        <input type="file" name="file" size="20"><p>
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