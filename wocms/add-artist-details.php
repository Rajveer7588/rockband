<?php include_once('session_destroy.php') ;
      include_once('include/functions.php');

    $product_id = $_GET['id'];
  
    $fetch_cat = mysqli_query($conn, "SELECT * FROM `artist_category` WHERE admin_id = 1");



    $admin_id = $_SESSION['admin_id'];

    $fetch = mysqli_query($conn,"SELECT * FROM `artist` WHERE id = '".$product_id."'");

    $num = mysqli_num_rows($fetch);

    while($show = mysqli_fetch_assoc($fetch))

    {
    
    $category_id = $show['category_id'];

    $event_banner = $show['event_banner'];

    $logo = $show['logo'];

    $name = $show['name'];

    $title = $show['title'];

    $day = $show['day'];

    $date = $show['date'];

    $time = $show['time'];

    $location = $show['location'];

    $description = $show['description'];

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
        <h1>Artist <small>Update your Content Easily</small></h1>
        <a href="add-artist-category.php" class="cat_button">Add New Category</a>
      </div>
      
      

      <hr>

      <form method="post" action="" enctype="multipart/form-data">

      <div class="row">

          <div class="col-md-4 col-lg-4">
            <div class="image_holder">
              <div class="form-group">
                <label for="browser" class="form-label">Event Banner</label>
                <input type="file" name="event_banner" class="form-control" id="Event_banner">
                <input type="hidden" name="Evnet_old_image" value="<?php echo @$event_banner ?>">
              </div>
            </div>
              <?php if(@$image==""){ ?>

                  <img src="framework/img/user2-160x160.jpg" width="200" height="200">

                  <?php }else{ ?>

                    <img src="../uploads/artist/<?php echo @$image ?>" width="200" height="200">

                  <?php } ?>
          </div>

          <div class="col-md-4 col-lg-4">
            <div class="image_holder">
              <div class="form-group">
                <label for="browser" class="form-label">Event logo</label>
                <input type="file" name="logo" class="form-control" id="about_profile_img">
                <input type="hidden" name="about_old_image" value="<?php echo @$logo ?>">
              </div>
            </div>
              <?php if(@$image==""){ ?>

                  <img src="framework/img/user2-160x160.jpg" width="200" height="200">

                  <?php }else{ ?>

                    <img src="../uploads/artist/<?php echo @$image ?>" width="200" height="200">

                  <?php } ?>
          </div>

          <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="form-group">

              <label for="exampleInputEmail1">Name</label>

              <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?php echo @$heading ?>">

            </div>
          </div>

          <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="form-group">

              <label for="exampleInputEmail1">Event Title</label>

              <input type="text" name="title" class="form-control" id="titel" placeholder="Event Title" value="<?php echo @$title ?>">

            </div>
          </div>

          <div class="col-md-2 col-sm-12 col-lg-2">
            <div class="form-group">

              <label for="exampleInputEmail1">Day</label>

              <select name="day" id="day" class="form-control">
                  <option value="">select</option>
                  <option value="Sunday">Sunday</option>
                  <option value="Monday">Monday</option>
                  <option value="Tuesday">Tuesday</option>
                  <option value="Wednesday">Wednesday</option>
                  <option value="Thursday">Thursday</option>
                  <option value="Friday">Friday</option>
                  <option value="Saturday">Saturday</option>
              </select>

            </div>
          </div>

          <div class="col-md-2 col-sm-12 col-lg-2">
            <div class="form-group">

              <label for="exampleInputEmail1">Date</label>

              <input type="date" name="date" class="form-control" id="date" placeholder="Date" value="<?php echo @$date ?>">

            </div>
          </div>


          <div class="col-md-2 col-sm-12 col-lg-2">
            <div class="form-group">

              <label for="exampleInputEmail1">Time</label>

              <input type="time" name="time" class="form-control" id="time" placeholder="Time" value="<?php echo @$time; ?>">

            </div>
          </div>

          <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="form-group">

              <label for="exampleInputEmail1">Location</label>

              <select name="location" id="location" class="form-control">
                  <option value="">select</option>
                  <option value="Noida">Noida</option>
                  <option value="Indrapuram">Indrapuram</option>
                  <option value="Ghaziabad">Ghaziabad</option>
                  <option value="Delhi">Delhi</option>
                  <option value="Meerut">Meerut</option>
                  <option value="Mumbai">Mumbai</option>
              </select>

            </div>
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
          
            $fetch_pro = mysqli_query($conn,"SELECT * FROM `artist` LIMIT $start_from, $limit");

            @$nums = mysqli_num_rows($fetch_pro);
        ?>

			<h3 class="head text-center">Artist Details</h3>
			<div class="ta_pad">
				<table class="responsive-table">
				
					<thead>
					<tr>
						<th scope="col">S.No </th>
						<th scope="col">Artist</th>
            <th scope="col">Event Date</th>
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
							<td data-title="category"><?php echo @$name; ?> </td>
              <td data-title="Event Date" ><?php echo @$Event_date; ?></td>
					
							<form action="" method="post">
							<td data-title="Delete"><input type="hidden" name="delete_property" value="<?php echo @$id; ?>"><button type="submit" name="delete_pro_button" onClick="return check()"><i class="fa fa-trash"></i></button></td>
							</form>
							<form method="post" action="add-artist-details.php?id=<?php echo $id; ?>">
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
                            $sql1 = "SELECT COUNT(*) FROM artist";  
                            $rs_result = mysqli_query($conn,$sql1);  
                            $row = mysqli_fetch_row($rs_result);  
                            $total_records = $row[0];  
                              
                            // Number of pages required.
                            $total_pages = ceil($total_records / $limit);     
                            if($pn >=2){
                            ?>
                                 <li class='active'><a href="add-artist-details.php?page=<?= $pn-1; ?>" id="pagination_txt">Prev</a></li>
                            <?php
                            }
                            for ($i=1; $i<=$total_pages; $i++) {
                              if ($i==$pn) {
                                ?>
                                  <li class='active'><a href='add-artist-details.php?page=<?= $i ?>' id="pagination_txt"><?php echo $i; ?></a></li>
                                <?php
                              }            
                              else{
                                ?>
                                    <li><a href='add-artist-details.php?page=<?= $i ?>' id="pagination_txt">
                                                                    <?php echo $i; ?></a></li> 
                                <?php
                                } 
                            }
                            if($pn<=$total_pages){
                            ?>
                                 <li class='active'><a href="add-artist-details.php?page=<?= $pn+1; ?>" id="pagination_txt">Next</a></li>
                            <?php
                            }
            			}
                        ?>
                  </ul>
			</div>


      <script>
        $(document).ready(function){
          $('#date').click(function(){
            alert("hello");
          })
        }
      </script>

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
    $event_banner= $_FILES['event_banner']['name'];
    $e_type= $_FILES['event_banner']['type'];
    $e_size= $_FILES['event_banner']['size'];
    $e_tmp_name= $_FILES['event_banner']['tmp_name'];


    $logo= $_FILES['logo']['name'];
    $l_type = $_FILES['logo']['type'];
    $l_size = $_FILES['logo']['size'];
    $l_tmp_name= $_FILES['logo']['tmp_name'];


    $name=test_input($_POST['name']);
    $title=test_input($_POST['title']);
    $day=test_input($_POST['day']);
    $date=test_input($_POST['date']);
    $time=test_input($_POST['time']);
    $location=test_input($_POST['location']);
    $description=test_input(str_replace("'","@@",$_POST['description']));


    // $heading=test_input($_POST['heading']);
    // $description=test_input(str_replace("'","@@",$_POST['description']));
    // $short_content=test_input($_POST['short_content']);
    // $product_size=test_input($_POST['product_size']);
    // $image=$_FILES['image']['name'];
    // $type=$_FILES['image']['type'];
    // $size=$_FILES['image']['size'];
    // $tmp=$_FILES['image']['tmp_name'];
    $ip = getClientIP();
    $target_dir = '../uploads/artist/'.$category_id.'/';

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
        $insert = mysqli_query($conn,"SELECT * FROM services WHERE admin_id=$admin_id");
        $row = mysqli_num_rows($insert);
        
        if(empty($product_id))
        {

          // echo "INSERT into services(admin_id,image,heading,description,short_content,inserted_date,service_ip)
          // VALUES('".$admin_id."','".$image."','".$heading."','".$description."', '".$short_content."', now() ,'".$ip."')";
          // die;

        $insert = mysqli_query($conn,"INSERT into `artist`(admin_id,category_id,image,heading,description,short_content,product_size,inserted_date,service_ip)
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
          $update = mysqli_query($conn, "UPDATE `artist` SET category_id= '".$category_id."', image='".$image."' , heading='".$heading."', description='".$description."', short_content='".$short_content."', product_size= '".$product_size."', updated_date=now(), service_ip='".$ip."' WHERE id='1' AND admin_id='".$admin_id."'") or (mysqli_error($conn));
          move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$image);
          if($update==true)
          {
            echo "<script>alert('Updated Successfully.');</script>";
            ?>
              <script>
              window.location = '<?php echo $hostname."wocms/add-artist-details.php" ?>';
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

  if(isset($_POST['delete_pro_button'])){
    $cid = $_POST['delete_property'];
    $qry = "DELETE FROM `artist` WHERE id = $cid";
    $del = mysqli_query($conn, $qry);
    if($del){
      ?>
        <script>
          alert("Data deleted successfully");
          window.location = '<?php echo $hostname."wocms/add-artist-details.php" ?>';
        </script>
      <?php
    }
  }
?>

