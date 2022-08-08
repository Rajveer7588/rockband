
<div class="mycoontener">
    <div class="mypopup_main" id="mypopup_main">
    <button class="close_button" onclick="closePopup()">X</button>
        <img src="uploads/avtar.jpg">
        <div class="col-md-12 col-sm-12">
           
            <form action="" method="post"> 
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="" placeholder="info@gmail.com">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="" placeholder=".................">
                        </div>
                    </div>

                    <input type="submit" name="sign_in" value="Sign In" class="btn btn-success popup-button"> 
                    <br>

                    <div class="col-md-12 col-sm-12">
                        <span>If you have not registered than <a onclick="show_reg()">click here</a></span>
                    </div>

                </div>
            </form>
          
        </div>
       
    </div>
</div>

<div class="reg_modal">
    <div class="main_modal" id="main_modal">
        <button class="close_button" onclick="closePopup()">X</button>
        <img src="uploads/avtar.jpg">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12 col-xs-12">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" value="">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-12 col-xs-12">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" value="">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-12 col-xs-12">
                        <div class="form-group">
                            <label for="phone">phone No</label>
                            <input type="text" name="phone" class="form-control" value="">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-12 col-xs-12">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" value="" placeholder="info@gmail.com">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-12 col-xs-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="" placeholder=".................">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-12 col-xs-12">
                        <div class="form-group">
                            <label for="con_password">Confirm Password</label>
                            <input type="password" name="con_password" class="form-control" value="" placeholder=".................">
                        </div>
                    </div>


                    
                    <div class="col-md-6 col-sm-12 col-12 col-xs-12">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" value="">
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-12 col-xs-12">
                    <input type="submit" name="sign_up" value="Sign Up" class="btn btn-success popup-button"> 
                   </div>
                    <br>
                    <!-- <div class="col-md-12 col-sm-12">
                        <span>If you have not registered than <a href="">click here</a></span>
                    </div> -->
                </div>
            </form>
        
    </div>
</div>

<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-column footer-about">
                        <h3 class="footer-title">Florya Events</h3>
                        <p class="footer-about-text">Hi, I’m Samantha, Eventsplanner and designer, loving life in the wonderful New York. The nestam acuam nec odio the elementum.</p>
                        <div class="footer-language"> <i class="lni ti-world"></i>
                            <select onchange="location = this.value;">
                                <option value="#0">English</option>
                                <option value="#0">German</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1">
                    <div class="footer-column footer-explore clearfix">
                        <h3 class="footer-title">Explore</h3>
                        <ul class="footer-explore-list list-unstyled">
                            <li><a href="about.php">About</a></li>
                            <li><a href="services.php">Services</a></li>
                            <li><a href="portfolio.php">Portfolio</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="blog.php">Blog</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footer-column footer-contact">
                        <h3 class="footer-title">Get in touch</h3>
                        <p class="footer-contact-text">1010 Broadway NY, New York 10001
                            <br>United States of America
                        </p>
                        <div class="footer-contact-info">
                            <p class="footer-contact-phone"><span class="ti-headphone-alt"></span>401-641-5421</p>
                            <p class="footer-contact-mail">bcole@edgemarks.com</p>
                        </div>
                        <div class="footer-about-social-list"> <a href="#"><i class="ti-instagram"></i></a> <a href="#"><i class="ti-twitter"></i></a> <a href="#"><i class="ti-youtube"></i></a> <a href="#"><i class="ti-facebook"></i></a> <a href="#"><i class="ti-pinterest"></i></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-bottom-inner">
                        <p class="footer-bottom-copy-right">© Copyright 2022 by <a href="https://www.websitesowner.com" target="_blank">WebsiteOwner</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    let mymodelpopup = document.getElementById("mypopup_main");
    let mainmodelpopup = document.getElementById("main_modal");
    function openPopup(){
        mymodelpopup.classList.add("open-popup")
    }
    function closePopup(){
        mymodelpopup.classList.remove("open-popup");
        mainmodelpopup.classList.remove("main-popup");
    }

    function show_reg(){
        mainmodelpopup.classList.add("main-popup");
        mymodelpopup.classList.remove("open-popup");

    }
</script>