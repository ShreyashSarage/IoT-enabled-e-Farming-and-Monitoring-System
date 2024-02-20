<?php
$bed1_val = $_POST['bed1'];
$bed2_val= $_POST['bed2'];
session_start();
$uname = $_SESSION['uname_of_user'];
$db = new mysqli('localhost','project','diot','user_info');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  } 

$sql_check = "show tables;";
$values = array();
$result = $db->query($sql_check);
while($row = $result->fetch_assoc()) {
    $values[] = $row['Tables_in_user_info'];
  }
$result2 = in_array($uname, $values);


if($result2 == true){
    ?>
    <script>
        alert("Bed already occupied!");
        window.location.href = "http://localhost:4000/AddCrop.php";
    </script>
    <?php
}
else if($result2==false){

    $date_bed1 = date('Y-m-d');

    $db->query("create table $uname(Bed1 varchar(20),Bed1_Date varchar(10));");

    $db->query("insert into $uname values('$bed1_val','$date_bed1');");

    $db->close();

    header("Location: http://localhost:4000/AddCrop.php");
    exit();
    
}


?>