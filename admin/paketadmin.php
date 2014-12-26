<?php
include('../database/config.php');
if(isset($_SESSION["paket"])){
                        unset($_SESSION["paket"]);
                        unset($_SESSION["city"]);
                        unset($_SESSION["harga"]);
                        unset($_SESSION["durasi"]);
                        unset($_SESSION['akhir']);
                        unset($_SESSION['isi']);
                        unset($_SESSION['akhir1']);
                        unset($_SESSION['isi1']);
/*$file_foto=$_POST['file_foto'];*/}
?>
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
                                                <th>ID Paket</th>
                                                <th>Nama Paket</th>
                                                <th>Harga</th>
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
                                        $querypaket=mysql_query("SELECT * 
                                        FROM paket, provinsi
                                        WHERE paket.wilayah = provinsi.id
                                        LIMIT 0 , 30;");
                                        while($cetak=mysql_fetch_array($querypaket)){
                                        ?>
                                            <tr>
                                                <td><?php echo $cetak['id_paket'];?></td>
                                                <td><?php echo $cetak['nama_paket'];?></td>
                                                <td><?php echo $cetak['harga'];?></td>
                                                <td><?php echo $cetak['province'];?></td>
                                                <td><a href="index.php?halaman=editpaket&ideditpaket=<?php echo $cetak['id_paket'];?>">
                                                    Edit</a></td>
                                                <td><?php if($cetak['status']==1){echo "Aktif";} else {echo "Nonaktif";}?></td>
                                                <td><a href="konfirmasiaktif.php?idpaket=<?php echo $cetak['id_paket'];?>">   
                                                <input type='button' class="btn btn-primary <?php if($cetak['status']==1){echo "disabled";}?>" value='aktifkan'></a></td>
                                                <td><a href="konfirmasinonaktif.php?idpaket=<?php echo $cetak['id_paket'];?>">
                                                    <input type='button' class="btn btn-primary <?php if($cetak['status']==2){echo "disabled";}?>" value='nonaktifkan'></a></td>
                                                <td><a href="index.php?halaman=hapuspaket&idhapuspaket=<?php echo $cetak['id_paket'];?>">
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
                                    <h3 class="box-title">Tambah Data Paket</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="index.php?halaman=paketnext&move=1" method='post' enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Input">Nama Paket</label>
                                            <input type="text" class="form-control" name="paket" >
                                        </div>
                                        <div class="form-group">
                                            <label>Wilayah</label>
                                            <select class="form-control" name="city" id="city">
                                                <?php $sql = mysql_query("SELECT * FROM provinsi ORDER BY id ASC");
                                                while($cetakpaket=mysql_fetch_array($sql)){
                                                ?>
                                                <option value=" <?php echo $cetakpaket['id'];?>"><?php echo $cetakpaket['province'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Durasi</label>
                                            <input type="textarea" class="form-control" name="durasi" >
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Harga</label>
                                            <input type="textarea" class="form-control" name="harga" >
                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Next</button>
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
        <script src="select2-3.5.2/select2.js"></script>
</html>