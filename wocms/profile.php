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
<?php include_once('include/functions.php');?>
<?php include_once('include/topbar.php'); ?>
<?php include_once('include/sidebar.php'); ?>
<?php $base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/' ;?>
<?php
$admin_id = $_SESSION['admin_id'];
  $fetch = mysqli_query($conn,"SELECT * FROM profile_details WHERE admin_id='".$admin_id."'");
	$num = mysqli_num_rows($fetch);
  while($show = mysqli_fetch_assoc($fetch))
  {
	$profile_img = $show['profile_img'];
	$profile_name=$show['profile_name'];
	$website_name=$show['website_name'];
  }
?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Profile <small>Update your Profile Easily</small> </h1>
      <hr>
      <form method="post" action="" enctype="multipart/form-data">
     <div class="row">
     <div class="col-md-3 col-md-offset-4">
     <div class="image_holder">
      <?php if(@$profile_img==""){ ?>
     <img src="framework/img/user2-160x160.jpg">
     <?php }else{ ?>
      <img src="../uploads/profile/<?php echo @$profile_img ?>">
     <?php } ?>
     <div class="form-group">
    <input type="file" name="image" id="profile_image">
    <input type="hidden" name="oldimage"  value="<?=$profile_img; ?>">
  </div>
     </div>
     </div>
       </div> 
        
        <div class="col-md-6">
        <div class="form-group">
        <label for="exampleInputEmail1">Name </label>
        <input type="text" name="profile_name"  class="form-control" id="profile_name" placeholder="Name" value="<?php echo @$profile_name ?>">
        </div>
        </div>
        
        <div class="col-md-6">
        <div class="form-group">
        <label for="exampleInputEmail1">Website Name </label>
        <input type="text" name="website_name" class="form-control" id="website_name" placeholder="Website Name" value="<?php echo @$website_name ?>">
        </div>
        </div>
       
        
        <div class="ui_button">
        <button type="submit" name="profile_submit" class="btn btn-default"><i class="fa fa-paper-plane-o"></i> Submit</button>
        </div>
      </form>
      
    </section>
  </div>
</div>
<script src="framework/js/bootstrap.min.js"></script> 
<script src="framework/js/custom.js"></script> 
<script src="framework/js/app.min.js"></script> 
<script src="framework/ckeditor/ckeditor.js"></script>
</body>
</html>
<?php
if(isset($_POST['profile_submit']))
{

	$admin_id=test_input($_SESSION['admin_id']);
	$profile_name=test_input($_POST['profile_name']);
	$website_name=test_input($_POST['website_name']);
	$name=$_FILES['image']['name'];
	$type=$_FILES['image']['type'];
	$size=$_FILES['image']['size'];
	$tmp=$_FILES['image']['tmp_name'];
	
	if(!empty($name)){
        $profile_image = $name;
	}
	else{
	     $profile_image = test_input($_POST['oldimage']);
	}
	
	$ip = getClientIP();
	$target_dir = '../uploads/profile/';
	if (!file_exists($target_dir)){
    mkdir($target_dir, 0777, true);
	}
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	 
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$extensions_arr = array("jpg","jpeg","png","gif","webp");
	$file_array = explode(".",$name);
	
	$insert = mysqli_query($conn,"SELECT * FROM profile_details WHERE admin_id=$admin_id");
    $row = mysqli_num_rows($insert);
    
	        if( in_array($imageFileType,$extensions_arr) ){
                // Convert to base64 
                $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
                $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
  
  

                $insert = mysqli_query($conn,"SELECT * FROM profile_details WHERE admin_id=$admin_id");
                $row = mysqli_num_rows($insert);
            	if($row == 0)
            	{
            		$insert = mysqli_query($conn,"INSERT into profile_details(admin_id,profile_img,profile_name,website_name,profile_inst_date,profile_ip) VALUES('".$admin_id."','".$name."','".$profile_name."','".$website_name."', now() ,'".$ip."')");
            		move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);	
            	    echo "<script>alert('Inserted Successfully.');</script>";
                	?>
                	    <script>
                			window.location = '<?php echo $_SERVER["REQUEST_URI"] ?>';
                        </script>
                	<?php
            	}
            	if($row>0)
            	{
            		while($loop = mysqli_fetch_assoc($insert))
            		{
            			$del_file = $loop['profile_img'];

            			if($name == "" )
            			{
            				$name = $loop['profile_img'];
            			}
						else{
							unlink($target_dir.$del_file);
						}
            			$update = mysqli_query($conn,"UPDATE profile_details SET profile_img='".$name."' , profile_name='".$profile_name."', website_name='".$website_name."', profile_update_date=now(), profile_ip='".$ip."' WHERE profile_id='".$loop['profile_id']."' AND admin_id='".$admin_id."'") or (mysqli_error($conn));
            		 	move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);
            		 
            		}
            		if($update==true)
            		{
            			echo "<script>alert('Updated Successfully.');</script>";
            			?>
            			<script>
            			window.location = '<?php echo $_SERVER["REQUEST_URI"] ?>';
                        </script>
                        <?php
            		}
            		else
            		{
            			echo "<script>alert('Updatation Failed.');</script>";
            		}
            	}
			?>
			
			<script>
			window.location = '<?php echo $_SERVER["REQUEST_URI"] ?>';
            </script>
            <?php
		}
	}

?>