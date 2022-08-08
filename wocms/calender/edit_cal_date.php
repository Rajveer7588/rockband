<?php
include_once("../include/db.php");
session_start();
$admin_id = $_SESSION['admin_id'];
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD']=='POST') {
  $input = filter_input_array(INPUT_POST);
} else {
  $input = filter_input_array(INPUT_GET);
}
if ($input['action'] === 'edit') {
$fety = mysqli_query($conn, "SELECT * FROM client_details WHERE client_id='".$input['client_id']."' AND admin_id='".$admin_id."'");
if($fety)
{
while($rowy = mysqli_fetch_assoc($fety))
{	
$prop_id = $rowy['property_id'];
$email1 = $rowy['email'];
$req_num  = $rowy['req_num'];
$firstdate1 = $rowy['firstdate'];
$lastdate1 = $rowy['lastdate'];
}
$update_ical = mysqli_query($conn, "UPDATE ical_events SET start_date='".$input['firstdate']."', end_date='".$input['lastdate']."' WHERE  admin_id='".$admin_id."' AND start_date='".$firstdate1."' AND end_date='".$lastdate1."' AND event_pid='".$prop_id."'") or die(mysqli_error($conn));
$update = mysqli_query($conn, "UPDATE client_details SET name= '".$input['name']."',email = '".$input['email']."', firstdate = '".$input['firstdate']."', lastdate = '".$input['lastdate']."', adddate = now() WHERE property_id='".$prop_id."' AND client_id='".$input['client_id']."' AND admin_id='".$admin_id."' AND req_num='".$req_num."'") or die(mysqli_error($conn));
}
}
else if ($input['action'] === 'delete') {
$fety = mysqli_query($conn, "SELECT * FROM client_details WHERE client_id='".$input['client_id']."' AND admin_id='".$admin_id."'");
if($fety)
{
while($rowy = mysqli_fetch_assoc($fety))
{	
$prop_id = $rowy['property_id'];
$email1 = $rowy['email'];
$req_num  = $rowy['req_num'];
$firstdate1 = $rowy['firstdate'];
$lastdate1 = $rowy['lastdate'];
}
$delet_ical = mysqli_query($conn, "DELETE FROM ical_events WHERE  admin_id='".$admin_id."' AND start_date='".$firstdate1."' AND end_date='".$lastdate1."' AND event_pid='".$prop_id."'") or die(mysqli_error($conn));
$dele = mysqli_query($conn, "DELETE FROM client_details WHERE property_id='".$prop_id."' AND client_id='".$input['client_id']."' AND admin_id='".$admin_id."' AND req_num='".$req_num."'") or die(mysqli_error($conn));
}
} else if ($input['action'] === 'restore') {

}
echo json_encode($input);
?>