<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="logo"></a>-->
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li><img src="images/ico/Logo Rista tour.png" width="60" height"30"></li>
                    <li><a class="btn btn-large" href="index.php"><i class="icon-home"></i></a></li>
                    <li><a href="index.php?halaman=paket">Tours</a></li>
                    <!--<li><a href="index.php?halaman=hotel">Hotels</a></li>
                    <li><a href="index.php?halaman=objek">Objek</a></li>
                    <!--<li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages<i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="career.html">Career</a></li>
                            <li><a href="blog-item.html">Blog Single</a></li>
                            <li><a href="pricing.html">Pricing</a></li>
                            <li><a href="404.html">404</a></li>
                            <li><a href="registration.html">Registration</a></li>
                            <li class="divider"></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                            <li><a href="terms.html">Terms of Use</a></li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a></li> 
                    <li><a href="contact-us.html">Contact</a></li>-->
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if (isset($_SESSION['user']) or isset ($_SESSION['admin'])) {} else{?>
                    <li><a href="registrasi.php">Register<i class="icon-pencil"></i></a></li><?php }?>
                    <?php if (isset($_SESSION['username']) and isset ($_SESSION['password'])) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">user(<?php echo $_SESSION['username'] ?>)<i class="icon-user"></i></a>
                        <ul class="dropdown-menu">
                            <!--<li><a href="career.html">Profile</a></li>-->
                            <?php if (isset($_SESSION['admin'])) { ?>
                            <li class="divider"></li>
                            <li><a href="admin/index.php">Admin Page</a></li>
                            <?php } ?>
                            <?php if (isset($_SESSION['user'])) { ?>
                            <li class="divider"></li>
                            <li><a href="index.php?halaman=cart">Pemesanan</a></li>
                            <?php } ?>
                            <li class="divider"></li>
                            <li><a href="logout.php">Logout</a></li>
                           
                        </ul>
                    </li>

                    <?php } else {?>
                    <li><a href="log in.php">Login<i class="icon-lock"></i></a></li><?php } ?>
                </ul>
            </div>
        </div>
    </header>