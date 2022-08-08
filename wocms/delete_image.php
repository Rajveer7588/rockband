<?php
if(isset($_POST['name']))
include_once('include/db.php');
{
$t= $_POST['name'];
unlink("../uploads/".$t);

$del = mysqli_query($conn,"DELETE FROM files WHERE file_name='".$t."' AND admin_id=1");
}
?>