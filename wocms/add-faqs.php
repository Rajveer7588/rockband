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

<?php include_once('include/functions.php');?>

<?php include_once('include/topbar.php'); ?>

<div class="wrapper">

<?php include_once('include/sidebar.php'); ?>

<?php $base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/' ;?>

<?php

$admin_id = $_SESSION['admin_id'];

  $fetch = mysqli_query($conn,"SELECT * FROM faqs WHERE admin_id='".$admin_id."'");

	$num = mysqli_num_rows($fetch);

  while($show = mysqli_fetch_assoc($fetch))

  {

	$profile_img = $show['image'];

	$heading = $show['heading'];

	$description = $show['description'];

	$about_short_content = $show['about_short_content'];

  }

?>

  <div class="content-wrapper">

    <section class="content-header">

      <h1>Faqs<small>Update your Content Easily</small> </h1>

      <hr>

      <form method="post" action="" enctype="multipart/form-data">

      <div class="row">

     <div class="col-md-3">

     <div class="image_holder">

     <?php if(@$profile_img==""){ ?>

     <img src="framework/img/user2-160x160.jpg">

     <?php }else{ ?>

      <img src="../uploads/faqs/<?php echo @$profile_img; ?>">

     <?php } ?>

     <div class="form-group">

    <input type="file" name="image" id="about_profile_img">
    <input type="hidden" name="old_image" value="<?php echo @$profile_img; ?>">

  </div>

     </div>

     </div>

       

       </div>

        

        <div class="form-group">

        <label for="exampleInputEmail1">Heading</label>

        <input type="text" name="heading" class="form-control" id="about_heading" placeholder="Heading" value="<?php echo @$heading ?>">

        </div>

        <div class="form-group">

        <label for="exampleInputEmail1">Content</label>

         <div class="editor">

        <textarea class="ckeditor" name="description"><?php echo @$description ?></textarea>

        </div>

        </div>

        <!-- <div class="form-group">

            <label for="exampleInputEmail1">How It Performs Page Content</label>

            <div class="editor">

              <textarea class="ckeditor" name="about_short_content"><?php @$about_short_content ?></textarea>

            </div>

        </div> -->
        <div class="ui_button">

        <button type="submit" name="about_submit" class="btn btn-default"><i class="fa fa-paper-plane-o"></i> Submit</button>

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
if(isset($_POST['about_submit']))
{

    $admin_id=test_input($_SESSION['admin_id']);
    $heading=test_input($_POST['heading']);
    $description=test_input(str_replace("'","@@",$_POST['description']));
    // $about_short_content=test_input($_POST['about_short_content']);
    $name=$_FILES['image']['name'];
    $type=$_FILES['image']['type'];
    $size=$_FILES['image']['size'];
    $tmp=$_FILES['image']['tmp_name'];
    $ip = getClientIP();
    $target_dir = '../uploads/faqs/';

    $old_file = $_POST['old_image'];

    if($name !== "" )
    {
      $name=$_FILES['image']['name'];
    }
    else{
      $name = $_POST['old_image'];
    }
	
    if (!file_exists($target_dir)) {
      mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($name);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    $file_array = explode(".",$name);

	  if(count($file_array)==2){
		
      if( in_array($imageFileType,$extensions_arr) ){
  
        // Convert to base64 
        $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
        $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
        $insert = mysqli_query($conn,"SELECT * FROM faqs WHERE admin_id=$admin_id");
        $row = mysqli_num_rows($insert);
        
        if($row==0)
        {

        //   echo "INSERT into faqs(admin_id,image,heading,description,inserted_date,ip)
        //   VALUES('".$admin_id."','".$name."','".$heading."','".$description."', now() ,'".$ip."')";
        //   die;

        $insert = mysqli_query($conn,"INSERT into faqs(admin_id,image,heading,description,inserted_date,ip)
          VALUES('".$admin_id."','".$name."','".$heading."','".$description."', now() ,'".$ip."')");
        // Upload file
        move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);
        
        echo "<script>alert('Inserted Successfully.');</script>";
          ?>
            <script>
            window.location = '<?php echo $_SERVER["REQUEST_URI"] ?>';
            </script>
          <?php	
        }	

        else if($row > 0)
        {
        //  echo "UPDATE faqs SET about_profile_img='".$name."' , heading='".$heading."', description='".$description."', about_short_content='".$about_short_content."', about_update_date=now(), about_ip='".$ip."' WHERE about_id='1' AND admin_id='".$admin_id."'";

        // die;
          $update = mysqli_query($conn,"UPDATE faqs SET image='".$name."' , heading='".$heading."', description='".$description."', updated_date=now(), ip='".$ip."' WHERE id='1' AND admin_id='".$admin_id."'") or (mysqli_error($conn));
          move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name);
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
      }	
	  }
  }
?>