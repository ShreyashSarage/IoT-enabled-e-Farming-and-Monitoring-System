<?php 
 session_start();
 $_SESSION['name_of_user']= ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST"){

  $email = $_POST['email_id'] ;    
  $password = $_POST['password'];


  //Connect to MySQL
$db = new mysqli('localhost','project','diot','esp32');
  
  //Check connection
  if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
    } 
  
  $sql = "select * from users where email like '$email';";
  
  $values = array();
  $result = $db->query($sql);

  $name_from_form = "";
  $email_from_form ="";
  $lname_from_form = "";
  $password_from_form = "";
  $uname_from_form = "";
  

  while($row = $result->fetch_assoc()) {
      $values[] = $row;
      $name_from_form=$row['Name'];
      $email_from_form=$row['email'];
      $lname_from_form=$row['LastName'];
      $password_from_form=$row['password'];
      $uname_from_form=$row['UserName'];
  }

  
session_start(); 
  if (count($values) > 0) {
      $_SESSION['name_of_user'] = $name_from_form;
      $_SESSION['email_of_user'] = $email_from_form;
      $_SESSION['lname_of_user'] = $lname_from_form;
      $_SESSION['password_of_user'] = $password_from_form;
      $_SESSION['uname_of_user'] = $uname_from_form;

      if($password_from_form == $password){
          header("Location: http://localhost:4000/connection_establish.php");
          exit();
      }
      else{
        ?>
        <script>
            alert("Incorrect Password!");
            </script>
        <?php
      }
  }
  else{
      ?>
      <script>
          alert("We do not have an account with that email id!")
      </script>
      <?php
  }
  $db->close();
}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>e-Farming | Login</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>


</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="box">
            <div class="container">
                <div class="top-header">
                    <span>Have an account?</span>
                    <header>Login</header>
                </div>
                <div class="input-field">
                    <input type="email" id="email_id" class="input" placeholder="Email ID" required name="email_id">
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-field">
                    <input type="password" class="input" placeholder="Password" required name="password">
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-field">
                    <input type="submit" class="submit" value="Login" id="btn_login">
                </div>
                <div class="bottom">
                    <div class="left">
                        <input type="checkbox"  id="check">
                        <label for="check"> Remember Me</label>
                    </div>
                    <div class="right">
                        <label><a href="#">Forgot password?</a></label>
                    </div>
                </div>
                <label class="link">Don't Have an account?&nbsp;&nbsp;<a href="http://localhost:4000/signup.ejs">Sign Up</a></label>
            </div>
        </div>
    </form>
</body>
</html>
