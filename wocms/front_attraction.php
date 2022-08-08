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
    $f_heading=test_input($_POST['f_heading']);
    $f_content=test_input($_POST['f_content']);
    $f_caption=test_input($_POST['f_caption']);
    $pro_id=test_input($_POST['pro_id']);

        $folder_path = '../uploads/front_attraction/'.$pro_id;
        $targetDir = '../uploads/front_attraction/'.$pro_id."/";
    if (!file_exists($folder_path)) {
    mkdir($folder_path, 0777, true);
    }
    if(($_FILES["image"]["type"] == "image/gif") || 
            ($_FILES["image"]["type"] == "image/jpeg") || 
            ($_FILES["image"]["type"] == "image/png") || 
            ($_FILES["image"]["type"] == "image/pjpeg") ||
            ($img_name == "")
            ) 
            
            {
                
    function compress_image($source_url, $destination_url, $quality) {

        $info = getimagesize($source_url);

            if ($info['mime'] == 'image/jpeg')
                    $image = imagecreatefromjpeg($source_url);

            elseif ($info['mime'] == 'image/gif')
                    $image = imagecreatefromgif($source_url);

        elseif ($info['mime'] == 'image/png')
                    $image = imagecreatefrompng($source_url);

            imagejpeg($image, $destination_url, $quality);
        return $destination_url;
    }
    if($size<=4194304) // 4 Mb
    {
$file_array = explode(".",$img_name);
 
 if(count($file_array)==2){

                $targetFile =  $targetDir.$img_name;
            $filenames = compress_image($_FILES["image"]["tmp_name"], $targetFile, 80);
            $compress_size = filesize($folder_path);
    

        $insert = mysqli_query($conn,"INSERT into front_attraction(property_id,admin_id,f_img,f_heading,f_content,f_caption,added_date) VALUES('".$pro_id."','".$admin_id."','".$img_name."','".$f_heading."','".$f_content."', '".$f_caption."', now())");
    
}       
        }
    }
        else
  {
      echo "<script>alert('Size of image is greater than 4MB, Please insert image than 4 Mb.');</script>";
            ?>
            <script>
            window.location = 'review.php';
            </script>
            <?php
  }
            
        
    if($insert)
        {
            //move_uploaded_file($tmp,"../uploads/front_attraction/$pro_id/$img_name");
            echo "<script>alert('Inserted Successfully.');</script>";
            ?>
            <script>
            window.location = 'front_attraction.php';
            </script>
            <?php
        }
}

