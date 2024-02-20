<?php 
$db = new mysqli('localhost','project','diot','user_info');
session_start();
$user_name = $_SESSION['uname_of_user'];
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  } 




$sql_check = "show tables;";
$values = array();
$result_2 = $db->query($sql_check);
while($row = $result_2->fetch_assoc()) {
    $values[] = $row['Tables_in_user_info'];
  }
$result2 = in_array($user_name, $values);


if($result2 == true){
    $sql = "select * from $user_name;";
$Bed1 = "";
$Date_Bed = "";
$result = $db->query($sql);
while($row = $result->fetch_assoc()) {
    $Bed1 = $row['Bed1'];
    $Date_Bed = $row['Bed1_Date'];
  } 
	$_SESSION['Bed_1'] = $Bed1;
    $_SESSION['Date_Bed'] = $Date_Bed;
    header("Location: http://localhost:4000/mycrops_exists.php");
    exit();
}
else if($result2==false){

    header("Location: http://localhost:4000/AddCropError.html");
    exit();
}
