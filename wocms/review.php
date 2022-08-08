<?php include_once('session_destroy.php') ;
error_reporting(0);
?>
<?php include_once('include/db.php') ;?>
  <?php include_once('include/functions.php');?>
<?php
if(isset($_POST['home_details_submit']))
{
 	$admin_id = $_SESSION['admin_id'];
	$img_name=$_FILES['image']['name'];
	$type=$_FILES['image']['type'];
	$size=$_FILES['image']['size'];
	$tmp=$_FILES['image']['tmp_name'];
	$c_name=test_input($_POST['c_name']);
	$address=test_input($_POST['address']);
	$c_review=$_POST['c_review'];
	$c_place=test_input($_POST['c_place']);

	$folder_path = '../uploads/review/';
	if (!file_exists($folder_path)) {
    mkdir($folder_path, 0777, true);
	}
	 
	if(($_FILES["image"]["type"] == "image/webp")||
	($_FILES["image"]["type"] == "image/gif") || 
	($_FILES["image"]["type"] == "image/jpeg") || 
	($_FILES["image"]["type"] == "image/png") || 
	($_FILES["image"]["type"] == "image/pjpeg") ||
	($img_name == "")
	){		
		function compress_image($source_url, $destination_url, $quality) {

			$info = getimagesize($source_url);

				if ($info['mime'] == 'image/jpeg')
						$image = imagecreatefromjpeg($source_url);

				elseif ($info['mime'] == 'image/gif')
						$image = imagecreatefromgif($source_url);

				elseif ($info['mime'] == 'image/png')
						$image = imagecreatefrompng($source_url);
				elseif ($info['mime'] == 'image/webp')
					$image = imagecreatefrompng($source_url);

				imagejpeg($image, $destination_url, $quality);
			return $destination_url;
		}
		if($size<=1572864) // 4 Mb
		{
			$file_array = explode(".",$img_name);
			if(count($file_array)==2){
			$targetFile =  $folder_path.$img_name;
			$filenames = compress_image($_FILES["image"]["tmp_name"], $targetFile, 80);
			$compress_size = filesize($folder_path);
			$insert = mysqli_query($conn,"INSERT into reviews_detail(admin_id,img,c_name,address,c_review,c_place,added_date) VALUES('".$admin_id."','".$img_name."','".$c_name."','".$address."','".$c_review."', '".$c_place."', now())");
				if($insert){
					move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);
				}
			}
		}
		else{
			echo "<script>alert('Size of image is greater than 4MB, Please insert image than 4 Mb.');</script>";
			?>
			<script>
			window.location = 'review.php';
			</script>
			<?php
		}
	}
	
	if($insert){
		echo "<script>alert('Inserted Successfully.');</script>";
		?>
		<script>
		window.location = 'review.php';
		</script>
		<?php
	}
	  
  }
//   Delete table record 

   if(isset($_POST['delete_rate_button']))
	{
		$delete_id = $_POST['delete_rate'];
		$dt = mysqli_query($conn, "SELECT * FROM reviews_detail WHERE id='".$delete_id."'");
		$dell = mysqli_fetch_assoc($dt);
		$del_file = $dell['img'];
		$delete = mysqli_query($conn, "DELETE FROM reviews_detail WHERE id=$delete_id");
		if($delete)
			{
				$FileName = '../uploads/review/'.$del_file;
				@chown($FileName,465); //Insert an Invalid UserId to set to Nobody Owner; for instance 465
				@unlink($FileName);
				echo "<script>alert('Deleted Successfully.');</script>";
				echo "<script>window.location = 'review.php'</script>";
			}
	}
?>  

<!-- End Delete query -->


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
	<link href="framework/css/import.css" rel="stylesheet">

	<script src="framework/js/ajax.js"></script>
	<script>
		function check()
		{
			var retVal= confirm(" Do you want to delete? ");
			if(retVal==true)
			{
				return true ;
			}
			else
			{
				return false ;
			}
		}

	</script>
	<script>
		$(document).ready(function(e) {
			$('#add_rev').hide();
			$('#add_areview').click(function(){
				var but = $('#add_areview').val();
					$('#add_rev').toggle(function(){
					if(but== 'Add New Review' )
						{
							$('#add_areview').val('Close X');
						}
					else
						{
							$('#add_areview').val('Add New Review');
							$('#add_rev').hide();
						}
				});
			return false;
			});
		})
	</script>

