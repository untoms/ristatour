<html lang="en">
<body>
<section id="recent-works">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h3>Bus Terbaik kami</h3>
                    <p>Koordinasi professional melalui kerja sama selama bertahun-tahun dengan lebih dari lima agen bus terbesar di Indonesia</p>
                    <div class="btn-group">
                        <a class="btn btn-danger" href="#scroller" data-slide="prev"><i class="icon-angle-left"></i></a>
                        <a class="btn btn-danger" href="#scroller" data-slide="next"><i class="icon-angle-right"></i></a>
                    </div>
                    <p class="gap"></p>
                </div>
                <div class="col-md-8">
                    <div id="scroller" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row">
                                    <?php $sqlbus = mysql_query("SELECT * 
                                                FROM bus
                                                LIMIT 0 , 3");
                                            while($cetakbus=mysql_fetch_array($sqlbus)){
                                                ?>
                                    <div class="col-xs-4">
                                        <div class="portfolio-item">
                                            <div class="item-inner">
                                                <img class="img-responsive" src="<?php echo $cetakbus['gambar'];?>" alt="">
                                                <h5>
                                                   <?php echo $cetakbus['nama_bus'];?>
                                                </h5>
                                                <div class="overlay">
                                                    <a class="preview btn btn-danger" title="<?php echo $cetakbus['nama_bus'];?>" href="<?php echo $cetakbus['gambar'];?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <?php }?>                                                       
                                </div><!--/.row-->
                            </div><!--/.item-->
                            <div class="item">
                                <div class="row">
                                    <?php $sqlbus = mysql_query("SELECT * 
                                                FROM bus
                                                LIMIT 3 , 6");
                                            while($cetakbus=mysql_fetch_array($sqlbus)){
                                                ?>
                                    <div class="col-xs-4">
                                        <div class="portfolio-item">
                                            <div class="item-inner">
                                                <img class="img-responsive" src="<?php echo $cetakbus['gambar'];?>" alt="">
                                                <h5>
                                                   <?php echo $cetakbus['nama_bus'];?>
                                                </h5>
                                                <div class="overlay">
                                                    <a class="preview btn btn-danger" title="<?php echo $cetakbus['nama_bus'];?>" href="<?php echo $cetakbus['gambar'];?>" rel="prettyPhoto"><i class="icon-eye-open"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <?php }?>
                                </div>
                            </div><!--/.item-->
                        </div>
                    </div>
                </div>
                </div>
            </div><!--/.row-->
        </div>
    </section>
      </body>
  </html>