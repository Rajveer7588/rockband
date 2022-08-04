
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Florya Weddings | Wedding & Event Planner</title>
    <link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" href="css/plugins.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144098545-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-144098545-1');
    </script>

</head>
<body>
    <!-- Preloader -->
    <div class="preloader-bg"></div>
    <div id="preloader">
        <div id="preloader-status">
            <div class="preloader-position loader"> <span></span> </div>
        </div>
    </div>
    <!-- Progress scroll totop -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Navbar -->
    <?php include "header.php" ?>
    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed" data-overlay-dark="4" data-background="img/slider/17.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-5 slider-text js-fullheight">
                    <div class="slider-text-inner">
                        <div class="desc">
                            <h4>Latest News</h4>
                            <h1>Wedding Blog</h1>
                            <p>Trouwtips, Inspiratie & Bruidsreportages lorem the turpis enesta mauris mis nec est risus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- arrow down -->
        <div class="arrow bounce text-center">
            <a href="#" data-scroll-nav="1" class=""> <i class="ti-arrow-down"></i> </a>
        </div>
    </div>
    <section class="top-section" data-scroll-index="1">
        <div class="container">
            <div class = "row">
                <div class="col-12">
                    <div class="list"><ul>
                        <li><a href="index.php">Home<a><span class="icon-bar"><i class="ti-angle-right"></i></span></li>
                        <li><a href="marchandise.php">ProductCategory</a><span class="icon-bar"><i class="ti-angle-right"></i></span></li>
                        <li>Product name</li>
                    </ul></div>
                </div>
            </div>
        </div>
    </section>
    <!--Product Edge -->
    <section class="product_edge" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="item">
                                <div class="post-img">
                                    <a href="post.html"> <img src="img/slider/18.jpg" alt=""> </a>
                                </div>
                                <div class="post-cont"> 
                                   <span class="category">12 Dec 2022 in <a href="#">Trouwtips</a></span>
                                    <h5><a href="post.html">5 Tips On How To Be The Best Groomsman Ever</a></h5>
                                    <div class="">
                                        <div class="tab">
                                            <button class="tablinks" onclick="openCity(event, 'London')">London</button>
                                            <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
                                            <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
                                        </div>
                                        <div id="London" class="tabcontent">
                                            <h3>London</h3>
                                            <p>London is the capital city of England.</p>
                                        </div>

                                        <div id="Paris" class="tabcontent">
                                            <h3>Paris</h3>
                                            <p>Paris is the capital of France.</p> 
                                        </div>

                                        <div id="Tokyo" class="tabcontent">
                                            <h3>Tokyo</h3>
                                            <p>Tokyo is the capital of Japan.</p>
                                        </div>
                                    </div>
                                    <div class="butn"><button class="btn btn-success form-buttton">Request Quote</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-md-4">
                    <div class="product_edge-sidebar row">
                        <div class="col-md-12">
                            <div class="widget search">
                                <form>
                                    <input type="text" name="search" placeholder="Type here ...">
                                    <button type="submit"><i class="ti-search" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="widget">
                                <form action="">
                                    <div class="widget-title">
                                        <div class="form-group">
                                            <label class="color" for="color">Select Quantity</label>
                                            <input type="number" name=quantity class="form-control" value="1">
                                        </div>


                                        <div class="form-group">
                                            <label class="color" for="color">Select Color</label>
                                            <select name="color" class="form-control" id="">
                                                <option value="red">red</option>
                                                <option value="blue">green</option>
                                                <option value="yello">Yellow</option>
                                                <option value="pink">pink</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="Imprint" for="Imprint"></label>
                                            <select name="imprint" class="form-control" id="">
                                                <option value="">Imprint</option>
                                                <option value="Addition  Location Run Charge Per Piece($.20)">Full Color Heat transfer Run Charge Per Unit</option>
                                                <option value="Addition  Location Run Charge Per Piece($.20)">Addition  Location Run Charge Per Piece($.20)</option>
                                            </select>
                                            <br>
                                            <select name="color" class="form-control" id="">
                                                <option value="" readonly>Jet Bottom Run Charges</option>
                                                <option value="Addition  Location Run Charge Per Piece($.20)">Full Color Heat transfer Run Charge Per Unit</option>
                                                <option value="Addition  Location Run Charge Per Piece($.20)">Addition  Location Run Charge Per Piece($.20)</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="color" for="color">Select Size</label>
                                            <select name="color" class="form-control" id="">
                                                <option value="small">small</option>
                                                <option value="mediaum">mediaum</option>
                                                <option value="large">large</option>
                                                <option value="XL">XL</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                        <div class="butn"><button class="btn btn-success form-buttton">Add To Cart</button> <button class="btn btn-success form-buttton">Buy Now</button></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h6>Categories</h6>
                                </div>
                                <ul>
                                    <li><a href="blog.html"><i class="ti-angle-right"></i>Apprael</a></li>
                                    <li><a href="blog.html"><i class="ti-angle-right"></i>Awards</a></li>
                                    <li><a href="blog.html"><i class="ti-angle-right"></i>Bags</a></li>
                                    <li><a href="blog.html"><i class="ti-angle-right"></i>Drinkware</a></li>
                                    <li><a href="blog.html"><i class="ti-angle-right"></i>Fun</a></li>
                                    <li><a href="blog.html"><i class="ti-angle-right"></i>HeadWear</a></li>
                                    <li><button type="button" class="btn btn-success sh_button">Show More</button></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="widget">
                                <div class="widget-title">
                                    <h6>Tags</h6>
                                </div>
                                <ul class="tags">
                                    <li><a href="#">Event</a></li>
                                    <li><a href="#">Wedding</a></li>
                                    <li><a href="#">Trouwtips</a></li>
                                    <li><a href="#">Inspiratie</a></li>
                                    <li><a href="#">Dream</a></li>
                                    <li><a href="#">Love</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include "footer.php" ?>

    <!-- jQuery -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.min.js"></script>
    <script src="js/modernizr-2.6.2.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.isotope.v3.0.2.js"></script>
    <script src="js/pace.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scrollIt.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.magnific-popup.js"></script>
    <script src="js/YouTubePopUp.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/custom.js"></script>

    <script>
        function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        }
    </script>   
   
</body>
</html>