</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<?php include_once('include/topbar.php'); ?>
			<?php include_once('include/sidebar.php'); ?>
			<?php $base_url="http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/' ;?>
				<?php
				$admin_id = $_SESSION['admin_id'];
				?>

		
			<div class="content-wrapper">
				<section class="content-header">
					<h1>Customer Reviews<small>Add Reviews From Here</small> </h1>
					<hr>
					<input type="button" class="btn btn-success green" id="add_areview" value="Add New Review" style="margin:10px;"/>
					<div id="add_rev">
						<form method="post" action="" id="review_form" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-3">
									<div class="image_holder">
										<img src="framework/img/user2-160x160.jpg">
										<div class="form-group">
											<input type="file" name="image" id="about_profile_img">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Customer Name </label>
								<input type="text" name="c_name" class="form-control" id="cust_name" placeholder="Customer Name" />
								<div id="#error_firstname"></div>
							</div>

							<div class="form-group">
								<label for="exampleInputEmail1">Address </label>
								<input type="text" name="address" class="form-control" id="address" placeholder=" address"/>
							</div>

							<div class="editor">
							<label for="exampleInputEmail1">Customer Review</label>
							<textarea class="ckeditor" name="c_review" id="noticeMessage" ></textarea>
							</div>
							<div style="clear:both"></div>
							<p class="text-center">
								<button type="submit" name="home_details_submit" class="btn btn-success btn-outline-rounded green"> Submit <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></button>
							</p>
						</form>
					</div>
					<div class="ta_pad">
						<?php
						function prop_info($conn,$id) {
							$fetch22 = mysqli_query($conn,"SELECT * FROM property_listing where property_id ='".$id."'");
							$show22 = mysqli_fetch_assoc($fetch22);					
							return $show22['property_heading'];
						}
						$admin_id = $_SESSION['admin_id'];
						$per_page= 5; // number of user to show
						$page_query=mysqli_query($conn,"SELECT id FROM reviews_detail WHERE admin_id='".$admin_id."'");
						$pages=ceil(mysqli_num_rows($page_query) / $per_page); //total number of pages to show
						$page=(isset($_GET['page'])) ? (int)$_GET['page'] : 1; // current page list
						$start= ($page - 1) * $per_page; //start list of user from zero becoz php starts from zero

						$fetch11 = mysqli_query($conn,"SELECT * FROM reviews_detail WHERE admin_id='".$admin_id."'  ORDER BY id DESC LIMIT $start, $per_page");
						$num11 = mysqli_num_rows($fetch11);
						if($num11>0)
						{
						?>
						<h3 class="head text-center">Customer Review Section</h3>
						<table class="responsive-table">
							<thead>
								<tr>
									<th scope="col">S.No.  </th>
									<th scope="col">Customer Name  </th>
									<th scope="col">Review Content </th>
									<th scope="col">Customer Image </th>
									<th scope="col">Edit</th>
									<th scope="col">Delete</th>
								
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1 ;
								while($show11 = mysqli_fetch_assoc($fetch11))
								{
									$pro_id=$show11['property_id'];
									$c_img=$show11['img'];
									$c_name=$show11['c_name'];
									$c_address=$show11['address'];
									$c_place=$show11['c_place'];

									$c_review=$show11['c_review'];
									$c_rev=substr($c_review,0,60);
									
									if($c_img!="")
									{
										$cust_image = "../uploads/review/".$c_img;
									} 
									else
									{
										$cust_image = "framework/img/avatar.png";
									}
									$p_name = prop_info($conn,$pro_id);
									?>
									<tr>
										<td scope="row"><?php echo ++$start ;?></td>
										<td scope="row"><?php echo $c_name ;?></td>

										<td data-title="Start Date"><?php echo $c_rev?html_entity_decode($c_rev)."...":''; ?></td>
										<td scope="row"><img src="<?= $cust_image ;?>" width="50px" height="50px"></td>
										<form method="post" action="edit_review.php">
											<td data-title="Edit" >
											<input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id'] ;?>" >
											<input type="hidden" name="review_pro_id" value="<?php echo $pro_id; ?>">
											<input type="hidden" name="edit_review_id" value="<?php echo $show11['id']; ?>">
											<button type="submit" name="edit_review_button"><i class="fa fa-pencil"></i></button>
											</td>
										</form>
										<form action="" method="post">
											<td data-title="Delete" ><input type="hidden" name="delete_rate" value="<?php echo $show11['id']; ?>">
											<button type="submit" name="delete_rate_button" onClick="return check()"><i class="fa fa-trash"></i></button></td>
										</form>
									</tr>
									<?php
								}
								?>
							</tbody>
						</table>

							<div style="text-align:center">
								<nav aria-label="Page navigation">
									<ul class="pagination">
									
										<?php
										/* ----------------- Pages Links -------------- */

										$prev=$page - 1;
										$next=$page + 1;
										if(!($page<=1))
										echo  "<li><a href='?page=$prev' aria-label='Previous'> <span aria-hidden='true'>&laquo;</span> </a> </li>";

										if($pages>=1)
										{
											for($x=1;$x<=$pages;$x++){
											echo ($x==$page) ? '<li class="active"><a href="?page='.$x.'">'.$x.'</a></li>' : '<li><a href="?page='.$x.'">'.$x.'</a></li>' ;
											}
											
										}

										if(!($page>=$pages))
										{
										echo "<li> <a href='?page=$next' aria-label='Next'> <span aria-hidden='true'>&raquo;</span> </a> </li>";
										}
										/*-------------------------------------------------*/

										?>
									</ul>
								</nav>
							</div>
							<?php
						}
						?>
					</div>
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

		<!-- Form validation -->
		<script type="text/javascript">
			$("#review_form").submit( function() {
			var custname = $('#cust_name').val();
				if(custname==="")
				{
					$('#error_firstname').html('* Please enter customer name...');
					$('#cust_name').focus();
					return false;
				}
				else
				{
					$('#error_firstname').html('');
				}
				var messageLength = CKEDITOR.instances['noticeMessage'].getData().replace(/<[^>]*>/gi, '').length;
				if( !messageLength ) {
					alert( 'Please enter a message' );
					CKEDITOR.instances['noticeMessage'].focus();
					return false;
				}
			})
		</script>
	</body>
</html>
