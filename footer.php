
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
                    <input type="submit" name="submit" value="Sign In" class="btn btn-success popup-button"> 
                    <br>
                    <div class="col-md-12 col-sm-12">
                        <span>If you have not registered than <a href="">click here</a></span>
                    </div>

                  
                </div>
            </form>
          
        </div>
       
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
                        <p class="footer-bottom-copy-right">© Copyright 2022 by <a href="https://1.envato.market/DuruThemes" target="_blank">DuruThemes.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
let mymodelpopup = document.getElementById("mypopup_main");
 function openPopup(){
    mymodelpopup.classList.add("open-popup")
 }
 function closePopup(){
    mymodelpopup.classList.remove("open-popup")
 }
</script>