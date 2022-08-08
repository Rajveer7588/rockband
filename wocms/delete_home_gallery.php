<?php session_start() ;?>
<?php
$admin_id = $_SESSION['admin_id'];
$url = $_SERVER['HTTP_REFERER'];
?>
<?php
error_reporting(0);
if(isset($_POST['dele_id']))
{
	include_once('include/db.php');
	$ii = $_POST['dele_id'];
	foreach($ii as $kk)
{
	$iii = explode(',', $kk);
	$count = count($ii);
	$del_id = $iii[0];
	
	$folder_path = '../uploads/gall';
	$fet = mysqli_query($conn,"SELECT file_name FROM gallery where image_id='".$del_id."'") or die(mysqli_error($conn));
$row = mysqli_fetch_assoc($fet);
$row['file_name'];
$del1 = mysqli_query($conn,"DELETE FROM gallery WHERE  image_id='".$del_id."'");
	if($del1)
	{
		unlink($folder_path.'/'.$row['file_name']);
	}

}
if($count>1){
$msg="Images deleted Successfully";
}
else {
$msg="Image Deleted Successfully";
}
if($del1)
{
	echo $msg;
}
}
?>