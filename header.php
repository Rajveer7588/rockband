<?php 
    include "wocms/include/functions.php"; 
    session_start();
    if(isset($_POST['sign_in'])){
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        if($user_email != null && $user_password != null){

            $qry = "SELECT * FROM `user_login` WHERE email ='{$user_email}' AND password = '{$user_password}' AND status = 1";
        
            $data = mysqli_query($conn, $qry);
            
            $row = mysqli_num_rows($data);
            if($row > 0){
                $result = mysqli_fetch_assoc($data);
                $_SESSION["customer_login"] = $result;
    
            }
            else{
                ?>
                    <script>
                        alert("Sorry, Enter valid Email and Password");
                    </script>
                <?php
            }
        }
        
    }
    

    if(isset($_POST['sign_up'])){
        $img = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $username = test_input($_POST['username']);
        $phone = test_input($_POST['phone']);
        $email = test_input($_POST['email']);
        $password = test_input($_POST['password']);
        $con_password = test_input($_POST['con_password']);
        $default_addr = test_input($_POST['address']);
        $logo = str_replace(" ","-",$img);
        $status = 1;

        $ips = $_SERVER['REMOTE_ADDR'];


        //img size 71849

        if($logo !== null){
        $target_dir = "uploads/user_logo/";
        mkdir($target_dir);
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
        || $imageFileType == "gif" || $imageFileType == "webp" ){
            if ($_FILES["image"]["size"] <= 500000) {
                if (file_exists($target_file)) {
                    ?>
                        <script>
                            alert("Sorry, file already exists.");
                        </script>
                    <?php
                    unlink("uploads/user_logo/{$logo}");
                }
                if($password == $con_password){

                    $qry = "INSERT INTO `user_login`(`username`, `logo`, `email`, `password`, `con_password`, `default_addr`, `status`,`ip_addr`) VALUES ('{$username}','{$logo}','{$email}','{$password}','{$con_password}','{$default_addr}','{$status}','{$ips}')";
                    
                    $insert = mysqli_query($conn, $qry);
                    if($insert){
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                        ?>
                            <script>
                                alert("Your Registration successfull");
                                window.location.href("index.php");
                            </script>
                        <?php
                    }
                    else{
                        ?>
                        <script>
                            alert("Sorry, something went wrong");
                        </script>
                        <?php
                    }
                }
                else{
                    ?>
                            <script>
                                alert("Check you password");
                            </script>
                        <?php
                }

            }
            
            else{
                ?>
                    <script>
                        alert("Sorry, your file is too large.");
                    </script>
                <?php
                $uploadOk = 0;
            }
        }
        else{
            echo "Sorry, Support only jpeg,jpg,webp and png.";
            $uploadOk = 0;
        }

    }
}
    
    
 ?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Events</title>
    <link rel="shortcut icon" href="img/favicon.png" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Playfair+Display:ital@0;1&display=swap">
    <link rel="stylesheet" href="css/plugins.css"/>
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

    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <!-- Logo -->
        <div class="logo-wrapper navbar-brand valign">
            <a href="index.php">
                <!--<div class="logo"> <img src="img/logo.png" class="logo-img" alt=""> </div>-->
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="icon-bar"><i class="ti-align-justify"></i></span> </button>
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"> <a class="nav-link active" href="index.php"> Home</a>
                    <!--<ul class="dropdown-menu last">-->
                    <!--    <li class="dropdown-item"><a href="index.php">Home Layout 1</a></li>-->
                    <!--    <li class="dropdown-item active"><a href="index2.php">Home Layout 2</a></li>-->
                    <!--</ul>-->
                </li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="cities.php">Cities</a></li>
                <li class="nav-item"><a class="nav-link" href="artist.php">Artists</a></li>
                <li class="nav-item dropdown"><a class="nav-link" href="#">Merchandise</a>
                    <ul class="dropdown-menu last">
                        <li class="dropdown-item"><a href="merchandise.php">Apparel</a></li>
                        <li class="dropdown-item"><a href="#">Awards</a></li>
                        <li class="dropdown-item"><a href="#">Bags</a></li>
                        <li class="dropdown-item"><a href="#">Drinkware</a></li>
                        <li class="dropdown-item"><a href="#">Fun</a></li>
                        <li class="dropdown-item"><a href="#">Headwear</a></li>
                        <li class="dropdown-item"><a href="#">Health</a></li>
                        <li class="dropdown-item"><a href="#">Office</a></li>
                        <li class="dropdown-item"><a href="#">Tech</a></li>
                        <li class="dropdown-item"><a href="#">Writing</a></li>
                        <li class="dropdown-item"><a href="#">More</a></li>
                    </ul>
                
                </li>
                <li class="nav-item"><a class="nav-link" href="help.php">Help</a></li>
                <?php
                    if(isset($_SESSION["customer_login"]["email"])){
                        ?>
                        <li class="nav-item"><a class="nav-link" href="#"><img src="uploads/user_logo/<?= $_SESSION["customer_login"]["logo"]; ?>" alt=""></a></li>
                        <?php
                    }
                    else{
                        ?>
                            <li class="nav-item"><a class="nav-link" href="#"><img src="uploads/avtar.jpg" alt=""></a></li>
                        <?php
                    }
                ?>
                
                <li class="nav-item"><button class="btn btn-outline-success nav-link" onclick="openPopup()" float="right">Sign In</button></li>
            </ul>
        </div>
    </div>
</nav>