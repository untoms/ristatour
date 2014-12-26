<?php
include('../database/config.php');
session_start();
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
                        <li class="active">Data tables <?php echo $_SESSION["paket"]; ?></li>
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
                                <form role="form" action="index.php?halaman=next1" method='post'>
                                            <div class="form-group">
                                            <label>Hotel</label></br>
                                            <select id="namaobjek" name="namahotel" style="width:300px" class="form-control">
                                            <?php $sqlhotel = mysql_query("SELECT * 
                                                FROM hotel, kota, provinsi
                                                WHERE hotel.wilayah = kota.id
                                                AND kota.prov_id = provinsi.id
                                                AND hotel.status = 1
                                                LIMIT 0 , 30");
                                            while($cetakhotel=mysql_fetch_array($sqlhotel)){
                                                ?>
                                            <option value="<?php echo $cetakhotel['id_hotel'] ?>"><?php echo $cetakhotel['nama_hotel'] ?></option>
                                            <?php } ?>
                                            </select>
                                            <input type="submit" name="button" id="button" value="OK" value="OK" class="btn btn-primary">
                                            </div>
                                </form>
                                <table class="table table-bordered table-hover">
                                <th>No</th><th>id</th><th>Nama Hotel</th><th>Hapus</th>
                                <?php
                                $star=1;
                                 if (@$_POST["namahotel"]!=''){
                                    if (empty($_SESSION["isi1"])==TRUE){
                                $_SESSION["isi1"]=1;
                                }else{
                                $_SESSION["isi1"]++;
                                 }
                                @$namahotel=trim($_POST["namahotel"]);
                                $sqlhotel1= mysql_query("SELECT * 
                                 FROM hotel
                                 WHERE id_hotel=$namahotel");
                                $cetakhotel1=mysql_fetch_array($sqlhotel1);
                                @$lengkaphotel=trim( $cetakhotel1['nama_hotel']);
                                $_SESSION["akhir1"][$_SESSION["isi1"]]=array($namahotel,$lengkaphotel);
                                }else{
                                echo "<h3 style='color:red;'>Hotel</h3>";
                                }
                                @$star = $_SESSION["isi1"];
        
                                for ($a=0;$a<=$star;$a++) {
                                if (@$_SESSION['akhir1'][$a][0]!=''){
                                echo "<tr>
                                    <td>$a</td>
                                    <td>".@$_SESSION['akhir1'][$a][0]."</td>
                                    <td align=right>".@$_SESSION['akhir1'][$a][1]."</td>
                                    <td align=right>".@$_SESSION['akhir1'][$a][2]."</td>
                                    </tr>";
                                    }
                                }
                                ?>
                                </table>
                                <a href='index.php?halaman=paketnext'><input type='button' value='Sebelumnya' class="btn btn-primary"></a>
                                <a href='destroy.php?jenis=2'><input type='button' value='Bersihkan' class="btn btn-primary"></a>
                                <a href='index.php?halaman=next2'><input type='button' value='Selanjutnya' class="btn btn-primary"></a>

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