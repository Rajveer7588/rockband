<?php
include_once('../include/db.php');
include_once('../include/functions.php');
if($_POST['amenId']!="")
{
	
	$ss="";
	$amen_name1 = mysqli_real_escape_string($conn, $_POST['amenName']);
	$amen_name = htmlspecialchars($amen_name1);
	$amen_id = test_input($_POST['amenId']);
	$amen_status = test_input($_POST['stat']);
	$del = mysqli_query($conn, "Update amenity_details SET amen_status='".$amen_status."' WHERE amen_value='".$amen_name."' AND amenity_id='".$amen_id."' "); 
		
		if($del)
		{
			if($amen_status=="1")
				{
					echo $amen_name1." activated";
				}
				else
				{
					echo $amen_name1." deactivated";
				}
		?>
        <?php
		}
		else
		{
			echo "Something went wrong..." ;
        }
	
}
?>