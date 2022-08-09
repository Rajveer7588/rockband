<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
// $password = "8(tg}ufG7&l1";
$db = "rockband";
$site = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<?php date_default_timezone_set('UTC'); ?>

<?php //personalwebsites.org #
$my_address = $_SERVER['SERVER_NAME'];
if( (strpos($my_address, 'localhost') !== false)||(strpos($my_address, '#') !== false) )
{
	if($site!="")
	{
		$site_name = $site."/" ;
	}
	else
	{
		$site_name = "" ;
	}
	
define("SITE_URL", 'http://'.$_SERVER['SERVER_NAME'].'/');
}
else
{
define("SITE_URL", 'http://'.$_SERVER['SERVER_NAME'].'/');
}
$hostname = "http://localhost/limosine/";
?>