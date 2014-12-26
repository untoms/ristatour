<?php
include('../database/config.php');
?>
<html>
<div class="wrapper row-offcanvas row-offcanvas-left">
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Bus
                        <small>Form Bus</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Tabel Bus</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID Bus</th>
                                                <th>Nama Bus</th>
                                                <th>Jumlah Kursi</th>
                                                <th>AC</th>
                                                <th>Toilet</th>
                                                <th>Full Music</th>
                                                <th>Charger</th>
                                                <th>Edit</th>
                                                <th>Status</th>
                                                <th></th>
                                                <th></th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $querybus=mysql_query("SELECT * 
                                        FROM bus");
                                        while($cetak=mysql_fetch_array($querybus)){
                                        ?>
                                            <tr>
                                                <td><?php echo $cetak['id_bus'];?></td>
                                                <td><?php echo $cetak['nama_bus'];?></td>
                                                <td><?php echo $cetak['jumlah_kursi'];?></td>
                                                <td><?php if($cetak['AC']>1){
                                                    echo "Tidak ada";}else{echo "ada";}?></td>
                                                <td><?php if($cetak['Toilet']>1){
                                                    echo "Tidak ada";}else{echo "ada";}?></td>
                                                <td><?php if($cetak['full_music']>1){
                                                    echo "Tidak ada";}else{echo "ada";}?></td>
                                                <td><?php if($cetak['charger']>1){
                                                    echo "Tidak ada";}else{echo "ada";}?></td>
                                                <td><a href="index.php?halaman=editbus&ideditbus=<?php echo $cetak['id_bus'];?>">
                                                    Edit</a></td>
                                                <td><?php if($cetak['status']==1){echo "Aktif";} else {echo "Nonaktif";}?></td>
                                                <td><a href="konfirmasiaktifbus.php?idbus=<?php echo $cetak['id_bus'];?>">   
                                                <input type='button' class="btn btn-primary <?php if($cetak['status']==1){echo "disabled";}?>" value='aktifkan'></a></td>
                                                <td><a href="konfirmasinonaktifbus.php?idbus=<?php echo $cetak['id_bus'];?>">
                                                    <input type='button' class="btn btn-primary <?php if($cetak['status']==2){echo "disabled";}?>" value='nonaktifkan'></a></td>
                                                <td><a href="index.php?halaman=hapusbus&idhapusbus=<?php echo $cetak['id_bus'];?>">
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
                        Data Bus
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
                                    <h3 class="box-title">Tambah Data Bus</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="index.php?halaman=terimabusbaru" method='post' enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Input">Nama Bus</label>
                                            <input type="text" class="form-control" name="busname" >
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Jumlah Kursi</label>
                                            <input type="text" class="form-control" name="kursi" >
                                        </div>
                                        <div class="form-group">
                                            <label>AC</label>
                                            <select class="form-control" name="ac" id="ac">
                                                <option value="1">Ada</option>
                                                <option value="2">Tidak Ada</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Toilet</label>
                                            <select class="form-control" name="toilet" id="toilet">
                                                <option value="1">Ada</option>
                                                <option value="2">Tidak Ada</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Full Music</label>
                                            <select class="form-control" name="fullmusic" id="fullmusic">
                                                <option value="1">Ada</option>
                                                <option value="2">Tidak Ada</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Charger</label>
                                            <select class="form-control" name="charger" id="charger">
                                                <option value="1">Ada</option>
                                                <option value="2">Tidak Ada</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label>Pilih File Foto:</label>
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