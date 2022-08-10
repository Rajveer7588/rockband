<?php include_once('session_destroy.php') ;
      include_once('include/functions.php');
	$updated_id = $_REQUEST['id'];
	$admin_id=test_input($_SESSION['admin_id']);
	// echo "SELECT * FROM `category` WHERE id ='".$updated_id."' AND admin_id='".$admin_id."'";

	if(!empty($updated_id)){
		$fetch12 = mysqli_query($conn,"SELECT * FROM `artist_category` WHERE id ='".$updated_id."' AND admin_id='".$admin_id."'");
		@$num12 = mysqli_num_rows($fetch12);

		$show12 = mysqli_fetch_assoc($fetch12);

		$heading = $show12['heading'];
		
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="framework/js/ajax.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.0.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Category</title>
<link href="framework/css/import.css" rel="stylesheet">

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include_once('include/topbar.php'); ?>
<?php include_once('include/sidebar.php'); ?>
<?php $base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/' ;?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<div class="content-wrapper">
		<section class="content-header">
			<h1><small>Add Product Category Easily</small> </h1>
			<hr>
			<form method="post" action="" enctype="multipart/form-data">

			<div class="form-group">
				<label for="exampleInputEmail1">Category Image</label>
				<input type="file" name="category_image" class="form-control" id="category_image" placeholder=" Choose category image">
				<input type="hidden" name="old_image" class="form-control" id="cat_old_image">
				</div>
				<div class="form-group">
				<label for="exampleInputEmail1">Category Name</label>
				<input type="text" name="heading" class="form-control" id="property_heading" placeholder=" Enter new category" value="<?= $heading; ?>" required/>
				</div>
				
				<p class="text-center">
				<button type="submit" name="submit" class="btn btn-success btn-outline-rounded green"> Add Category<span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></button>
				</p>
			</form>
		<?php
			//  echo "SELECT * FROM aid_listing WHERE admin_id='".$admin_id."' and property_id not in (7,15,8)";

			$fetch11 = mysqli_query($conn,"SELECT * FROM `artist_category` WHERE admin_id='".$admin_id."'");
			@$num11 = mysqli_num_rows($fetch11);
			if($num11>0)
			{
			?>

			<h3 class="head text-center">Added Category</h3>
			<div class="ta_pad">
				<table class="responsive-table">
				
					<thead>
					<tr>
						<th scope="col">S.No </th>
						<th scope="col">category</th>
						<!--<th scope="col">status</th>-->
						<th scope="col">Date</th>
						<th scope="col">Delete</th>
						<th scope="col">Edit</th>
					</tr>
					</thead>
			
					<tbody>
						<?php
							$i=1;
							while($show11 = mysqli_fetch_assoc($fetch11))
							{
							$id = $show11['id'];
							$heading=$show11['heading'];
							$status=$show11['status'];
							$added_date=$show11['inserted_date'];	  
							?>
							<tr>
								<td><?php echo $i ?></td>
								<td data-title="category"><?php echo @$heading; ?> </td>
								<!--<td data-title="status"><?php echo @$status ?></td>-->
								<td data-title="date" ><?php echo @$added_date; ?></td>
						
								<form action="" method="post">
								<td data-title="Delete" ><input type="hidden" name="delete_property" value="<?php echo @$id; ?>"><button type="submit" name="delete_pro_button" onClick="return check()"><i class="fa fa-trash"></i></button></td>
								</form>
								<form method="post" action="add-artist-category.php?id=<?php echo $id; ?>">
								<td data-title="Edit" ><input type="hidden" name="edit_aid" value="<?php echo @$id; ?>"><button type="submit" name="edi_aid_button"><i class="fa fa-pencil"></i></button></td>
								</form>
							</tr>
							<?php
							$i++;
						}
						?>  
					</tbody>
				</table>
			</div>
			<?php
			}
		?>
		</section>
	</div>
</div>
<script src="framework/js/bootstrap.min.js"></script> 
<script src="framework/js/custom.js"></script> 
<script src="framework/js/app.min.js"></script> 
<script src="framework/ckeditor/ckeditor.js"></script>
<script src="framework/js/dropdown.js"></script> 
<script src="framework/js/select.js"></script>
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
if(isset($_POST['submit']))
{

	$admin_id=test_input($_SESSION['admin_id']);
	$heading=test_input($_POST['heading']);
	$category_image  = str_replace(" ","-",$_FILES['category_image']['name']);
	$type  = $_FILES['category_image']['type'];
	$size  = $_FILES['category_image']['size'];
	$tmp_name  = $_FILES['category_image']['tmp_name'];

	$target_dir = "../uploads/artist_category/";
	if(isset($target_dir)){
	@mkdir( $target_dir, 0755);
	}

	if(!empty($category_image)){
		$image_name = $category_image;
	}
	else{
		$image_name = $_POST['old_image'];
	}

	$target_file =$target_dir.$image_name;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	
	$status = "1";

		if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "png" && $imageFileType != "webp"){
			echo "Please choose .jpg, . png, .gif, .webp to upload!!!";
		}
		else{
			if($size < 1572864){
				if(file_exists($target_file)) {
					?>
						<script>
							alert("Sorry, this file already exits");
						</script>
					<?php
				}
				else{
					move_uploaded_file($_FILES['category_image']['tmp_name'], $target_file);
					$upload = 1;
				}
				}
				else{
				$upload = 0;
					?>

						<script>

						window.location = '<?php echo $_SERVER["REQUEST_URI"] ?>';
						alert("File Size is greate than 1MB");
							
						</script>

					<?php
				
				}
		}

		$ip = getClientIP();
		if(empty($updated_id) && $upload == 1){
            // if your have needed image upload then you can remove this code inside comment
            if($updated_id == null && $updated_id == ""){
            
                $insert = mysqli_query($conn,"INSERT into `artist_category`(admin_id,heading, category_image,status,inserted_date,ip) VALUES('".$admin_id."','".$heading."', '".$image_name."', '".$pro_status."', now() ,'".$ip."')");

                // $insert = mysqli_query($conn,"INSERT into `artist_category`(admin_id,heading, status,inserted_date,ip) VALUES('".$admin_id."','".$heading."', '".$pro_status."', now() ,'".$ip."')");
            
                if($insert)
                {
                    echo "<script>alert('Add Successfully.');</script>";
                    ?>
                    <script>
                    window.location = 'add-artist-category.php';
                    </script>
                    <?php
                }
                else
                {
                    echo "<script>alert('Something Went Wrong.');</script>";		
                }
            //========if need upload image then remove this bracket inside comment 
            }    
            //========And uncomment upper code
		}
		else{
			if($upload == 1){
                $select_data = mysqli_query($conn, "SELECT * FROM `category` WHERE id = $id");
                $row = mysqli_fetch_assoc($select_data);
                $image =$row['category_image'];
                
				unlink("../uploads/artist_category/".$image);
            }
         //========if need upload image then remove this bracket inside uncomment code 
       		else{
        //========
			$insert = mysqli_query($conn, "UPDATE `artist_category` SET `admin_id`='$admin_id',`heading`='".$heading."', `category_image`='".$image_name."', `inserted_date`= now(),`ip`='".$ip."' WHERE `id`='$updated_id' AND `admin_id`='$admin_id' ");
			// $insert = mysqli_query($conn, "UPDATE `artist_category` SET `admin_id`='$admin_id',`heading`='".$heading."', `inserted_date`= now(),`ip`='".$ip."' WHERE `id`='$updated_id' AND `admin_id`='$admin_id' ");
				if($insert)
				{
					echo "<script>alert('Updated Successfully.');</script>";
					?>
					<script>
					window.location = 'add-fleet-category.php';
					</script>
					<?php
				}
				else
				{
					echo "<script>alert('Something Went Wrong.');</script>";		
				}
//========if need upload image then remove this bracket inside comment 
			}	
//========if need upload image then remove this bracket inside comment 
		}
		
	}

if(isset($_POST['delete_pro_button']))
{
	$delete_id = $_POST['delete_property'];
	$admin_id = $_SESSION['admin_id'];
	
	$delete = mysqli_query($conn, "DELETE FROM `artist_category` WHERE id = '".$delete_id."' AND admin_id=$admin_id");
	if($delete)
		{
			echo "<script>alert('Deleted Successfully.');</script>";
			?>
			<script>
			window.location = '<?php echo $_SERVER["REQUEST_URI"] ?>';
            </script>
            <?php
		}
}
?>