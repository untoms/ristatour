<?php
$idedit=$_GET['idedit'];
include('../database/config.php');
$qryagt=mysql_query("SELECT*FROM user where user_id='$idedit'");
$cetakuser=mysql_fetch_array($qryagt);
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
                                    <h3 class="box-title">Edit Data User</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="index.php?halaman=terimaedituser" method='post'>
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="Input">Id User</label>
                                            <input type="text" class="form-control" name="iduser" value="<?php echo $cetakuser['user_id'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Username</label>
                                            <input type="text" class="form-control" name="username" value="<?php echo $cetakuser['username'];?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Nomor Telepon</label>
                                            <input type="text" class="form-control" name="phone" value="<?php echo $cetakuser['phone'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="Input">Email</label>
                                            <input type="text" class="form-control" name="email" value="<?php echo $cetakuser['email'];?>" >
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