<?php
$uemail = $_POST['email'];
$upass = $_POST['pass'];
$db = new mysqli('localhost','aniket','2512','data');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  } 

$sql = "select password from users where email like '$uemail';";

//Next fetch data from table
$result = $db->query($sql);


if(mysqli_num_rows($result)==0){
    echo "OK";
}else{
    echo "NG";
}
$db->close();

