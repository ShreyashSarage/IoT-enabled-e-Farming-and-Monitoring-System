<?php
//This script will handle all the incoming form data from signup.ejs
$name = $_POST['Name'];
$email = $_POST['email'] ;    
$password = $_POST['pass'];
$lastname = $_POST['Lastname'];
$uname = $_POST['uname'] ;



$db = new mysqli('localhost','project','diot','esp32');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  } 

  $sql = "insert into users values('$name','$lastname','$email','$password','$uname');";
  


  $sql_check = "select email from users where email like '$email';";
  $values = array();
  $result = $db->query($sql_check);
  while($row = $result->fetch_assoc()) {
      $values[] = $row;
  }
  
  if (count($values) > 0) {
    header("Location: http://localhost:4000/user_exists.html");
    exit();
  }
  else{
    $db->query($sql);
    $db->close();
    header("Location: http://localhost:4000/index.php");
    exit();
  }


