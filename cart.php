
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
    <div class="banner-header2 section-padding valign bg-img bg-fixed" data-overlay-dark="3" data-background="uploads/slidebanner/cart-banner.png">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                   <!-- <h6>Latest News</h6> -->
                    <h1><span>Cart Details</span></h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog -->
    <section class="cart cart-section-padding">
        <div class="container">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <form action="" method="post">
                        <table>
                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Quantiy</th>
                                <th scope="col">Rates</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td data-label="Image"><img src="uploads/avtar.jpg" alt="cart"></td>
                                <td data-label="Product Name">T-shirts</td>
                                <td data-label="Quantity" class="qty_row"><button class="btn btn-success sub_btn" type="button">-</button><input type="text" name="quantity" class="qty" value="8" readonly><button class="btn btn-success add_btn" type="button">+</button></td>
                                <td data-label="Rates">$300</td>
                                <td data-label=""><button type="button" class="btn btn-danger">Remove</button></td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="2" class="order_rate">
                                    <h4>Order Summery</h4>
                                    <ul>
                                        <li>Sub Total</li>
                                        <li class="rates">$500</li>
                                    </ul>
                                    <ul>
                                        <li>Shipping Charge</li>
                                        <li class="rates">$500</li>
                                    </ul>
                                    <ul>
                                        <li>Total Amount</li>
                                        <li class="rates">$500</li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <button class="btn btn-success checkout_btn" type="button">Checkout</button>
                                        </li>
                                    </ul>
                                </td>
                                
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
           
            <!-- <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="order2du3">
                        <h4>Order Summery</h4>
                        </hr>
                        <div class="cart_info">
                            <ul>
                                <li>Sub Total</li>
                                <li class="data">$500</li>
                            </ul>
                            <ul>
                                <li>Shipping Charge</li>
                                <li class="data">$100</li>
                            </ul>
                            <ul>
                                <li>Total Amount</li>
                                <li class="data">$100</li>
                            </ul>
                        </div>
                        <button class="btn btn-outline-success checkout-btn">Checkout</button>
                    </div>
                </div>
            </div>-->
        </div>
    </section>
   

    <!-- Footer -->
    <?php include "footer.php"; ?>
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

   
</body>
</html>