?>

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
            if(but== 'Add New Faqs' )
                {
                    $('#add_areview').val('Close X');
                }
            else
                {
                    $('#add_areview').val('Add New Faqs');
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
      <h1><small>Add Attraction</small> </h1>
      <hr>
        <input type="button" class="btn btn-success green" id="add_areview" value="Add New Attraction" style="margin:10px;"/>
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
                    <label for="exampleInputEmail1">Att_Heading </label>
                    <input type="text" name="f_heading" class="form-control" id="home_heading" placeholder="Heading"/>
                </div>

                <div class="editor">
                    <label for="exampleInputEmail1">Att_Content</label>
                    <textarea class="ckeditor" name="f_content" id="noticeMessage" ></textarea>
                </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Image Caption</label>
                    <input type="text" name="f_caption" class="form-control" id="f_caption" placeholder="Caption"/>
                </div>
                
                <div class="row">
                    <div class="heading">
                        <h3><i class="fa fa-home" aria-hidden="true"></i> Select Your Property Name</h3>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="prop_type">
                    <section>
                        <select name="pro_id" class="cs-select cs-skin-underline" id="pro_id">
                        <option value="0">SELECT PROPERTY NAME</option>
                        <?php
                            $fetch11 = mysqli_query($conn,"SELECT * FROM `property_listing` WHERE admin_id='".$admin_id."' ");
                                @$num11 = mysqli_num_rows($fetch11);
                                if($num11>0)
                                {
                                    $i=1;
                                    while($show11 = mysqli_fetch_assoc($fetch11))
                                    {
                                        $property_heading=$show11['property_heading'];
                                    ?>
                                    <option value="<?= $show11['property_id'];?>"><?php echo @$property_heading; ?></option>
                                    <?php
                                    $i++;
                                    }
                                }
                            ?>
                        </select>
                    </section>
                    <div id="error_pro_id"></div>
                    </div>
                </div>
                
                <div style="clear:both"></div>
                <p class="text-center">
                    <button type="submit" name="home_details_submit" class="btn btn-success btn-outline-rounded green"> Submit <span style="margin-left:10px;" class="glyphicon glyphicon-send"></span></button>
                </p>
            </form>
        </div>
    </section>
 

    <?php 
        $fetch11 = mysqli_query($conn,"SELECT * FROM `front_attraction` WHERE admin_id=1 ORDER BY f_id DESC");
        $num11 = mysqli_num_rows($fetch11);
        if($num11>0)
        {
        ?>
        <h3 class="head text-center">Attraction</h3>
        <table class="responsive-table">
            <thead>
                <tr>
                    <th scope="col">S.No. </th>
                    <th scope="col">Heading  </th>
                    <th scope="col">Content</th>
                    <th scope="col">Caption </th>
                    <th scope="col">Image </th>
                    <th scope="col">Edit </th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        $i = 1 ;
                        while($show11 = @mysqli_fetch_assoc($fetch11))
                        {
                            $pro_id=$show11['property_id'];
                            $f_img=$show11['f_img'];
                            $f_heading=$show11['f_heading'];
                            $f_caption=$show11['f_caption'];
                        
                            $f_content=$show11['f_content'];
                            $f_rev=substr($f_content,0,60);
                            
                            if($f_img!="")
                            {
                                $cust_image = "../uploads/front_attraction/".$f_img;
                            } 
                            else
                            {
                                $cust_image = "framework/img/no-image.png";
                            }
                        ?>
            
                        <?php
                            if($pro_id){
                                $fetch12 =mysqli_query($conn,"SELECT * FROM `property_listing` WHERE property_id= $pro_id ");
                                $result12 = mysqli_fetch_assoc($fetch12);
                                $pro_name = $result12['property_heading'];
                            }
                            else 
                            {
                                $p_name="";
                            }
                        ?>
                        <tr>
                            <td scope="row"><?php echo $i ;?></td>
                                <td data-title="Start Date"><?php echo $f_heading?html_entity_decode($f_heading):'Not Available' ; ?></td>
                                <td data-title="Start Date"><?php echo $f_rev?html_entity_decode($f_rev)."...":''; ?></td>
                                <td scope="row"><?php echo $f_caption?$f_caption:'Not Available' ?></td>
                                <td scope="row"><img src="<?php echo $cust_image ;?>" width="50px" height="50px"></td>
                                <form method="post" action="edit_attraction.php">
                                    <td data-title="Edit" >
                                    <input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id'] ;?>" >
                                    <input type="hidden" name="attraction_pro_id" value="<?php echo $pro_id; ?>">
                                    <input type="hidden" name="edit_attraction" value="<?php echo $show11['f_id']; ?>">
                                    <button type="submit" name="edit_attraction_button"><i class="fa fa-pencil"></i></button>
                                    </td>
                                </form>
                                <form action="" method="post">
                                    <td data-title="Delete" ><input type="hidden" name="delete_rate" value="<?php echo $show11['f_id']; ?>">
                                    <button type="submit" name="delete_rate_button" onClick="return check()"><i class="fa fa-trash"></i></button></td>
                                </form>
                        </tr>
                        <?php
                        $i++;
                        }
                    }
                ?>
            </tbody>
          
        </table>
 </div>
</div>
        <?php 
   if(isset($_POST['delete_rate_button']))
{
    $delete_id = $_POST['delete_rate'];
    
    $dt = mysqli_query($conn, "SELECT property_id,f_img FROM front_attraction WHERE f_id='".$delete_id."'");
    $dell = mysqli_fetch_assoc($dt);
    $del_file = $dell['f_img'];
    $pro_id = $dell['property_id'];
    $delete = mysqli_query($conn, "DELETE FROM front_attraction WHERE f_id='".$delete_id."'");
    
    if($delete)
        {
            $FileName = '../uploads/front_attraction/'.$pro_id.'/'.$del_file;
            @chown($FileName,465); //Insert an Invalid UserId to set to Nobody Owner; for instance 465
            @unlink($FileName);
            echo "<script>alert('Deleted Successfully.');</script>";
            echo "<script>window.location = 'front_attraction.php'</script>";
        }
}


?>  
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
        var e = document.getElementById("pro_id");
    var strUser = e.options[e.selectedIndex].value;
    //if you need text to be compared then use
    var strUser1 = e.options[e.selectedIndex].text;
    if(strUser==="0") //for text use if(strUser1=="Select")
    {
    $('#error_pro_id').html('* Please select your Property Name');
        $('#pro_id').focus();
        return false;
    }
    else
    {
        $('#error_pro_id').html('');
    }
    
    })
</script>
</body>
</html>
