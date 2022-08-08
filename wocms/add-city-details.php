<?php include_once('session_destroy.php') ;
      include_once('include/functions.php');

    $product_id = $_GET['id'];
  
    $fetch_cat = mysqli_query($conn, "SELECT * FROM `city_category` WHERE admin_id = 1");



    $admin_id = $_SESSION['admin_id'];

    $fetch = mysqli_query($conn,"SELECT * FROM `city_details` WHERE id = '".$product_id."'");

    $num = mysqli_num_rows($fetch);

    while($show = mysqli_fetch_assoc($fetch))

    {
    
    $category_id = $show['category_id'];

    $image = $show['image'];

    $heading = $show['heading'];

    $description = $show['description'];

    $short_content = $show['short_content'];

    $product_size = $show['product_size'];

    }

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Admin</title>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

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



<?php include_once('include/topbar.php'); ?>

<div class="wrapper">

<?php include_once('include/sidebar.php'); ?>

<?php $base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/' ;?>

  <div class="content-wrapper">

    <section class="content-header">
      <div class="down_header">
        <h1>City <small>Update your Content Easily</small></h1>
        <a href="add-city-category.php" class="cat_button">Add New Category</a>
      </div>
      
      

      <hr>

      <form method="post" action="" enctype="multipart/form-data">

      <div class="row">
        <div class="col-md-4 col-lg-4">
          <div class="image_holder">
            <div class="form-group">
              <!-- <label for="browser" class="form-label">Choose Category</label> -->
                <select class="form-control" name="category_id">
                <option value="select">Select City</option>
                  <?php
                   while($res = mysqli_fetch_assoc($fetch_cat)){
                     ?>
                    <option value="<?= $res['id']; ?>" <?php if($res['id'] == $category_id){echo "selected";} ?>><?= $res['heading']; ?></option>
                    <?php
                   }
                  ?>
                  
                </select>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-4 col-lg-4">
          <div class="image_holder">
            <div class="form-group">
              <input type="text" name="product_size" value="<?= $product_size; ?>" class="form-control" placeholder="Enter Product Size">
            </div>
          </div>
        </div> -->
        <div class="col-md-4 col-lg-4">
          <div class="image_holder">
            <div class="form-group">
              <!-- <label for="browser" class="form-label">Choose Image</label> -->
              <input type="file" name="image" class="form-control" id="about_profile_img">
              <input type="hidden" name="old_image" value="<?php echo @$image ?>">
            </div>
          </div>
            <?php if(@$image==""){ ?>

                <img src="framework/img/user2-160x160.jpg" width="200" height="200">

                <?php }else{ ?>

                  <img src="../uploads/city/<?= $category_id ?> /<?php echo @$image ?>" width="200" height="200">

                <?php } ?>
        </div>
      </div>

        

        <div class="form-group">

            <label for="exampleInputEmail1">Heading</label>

            <input type="text" name="heading" class="form-control" id="about_heading" placeholder="Heading" value="<?php echo @$heading ?>">

        </div>

        <div class="form-group">

            <label for="exampleInputEmail1">Add Short Content</label>

            <div class="editor">

              <textarea class="ckeditor" name="short_content"><?php echo @$short_content ?></textarea>

            </div>

        </div>

        <div class="form-group">

          <label for="exampleInputEmail1">Description</label>

          <div class="editor">

          <textarea class="ckeditor" name="description"><?php echo @$description ?></textarea>

          </div>

        </div>

        
        <div class="ui_button">

        <button type="submit" name="about_submit" class="btn btn-default"><i class="fa fa-paper-plane-o"></i> Submit</button>

        </div>

      </form>

      

    </section>
        <?php
			//  echo "SELECT * FROM aid_listing WHERE admin_id='".$admin_id."' and property_id not in (7,15,8)";
			
    	    $limit = 5;  // Number of entries to show in a page.
        // Look for a GET variable page if not found default is 1.     
            if (isset($_GET['page'])) { 
              $pn  = $_GET["page"]; 
            } 
            else { 
              $pn=1; 
            };  
      
            $start_from = ($pn-1) * $limit;  
          
            $fetch_pro = mysqli_query($conn,"SELECT * FROM `city_details` LIMIT $start_from, $limit");
          

