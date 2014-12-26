<?php
include('../database/config.php');
//session_start();

if(empty($_SESSION["paket"])){
$_SESSION["paket"]=$_POST['paket'];
$_SESSION["city"]=$_POST['city'];
$_SESSION["harga"]=$_POST['harga'];
$_SESSION["durasi"]=$_POST['durasi'];
/*$file_foto=$_POST['file_foto'];*/}
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
                        <li class="active">Data tables <?php echo $_SESSION["paket"] ?></li>
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
                                <form role="form" action="index.php?halaman=paketnext" method='post'>
                                            <div class="form-group">
                                            <label>Objek</label></br>
                                            <select id="namaobjek" name="namaobjek" style="width:300px" class="form-control">
                                            <?php $sqlobjek = mysql_query("SELECT * 
                                                FROM objek, kota, provinsi
                                                WHERE objek.wilayah = kota.id
                                                AND kota.prov_id = provinsi.id
                                                AND objek.status = 1
                                                LIMIT 0 , 30");
                                            while($cetakobjek=mysql_fetch_array($sqlobjek)){
                                                ?>
                                            <option value="<?php echo $cetakobjek['id_objek'] ?>"><?php echo $cetakobjek['nama_objek'] ?></option>
                                            <?php } ?>
                                            </select>
                                            <input type="submit" name="button" id="button" value="OK" class="btn btn-primary">
                                            </div>
                                </form>
                                <table class="table table-bordered table-hover">
                                <th>No</th><th>id</th><th>Nama Objek</th><th>Hapus</th>
                                <?php
                                $awal=1;
                                 if (@$_POST["namaobjek"]!=''){
                                    if (empty($_SESSION["isi"])==TRUE){
                                $_SESSION["isi"]=1;
                                }else{
                                $_SESSION["isi"]++;
                                 }
                                @$namaobjek=trim($_POST["namaobjek"]);
                                $sqlobjek1= mysql_query("SELECT * 
                                 FROM objek
                                 WHERE id_objek=$namaobjek");
                                $cetakobjek1=mysql_fetch_array($sqlobjek1);
                                @$lengkapobjek=trim( $cetakobjek1['nama_objek']);
                                $_SESSION["akhir"][$_SESSION["isi"]]=array($namaobjek,$lengkapobjek);
                                }else{
                                echo "<h3 style='color:red;'>Objek</h3>";
                                }
                                @$awal = $_SESSION["isi"];
        
                                for ($i=0;$i<=$awal;$i++) {
                                if (@$_SESSION['akhir'][$i][0]!=''){
                                echo "<tr>
                                    <td>$i</td>
                                    <td>".@$_SESSION['akhir'][$i][0]."</td>
                                    <td align=right>".@$_SESSION['akhir'][$i][1]."</td>
                                    <td align=right>".@$_SESSION['akhir'][$i][2]."</td>
                                    </tr>";
                                    }
                                }
                               
                                ?>
                            </table>
                            <a href='destroy.php?jenis=1'><input type='button' class="btn btn-primary" value='Bersihkan'></a>
                            <a href='index.php?halaman=next1'><input type='button' class="btn btn-primary" value='Next'></a>
                                            <!--<div class="box-body">
                                            <div class="form-group">
                                            <label>Bus</label></br>
                                                <?php $sqlbus = mysql_query("SELECT * 
                                                FROM bus");
                                                while($cetakbus=mysql_fetch_array($sqlbus)){
                                                ?>
                                                <input type="checkbox" name="bonus[0]" value="<?php echo $cetakbus['id_bus'] ?>"><?php echo $cetakbus['nama_bus'];?></option></br>
                                                <?php } ?>
                                            </div>
                                            </div>-->


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