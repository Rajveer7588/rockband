<?php include_once('session_destroy.php') ;?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin</title>
<link href="framework/css/import.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script src="framework/js/ajax.js"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include_once('include/topbar.php'); ?>
  <?php include_once('include/sidebar.php'); ?>
  <?php include_once('include/functions.php');?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Dashboard <small>Update your Content Easily</small> </h1>
      <hr>
      <form>
      <div class="row">
      
    <!--<div class="col-md-4">
        <div class="dash wow zoomIn">
        <div class="thumb"> 
        <a href="home.php">
        <img src="framework/img/home.jpg" alt="image1">
        <h1>Home</h1>
        </a>
        </div>
        </div>
     </div>-->
     
    <div class="col-md-4">
        <div class="dash wow zoomIn">
        <div class="thumb"> 
        <a href="about.php">
        <img src="framework/img/about.jpg" alt="image1">
        <h1>About</h1>
        </a>
        </div>
        </div>
     </div>
     
     <div class="col-md-4">
        <div class="dash wow zoomIn">
        <div class="thumb"> 
        <a href="property_listing.php">
        <img src="framework/img/prop_details.jpg" alt="image1">
        <h1>Property</h1>
        </a>
        </div>
        </div>
     </div>
     
     <div class="col-md-4">
        <div class="dash wow zoomIn">
        <div class="thumb"> 
        <a href="contact_details.php">
        <img src="framework/img/contact.jpg" alt="image1">
        <h1>Contact</h1>
        </a>
        </div>
        </div>
     </div>

      <div class="col-md-4">
        <div class="dash wow zoomIn">
        <div class="thumb"> 
        <a href="review.php">
        <img src="framework/img/review.jpg" alt="image1">
        <h1>Reviews</h1>
        </a>
        </div>
        </div>
     </div>
     
     <div class="col-md-4">
        <div class="dash wow zoomIn">
        <div class="thumb"> 
        <a href="social_links.php">
        <img src="framework/img/social.jpg" alt="image1">
        <h1>Social Links</h1>
        </a>
        </div>
        </div>
     </div>
  
  	 <div class="col-md-4">
        <div class="dash wow zoomIn">
        <div class="thumb"> 
        <a href="password.php">
        <img src="framework/img/login_details.png" alt="image1">
        <h1>Login Details</h1>
        </a>
        </div>
        </div>
     </div>
  
  </div>
  
        
        
      </form>
      
    </section>
  </div>
</div>
<script src="framework/js/bootstrap.min.js"></script> 
<script src="framework/js/custom.js"></script> 
<script src="framework/js/app.min.js"></script> 
<script src="framework/ckeditor/ckeditor.js"></script>
<script src="framework/js/dropdown.js"></script>
<script src="framework/js/select.js"></script>
   <script src="framework/js/wow.js"></script>
<script>
        new WOW().init();
        </script>
<script>
			(function() {
				[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx(el);
				} );
			})();
		</script>
        		

</body>
</html>
<?php
$pro_fetch = mysqli_query($conn, "SELECT * FROM property_details");
$pro_row = mysqli_fetch_assoc($pro_fetch);
$property_id = $pro_row['property_id'];
$admin_id = $_SESSION['admin_id'];
$ip = getClientIP();
if($property_id==null)
{
	$pro_add = mysqli_query($conn, "INSERT INTO property_details(property_id,admin_id,pro_det_insert_date,pro_det_ip) VALUES(1, '".$admin_id."' ,now(), '".$ip."')");

}
?>