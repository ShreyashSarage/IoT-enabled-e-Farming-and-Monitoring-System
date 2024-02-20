<?php 

session_start();
if($_SESSION['name_of_user'] == ""){
    header("Location: http://localhost:4000/session_expired.html");
}
if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $fname_form = $_POST['username'] ;    
    $password_form = $_POST['pass'];

   //Connect to MySQL
$db = new mysqli('localhost','project','diot','esp32');

//Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
} 
$fname = $_SESSION['name_of_user'];
$sql = "update users set Name='$fname_form', password='$password_form' where Name like '$fname';";

$db->query($sql);
$db->close();
$_SESSION['name_of_user'] = $fname_form;
?>
<script> alert("Your credentials are saved!")</script>
<?php
}
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="user.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

</head>
<body>
    <abbr class="More" style="height:400px !important; width:100% !important; overflow:hidden;">
        <a href="http://localhost:4000/connection_establish.php">
            <img src="menu-list-icon-app-navigation-option-page-interface-dropdown-three-lines-button-dots-sign-symbol-black-artwork-graphic-illustration-clipart-eps-vector.jpg"width=50/>
        </a>
    </abbr>


    
        <div class="row" style="height:400px">
            <div class="col-md-3 d-none d-md-block">
                <div class="container-fluid nav sidebar flex-column">
                    <a href="http://localhost:4000/test.php" class="nav-link active mt-auto"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAABBUlEQVQ4T62UAQ3CMBBFmQKQgAOYAjYHSAAFIAEngAJAAeAAHIADUAD/JevSde12IVxyyba7vvt3a5sN/mhZB6tQ7GOs9VTeIwW7KDgzgkh7yfMULKXoqkVT+TBSqLTC3lpM2zf5SH6MKDfD9lq88NTM9XwI1NUwqk3k96r/sE0U5d5iwNsUjBbO8lLO8GMz2+g7CpkZIAT4ViuzwIK1rVczjL+4kz8qBDNb/aJsWYFCKbTLSNw26VV2UjIqUrao5ke8F0ZlPGVjBQCaYB2cViipzJdvAfKDCnecCr34+8wCaOWEsLUy2O195k5KI8/BGCSQ2G0QA7uTEoXxESBuMQpzhzXsC2DlQ/TKIf9UAAAAAElFTkSuQmCC"/>&nbsp;Profile</a>
                   <div class="notifications">
                       <a href="#" class="nav-link"><i class="far fa-bel"></i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAAAx0lEQVQ4T2NkoCJgpKJZDOQaJgB0hD/UIRuB9AcQG92wAiRF2BwdCBXcD6QNoOwLQNoRZCCyYSCD+vF4+yFQTgGIsalLBIovQDasAShQD7XlAB5DqWoYKLxAlulDLbwIpB3QvUmsy0BmgAwMgBq2AWQQiE2ON9FDAGQwVQx7ADQIhEHepNhl/4FmHBw1DJw18CVa5NgkGGagFA7Kb8QAkKVYIwCUCNcTYwKamkIgfwJ60gDxQQbCSgNizAWlsQUwheSWZ1gtAgBVIToUEJmHxQAAAABJRU5ErkJggg=="/>&nbsp;Notifications
                           <span class="badge">3</span>
                       </a>

                   </div>
                    <a href="#" class="nav-link"></i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAABZklEQVQ4T7WU4U3DQAyF2wmACQgTwAaEDWACygYwAWEC2IAwAWxAugFMQJiAMgG8L3qW3GtQ+qNYsnzns5/zzr7MZzuU+RZYlWIOHfcp2/+VMwVWK/G1SD7TvhsDnAJrlHQrvXHyveydFP+GlGAnTn6Thd7CGUe2H7at6RIPOPGzDLavPcHYkKW/orOj9v40xay0ptgqg1HtUnqRAPEhgPxIAUcWtgA9S5/wZTCqHxuMNQINgivve58PtCS1z99ZZzCqPTroQJaqJEO7sR/7JYUWftbIlbQtG9DKCVX8VGUs6ORDAqO7MR5QHyhy/m9goI/R3DNNaF1Lv6XVFM1OAWMNeJE/P6dz7XMDOGe/1oC4rxiNuA+ug/tDKIjAgnO+cnQ0oNFLoRVCMhMeIIDSgAAnLmivDS0HzFUjjedEZ5HyOdFBCuf4jW6mjxqWAPMlXDzCiGz90Esw6OzsFwR4ZWUNNXRUfgGCJF8UKSD7mgAAAABJRU5ErkJggg=="/>&nbsp;General</a>
                    <a href="http://localhost:4000/index.php" class="nav-link mb-auto"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAAA20lEQVQ4T62UAQ3CMBBFNwdYQAE4gDnAAUgABczBkAAKJoHhAAlIAAf8l6xJ2dZdadrkkrW3vbt/11tZZFxlRlYRA9sp4MoI+pC/s2CA2sjslxasFugsO8meAeha542sioVVyAjAtjq/z8EWcr5lLrNkGJGOMurFM3aVvf7NDAj66Q6QmDWSiSwgh/5rJIYKzit+QyZhF72072EfA4YCF2wEc3KyyPRrQyS/ARvtbykNcNBsV8PPstaGCUi+Z1Mwv+DD68I40TxznLIOOlkAJPrc6uQ0f0EG49f9BbR3NVTPZcPyAAAAAElFTkSuQmCC"/>&nbsp;Logout</a>
                </div>
            </div> 
       
            
            <span class="profile">
                <!-- NORMAL EFFECT -->
                <div>
                    <br>
                    <h1 class="profile" style="margin-left: 1cm;"><B>General Settings</B></h1>
                    <br>
                </div>
                
                <!-- TYPE WRITER EFFECT -->
                <!-- <div class="typewriter">
                    <h1>Profile Settings</h1>
                </div> -->
  
                
                    <div class="row" style="height:100%">
                        
                        <div class="col-md-9">
                            
                            <div class="container">
                                
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                    <div class="fullName">
                                        
                                        <label for=fullName>User Name</label><br>
                                        <input type="text" class="form-control" name="username" id="fullName" value="<?php echo $_SESSION['name_of_user'];?>">
                                        
                                        
                                        <br>
                                    </div>
                                    <div class="email">
                                        
                                        <label for=password>Password</label>
                                        <input type="password" class="form-control" name="pass" id="password" value="<?php echo $_SESSION['password_of_user'];?>">
                                
                                       <br>
                                    </div>
                                    <div class="Phone">

                                            <label for=birthday>Email</label>
                                            <input type="tel" class="form-control"  placeholder="+91 987654321" pattern="[0-9]{2} [0-9]{10}">
                                            <br><input type="submit" value="Save"  class="btn btn-primary btn-block" style="width: 40%;" >
                            
                                    </div>
                                    
                                    <div class="row mt-5">
                                        
                                        <!-- <div class="col">
                                            
                                            <button type="button" class="btn btn-primary btn-block">Save Changes</button>
                                            
                                        </div> -->
                                        
                                    
                                        
                                    </div>
                            
                                </form>
                        
                            </div>
                        </div>
                    </div>
            </span>
        </div>