// 			$fetch_pro = mysqli_query($conn,"SELECT * FROM `services` WHERE admin_id='".$admin_id."'");
			@$nums = mysqli_num_rows($fetch_pro);
		?>

			<h3 class="head text-center">Product Details</h3>
			<div class="ta_pad">
				<table class="responsive-table">
				
					<thead>
					<tr>
						<th scope="col">S.No </th>
						<th scope="col">City Name</th>
						<th scope="col">Date</th>
						<th scope="col">Delete</th>
						<th scope="col">Edit</th>
					</tr>
					</thead>
			
					<tbody>
                        <?php
						$i=1;
						while($pro_result = mysqli_fetch_assoc($fetch_pro))
						{
						$id = $pro_result['id'];
						$heading=$pro_result['heading'];
						$status=$pro_result['status'];
						$added_date=$pro_result['inserted_date'];	  
						?>
						<tr>
							<td><?php echo $i ?></td>
							<td data-title="category"><?php echo @$heading; ?> </td>
							<td data-title="date" ><?php echo @$added_date; ?></td>
					
							<form action="" method="post">
							<td data-title="Delete" ><input type="hidden" name="delete_property" value="<?php echo @$id; ?>"><button type="submit" name="delete_pro_button" onClick="return check()"><i class="fa fa-trash"></i></button></td>
							</form>
							<form method="post" action="add-city-details.php?id=<?php echo $id; ?>">
							<td data-title="Edit" ><input type="hidden" name="edit_aid" value="<?php echo @$id; ?>"><button type="submit" name="edi_aid_button"><i class="fa fa-pencil"></i></button></td>
							</form>
						</tr>
                    
							<?php
							$i++;
						    }
						    ?>  
				    </tbody>
				</table>
				    <ul class="pagination">
                      <?php  
                      	if($nums>0)
            			{
                            $sql1 = "SELECT COUNT(*) FROM services";  
                            $rs_result = mysqli_query($conn,$sql1);  
                            $row = mysqli_fetch_row($rs_result);  
                            $total_records = $row[0];  
                              
                            // Number of pages required.
                            $total_pages = ceil($total_records / $limit);     
                            if($pn >=2){
                            ?>
                                 <li class='active'><a href="add-city-details.php?page=<?= $pn-1; ?>" id="pagination_txt">Prev</a></li>
                            <?php
                            }
                            for ($i=1; $i<=$total_pages; $i++) {
                              if ($i==$pn) {
                                ?>
                                  <li class='active'><a href='add-city-details.php?page=<?= $i ?>' id="pagination_txt"><?php echo $i; ?></a></li>
                                <?php
                              }            
                              else{
                                ?>
                                    <li><a href='add-city-details.php?page=<?= $i ?>' id="pagination_txt">
                                                                    <?php echo $i; ?></a></li> 
                                <?php
                                } 
                            }
                            if($pn<=$total_pages){
                            ?>
                                 <li class='active'><a href="add-city-details.php?page=<?= $pn+1; ?>" id="pagination_txt">Next</a></li>
                            <?php
                            }
            			}
                        ?>
                  </ul>
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
    $category_id=test_input($_POST['category_id']);
    $heading=test_input($_POST['heading']);
    $description=test_input(str_replace("'","@@",$_POST['description']));
    $short_content=test_input($_POST['short_content']);
    $product_size=test_input($_POST['product_size']);
    $image=$_FILES['image']['name'];
    $type=$_FILES['image']['type'];
    $size=$_FILES['image']['size'];
    $tmp=$_FILES['image']['tmp_name'];
    $ip = getClientIP();
    $target_dir = '../uploads/city/'.$category_id.'/';

    $old_file = $_POST['old_image'];

    if($image !== "" )
    {
      $image=$_FILES['image']['name'];
    }
    else{
      $image = $_POST['old_image'];
    }
	
    if (!file_exists($target_dir)) {
      mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png", "webp", "gif");
    $file_array = explode(".",$image);

	  if(count($file_array)==2){
		
      if( in_array($imageFileType,$extensions_arr) ){
  
        // Convert to base64 
        $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
        $image_source = 'data:image/'.$imageFileType.';base64,'.$image_base64;
        $insert = mysqli_query($conn,"SELECT * FROM city_details WHERE admin_id=$admin_id");
        $row = mysqli_num_rows($insert);
        
        if(empty($product_id))
        {

          // echo "INSERT into services(admin_id,image,heading,description,short_content,inserted_date,service_ip)
          // VALUES('".$admin_id."','".$image."','".$heading."','".$description."', '".$short_content."', now() ,'".$ip."')";
          // die;

        $insert = mysqli_query($conn,"INSERT into city_details(admin_id,category_id,image,heading,description,short_content,product_size,inserted_date,service_ip)
          VALUES('".$admin_id."', '".$category_id."','".$image."','".$heading."','".$description."', '".$short_content."', '".$product_size."', now() ,'".$ip."')");
        // Upload file
        move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image);
        
        echo "<script>alert('Inserted Successfully.');</script>";
          ?>
            <script>
            window.location = '<?php echo $_SERVER["REQUEST_URI"] ?>';
            </script>
          <?php	
        }	

        else
        {
        //  echo "UPDATE services SET image='".$image."' , heading='".$heading."', description='".$description."', short_content='".$short_content."', about_update_date=now(), service_ip='".$ip."' WHERE id='1' AND admin_id='".$admin_id."'";

        // die;
          $update = mysqli_query($conn, "UPDATE city_details SET category_id= '".$category_id."', image='".$image."' , heading='".$heading."', description='".$description."', short_content='".$short_content."', product_size= '".$product_size."', updated_date=now(), service_ip='".$ip."' WHERE id='1' AND admin_id='".$admin_id."'") or (mysqli_error($conn));
          move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image);
          if($update==true)
          {
            echo "<script>alert('Updated Successfully.');</script>";
            ?>
              <script>
              window.location = '<?php echo $hostname."wocms/add-city-details.php" ?>';
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

