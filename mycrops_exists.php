<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 


   <?php
   $db = new mysqli('localhost','project','diot','esp32');

//Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}   

$sql = "update trigger_sensor set status=1 where sensor like 'sensor1';";
$sql_1 = "update trigger_sensor set status=0 where sensor like 'sensor1';";


if(isset($_POST['Start']))
{
    $db->query($sql);

}
if(isset($_POST['Stop']))
{
    $db->query($sql_1);
}
        ?>
    

    <style>

    body {
        background-image: url('https://static.vecteezy.com/system/resources/previews/009/880/566/original/spring-time-sunny-day-summer-landscape-in-village-with-green-field-cloud-and-blue-sky-background-rural-countryside-with-mountain-grassland-sunlight-in-morning-nature-scenery-cartoon-background-vector.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;  
    }


    h1{
        text-align: left;
    }

    /* ------------------navigation----------------------- */
    nav {
    background-color: rgb(183, 197, 36);
    overflow: hidden;
    font-weight: bold;
    height: 50px;
}
nav a {
    float: left;
    display: block;
    color: rgb(245, 245, 245);
    text-align: center;
    padding: 16px 25px;
    text-decoration: none;
    font-size: medium;
    font-weight: bold;
    text-shadow: 0 0 5px rgba(0,0,0,0.9);
    
}

nav a:hover {
    background-color: #73be98;
    color: black;
    font-weight: 800;
    text-decoration:underline;
}

.set12 {
    float: right;
    width: 5%;
    margin-bottom: auto;

}
/* ------------------------------------------- */
    .Tips {
    
    position: absolute;
    justify-content: center;
    align-items: baseline;
    width: 80%;
    min-height: 40vh;
    background: rgba(255, 255, 255, 0.12);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    margin-left: 10%;
    margin-right: 30%;
    font-family: verdana;
    margin-top: 5%;
   
  }

  .left{
    margin-left: 35%;
    margin-top: 3%;
    width: 100%;
   
  }

  .bed1{
font-weight: bolder;
color: brown;
font-size:large;

  }

  .button{
    margin: 0;
  position: absolute;
  top: 20%;
  left: 65%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  }
    </style>


    <title>Visulisation</title>
    
</head>
<body>
    <nav>
        <a href="http://localhost:4000/connection_establish.php">Home</a>
        <a href="about.html">About Us</a>
        <a href="#">Documentation</a>
        <a href="http://localhost:4000/CropInfo.php">Crop Info</a> 
        <a href="http://localhost:4000/AddCrop.php">Add Crops</a> 
        <a href="http://localhost:4000/MyCrops.php">My Crops</a>
      
        <div class="set12">

            <box-icon name='user' type='solid' ></box-icon>
            
            <abbr title="Accounts">
            <a href="http://localhost:4000/test.php"> 
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAAA9ElEQVQ4T9WUwQ2CQBBFoQLtQDtQKxAq0A7UDrACtQK1A+zADqQDoQItQTvwvwTNZLMLHrgwyT+Q2X0zf3ZCHHUYcYesqF+woazvpKn0kg5S+c84fDYLXZybywBn0lOi0CQArlzYWAcfnsN0t5cS6RaApS4Ma/cGGMXWAVjus8l8XCvYbJ2bD0b1k7SQqtre1XRDZytPd9vQngEcSW9PR8B8VjMXttTBowTMBp3yCLxsMCwsq0Ghw4USaZ2kMzq3cbEwqg6aKiu3kXIJsN1Frv1WI9FHaH8s/6wPHLBCLLCN8tsZSebSFqwHMG/066/RZjWY/wCKCiVU7ELrQAAAAABJRU5ErkJggg=="/ width="150%">
                </a>

        </abbr>
        </div>
    </nav> 
    <div class="Tips">
        <h1  style="text-align: center;"><u><br>Bed-1</u></h1>
        
        <ul class="bed1">

            <li>Crop :<?php echo $_SESSION['Bed_1']; ?></li><br>
            <li>Date :<?php echo $_SESSION['Date_Bed']; ?></li><br>
            <li>Check Real time visualisation : 
                <ul>
                    <li>Temperature : <a href="http://localhost:5000/temp"> Click me!</a></li><br>
                    <li>Moisture: <a href="http://localhost:5000/moist"> Click me!</a></li></ul>
                </li>

            
        </ul>

        <div style="align-items: center;">
            <div class="button">Manual Water Control :<br><br>
                <form method="post">
                <input type="submit" value="Start" name="Start">
                <input type="submit" value="Stop" name="Stop">
            </form>
        </div>
        </div>
    </div>

</body>
</html>