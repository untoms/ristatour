<!DOCTYPE html>
<html>
    <head>
    </head>
    <body class="skin-blue">
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Anggota
                        <small>Form Admin</small>
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Tabel Pelanggan</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID Pelanggan</th>
                                                <th>Username</th>
                                                <th>Nomor Telepon</th>
                                                <th>Email</th>
                                                <th>Edit</th>
                                                <th>Status</th>
                                                <th></th>
                                                <th></th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $queryuser=mysql_query("SELECT * FROM user where role_id=2");
                                        while($cetakuser=mysql_fetch_array($queryuser)){
                                        ?>
                                            <tr>
                                                <td><?php echo $cetakuser['user_id'];?></td>
                                                <td><?php echo $cetakuser['username'];?></td>
                                                <td><?php echo $cetakuser['phone'];?></td>
                                                <td><?php echo $cetakuser['email'];?></td>
                                                <td><a href="index.php?halaman=edit&idedit=<?php echo $cetakuser['user_id'];?>">
                                                    Edit</a></td>
                                                <td><?php if($cetakuser['status']==1){echo "Aktif";} else {echo "Nonaktif";}?></td>
                                                <td><a href="konfirmasiaktifanggota.php?iduser=<?php echo $cetakuser['user_id'];?>">   
                                                <input type='button' class="btn btn-primary <?php if($cetakuser['status']==1){echo "disabled";}?>" value='aktifkan'></a></td>
                                                <td><a href="konfirmasinonaktifanggota.php?iduser=<?php echo $cetakuser['user_id'];?>">
                                                    <input type='button' class="btn btn-primary <?php if($cetakuser['status']==2){echo "disabled";}?>" value='nonaktifkan'></a></td>
                                                <td><a href="index.php?halaman=hapus&idhapus=<?php echo $cetakuser['user_id'];?>">
                                                    Hapus</a></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID Pelanggan</th>
                                                <th>Username</th>
                                                <th>Nomor Telepon</th>
                                                <th>Email</th>
                                                <th>Edit</th>
                                                <th>Status</th>
                                                <th></th>
                                                <th></th>
                                                <th>Hapus</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Tabel Admin</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID Admin</th>
                                                <th>Username</th>
                                                <th>Nomor Telepon</th>
                                                <th>Email</th>
                                                <th>Edit</th>
                                                <th>Status</th>
                                                <th></th>
                                                <th></th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        $queryuser=mysql_query("SELECT * FROM user where role_id=1");
                                        while($cetakuser=mysql_fetch_array($queryuser)){
                                        ?>
                                            <tr>
                                                <td><?php echo $cetakuser['user_id'];?></td>
                                                <td><?php echo $cetakuser['username'];?></td>
                                                <td><?php echo $cetakuser['phone'];?></td>
                                                <td><?php echo $cetakuser['email'];?></td>
                                                <td><a href="index.php?halaman=edit&idedit=<?php echo $cetakuser['user_id'];?>">
                                                    Edit</a></td>
                                                <td><?php if($cetakuser['status']==1){echo "Aktif";} else {echo "Nonaktif";}?></td>
                                                <td><a href="konfirmasiaktifanggota.php?iduser=<?php echo $cetakuser['user_id'];?>">   
                                                <input type='button' class="btn btn-primary <?php if($cetakuser['status']==1){echo "disabled";}?>" value='aktifkan'></a></td>
                                                <td><a href="konfirmasinonaktifanggota.php?iduser=<?php echo $cetakuser['user_id'];?>">
                                                    <input type='button' class="btn btn-primary <?php if($cetakuser['status']==2){echo "disabled";}?>" value='nonaktifkan'></a></td>
                                                <td><a href="index.php?halaman=hapus&idhapus=<?php echo $cetakuser['user_id'];?>">
                                                    Hapus</a></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID Pelanggan</th>
                                                <th>Username</th>
                                                <th>Nomor Telepon</th>
                                                <th>Email</th>
                                                <th>Edit</th>
                                                <th>Status</th>
                                                <th></th>
                                                <th></th>
                                                <th>Hapus</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                            <div class="form-group">
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="../../js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../../js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="../../js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../../js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>