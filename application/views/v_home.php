<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Perpustakaan</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Baggage Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="<?php echo base_url() ?>project/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>project/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="<?php echo base_url() ?>project/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="<?php echo base_url() ?>project///fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <!-- //Fonts -->

</head>

<body>
    <div class="main-sec">
        <!-- //header -->
        <header class="py-sm-3 pt-3 pb-2" id="home">
            <div class="container">
                <!-- nav -->
                <div class="top-w3pvt d-flex">
                    <div id="logo">
                        <h1> <a href="index.html"><span class="log-w3pvt">E-</span>LIBRARY</a> <label class="sub-des"><?= $judul1; ?></label></h1>
                    </div>

                    <div class="forms ml-auto">
                        <a href=" <?php echo base_url('Auth'); ?>" class="btn"><span class="fa fa-user-circle"></span> Sign In</a>
                        <a href="<?php echo base_url('Auth/registration'); ?>" class="btn"><span class="fa fa-pencil-square-o"></span>Create Account</a>
                    </div>
                </div>
                <div class="nav-top-wthree">
                    <nav>
                        <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu">
                            <li><a href="<?php echo base_url('Home') ?>">Home</a></li>
                            <li><a href="<?php echo base_url('Home/about') ?>">About Us</a></li>
                        </ul>
                    </nav>
                    <!-- //nav -->
                    <div class="search-form ml-auto">
                        <div class="form-w3layouts-grid">
                            <form action="#" method="post" class="newsletter">
                                <input class="search" type="search" placeholder="Search here..." required="">
                                <button class="form-control btn" value=""><span class="fa fa-search"></span></button>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </header>
        <!-- //header -->
        <!--/banner-->
        <div class="banner-wthree-info container">
            <div class="row">
                <div class="col-lg-5 banner-left-info">
                    <h3>KISARAN PERJUANGAN <span> TERBESAR</span></h3>
                </div>
                <div class="col-lg-7 banner-img">
                    <img src="<?php echo base_url('project/'); ?>images/kakay.png" alt="part image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- //banner-->
    <!--/banner-bottom -->
    <section class="banner-bottom py-5">
        <div class="container py-md-3">
            <div class="row grids-wthree-info text-center">
                <div class="col-lg-4 ab-content">
                    <div class="ab-info-con">
                        <h4>Medan Merdeka Selatan, Jakarta</h4>
                        <p>Kepala Perpustakaan Nasional Muhammad Syarif Bando mengukuhkan Heri Hendrayana Harris atau yang akrab disapa Gol A Gong sebagai Duta Baca Indonesia Tahun 2021 bertempat di Teater Lantai 2 Perpusnas</p>
                    </div>
                </div>
                <div class="col-lg-4 ab-content">
                    <div class="ab-info-con">
                        <h4>Duta Baca Indonesia Harus Bisa Kolaborasikan Aksi dan Narasi</h4>
                        <p>Medan Merdeka Selatan, Jakarta- Perpustakaan Nasional RI melaksanakan penandatanganan Memorandum of Understanding (MoU) dengan pegiat literasi Heri Hendrayana Harris atau yang akrab disapa Gol A Gong sebagai Duta Baca Indonesia (DBI) menggantikan...</p>
                    </div>
                </div>
                <div class="col-lg-4 ab-content">
                    <div class="ab-info-con">
                        <h4>Desiminasi Informasi dan Ilmu Pengetahuan dalam Meningkatkan Literasi Informasi</h4>
                        <p>Saat ini perpustakaan harus berubah menjadi pusat transfer ilmu pengetahuan dan informasi, perpustakaan pun turut andil dalam meningkatkan kesejahteraan pembacanya. Untuk itu, perlu didukung dengan.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- /banner-bottom -->
    <!--/banner-bottom -->
    <section class="collections">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 ab-content-img">

                </div>
                <div class="col-md-4 ab-content text-center p-lg-5 p-3 my-lg-5">
                    <h4>Institusi & Pustakawan</h4>
                    <p>Ikatan Pustakawan Indonesia Nomor Pokok PerpustakaanPendidikan dan Pelatihan.</p>


                </div>
            </div>
        </div>
    </section>
    <!-- /banner-bottom -->
    <!--/collections -->
    <section class="banner-bottom py-5">
        <div class="container py-md-5">

            <h3 class="title-wthree mb-lg-5 mb-4 text-center">Book Mpedia</h3>
            <div class="row text-center">
                <div class="col-md-4 content-gd-wthree">
                    <img src="<?= base_url() ?>project/images/perpus2.jpg" class="img-fluid" alt="" />
                </div>
                <div class="col-md-4 content-gd-wthree ab-content py-lg-5 my-lg-5">
                    <h4>Mpeida perpustakaan</h4>
                    <p>Bagi dan sebarkan repositori institusi Anda sekarang juga.</p>


                </div>
                <div class="col-md-4 content-gd-wthree">
                    <img src="<?php echo base_url() ?>project/images/pp2.jpg" class="img-fluid" alt="" />
                </div>
            </div>

        </div>
    </section>
    <!-- //collections-->
    <!-- /mid-section -->
    <section class="mid-section">
        <div class="d-lg-flex p-0">
            <div class="col-lg-6 bottom-w3pvt-left p-lg-0">
                <img src="<?= base_url() ?>project/images/perpus.jpg" class="img-fluid" alt="" />
                <div class="pos-wthree">
                    <h4 class="text-wthree">50% Off Any <br> Women's Bags</h4>

                </div>
            </div>
            <div class="col-lg-6 bottom-w3pvt-left bottom-w3pvt-right p-lg-0">
                <img src="<?= base_url() ?>project/images/tim1.jpg" class="img-fluid" alt="" />
                <div class="pos-w3pvt">

                </div>
            </div>
        </div>
    </section>
    <!-- //mid-section -->

    <!--/gallery -->

    <!--/newsletter -->
    <section class="newsletter-w3pvt py-5">
        <div class="container py-md-5">
            <form method="post" action="#">
                <p class="text-center">Baca buku, berbagi koleksi bacaan dan bersosialisasi secara bersamaan. Di mana pun, kapan pun dengan nyaman bersama setiap orang..</p>
                <div class="row subscribe-sec">
                    <div class="col-md-9">
                        <input type="hidden" class="form-control" id="email" placeholder="Enter Your Email.." name="email" required="">

                    </div>

                </div>
            </form>
        </div>
    </section>
    <!--//newsletter -->
    <!--/shipping-->
    <section class="shipping-wthree">
        <div class="shiopping-grids d-lg-flex">
            <div class="col-lg-4 shiopping-w3pvt-gd text-center">
                <div class="icon-gd"><span class="fa fa-truck" aria-hidden="true"></span>
                </div>
                <div class="fas fa-users">
                    <h3>Berbagi dan Bersosialisasi.</h3>
                    <p>Temukan dan jalin pertemanan. Dapatkan aktifitas kerabatmu.</p>
                </div>
            </div>
            <div class="col-lg-4 shiopping-w3pvt-gd sec text-center">
                <div class="icon-gd"><span class="fa fa-bullhorn" aria-hidden="true"></span></div>
                <div class="icon-gd-info">
                    <h3>Buat dan Sebarkan Kutipanmu.</h3>
                    <p>Tambah dan bagikan kutipan untuk memotivasi yang lain.</p>
                </div>
            </div>
            <div class="col-lg-4 shiopping-w3pvt-gd text-center">
                <div class="icon-gd"> <span class="fa fa-gift" aria-hidden="true"></span></div>
                <div class="icon-gd-info">
                    <h3>Desain aplikasi menarik dan menyenangkan</h3>
                    <p>Perpustakaan Digital</p>
                </div>

            </div>
        </div>

    </section>
    <!--//shipping-->
    <!-- footer -->
    <div class="footer_agileinfo_topf py-5">
        <div class="container py-md-5">
            <div class="row">
                <div class="col-lg-3 footer_wthree_gridf mt-lg-5">
                    <h2><a href="index.html"><span>B</span>ipusna
                        </a> </h2>
                    <label class="sub-des2"><?php echo $judul1; ?></label>
                </div>
                <div class="col-lg-3 footer_wthree_gridf mt-md-0 mt-4">
                    <ul class="footer_wthree_gridf_list">
                        <li>
                            <a href="<?php echo base_url('Home'); ?>"><span class="fa fa-angle-right" aria-hidden="true"></span> Home</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Home/about'); ?>"><span class="fa fa-angle-right" aria-hidden="true"></span> About</a>
                        </li>
                        <!---<li>
                            <a href="<?php echo base_url('Home/Colection'); ?>"><span class="fa fa-angle-right" aria-hidden="true"></span>Colection</a>
                        </li>-->

                    </ul>
                </div>

                <div class="w3ls-fsocial-grid">
                    <h3 class="sub-w3ls-headf">Follow Us</h3>
                    <div class="social-ficons">
                        <ul>
                            <li><a href="#"><span class="fa fa-facebook"></span> Facebook</a></li>
                            <li><a href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                            <li><a href="#"><span class="fa fa-google"></span>Google</a></li>
                        </ul>
                    </div>
                </div>
                <div class="move-top text-center mt-lg-4 mt-3">
                    <a href="#home"><span class="fa fa-angle-double-up" aria-hidden="true"></span></a>
                </div>
            </div>
        </div>
        <!-- //footer -->

        <!-- copyright -->
        <div class="cpy-right text-center py-3">
            <p>© 2019 Baggage. All rights reserved | Design by
                <a href="#"> Helmi Tazkia.</a>
            </p>

        </div>
        <!-- //copyright -->

</body>

</html>