<?php
session_start();
if($_SESSION['name_of_user'] == ""){
    header("Location: http://localhost:4000/session_expired.html");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="pro.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IoT Enabled E-Farming & Monitoring System</title>
    <!-- <link rel="stylesheet" href="pro.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;  
            background-image: url('./website/benjamin-davies-Zm2n2O7Fph4-unsplash.jpg');

            /* filter: blur(2px); */
            
        }
        
        /* .title {
            background-image: url('benjamin-davies-Zm2n2O7Fph4-unsplash.jpg');
            filter: blur(1px);
        } */
        header {
            background-color: transparent;
            color: white;
            padding: 15px;
            text-align: center;
        }
        nav {
            background-color: #c7c7c7;
            overflow: hidden;
            font-weight: bold;
            height: 50px;
        }
        nav a {
            float: left;
            display: block;
            color: whitesmoke;
            text-align: center;
            padding: 16px 25px;
            text-decoration: none;
            font-size: medium;
            font-weight: bold;
            text-shadow: 0 0 5px rgba(0,0,0,0.9);
            
        }
        /* nav {
            background-color: transparent;
        } */
        nav a:hover {
            background-color: #e9ebea;
            color: black;
            font-weight: 800;
            text-decoration:underline;
        }
        .container {
            padding: 30px;
            font-weight: 800;
            backdrop-filter: blur(5px);
            /* background-color: aqua; */

        }
        h2 {
            color: #4CAF50;
            font-weight: 800;

        }
        p {
            line-height: 1.3;
            font-weight: 800;

        }
        .bg-text {
            /* background-color: rgb(0,0,0); Fallback color */
            background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
            /* color: white; */
            font-weight: bold;
            border: 2px solid #f1f1f1;
            position: relative;
            /* height: -30vh; */
            /* top: 50%; */
            left: 50%;
            transform: translate(-50%, -0%);
            /* z-index: 4; */
            /* height: 100%; */
            width: 100%;
            padding: 10px;
            /* text-align: center; */
        }
        .set12 {
            float: right;
            /* height: 5%; */
            width: 5%;
            margin-bottom: auto;
            /* text-shadow: 0 0 5px rgba(0,0,0,0.9); */
            /* box-shadow: 10px 10px 5px lightblue; */
        }
    </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>

        <div class="bg-text">
            <h1 style="font-size:50px">Welcome to E-Farming System</h1>
            <h3> Hi 

             <?php
             $name_user = $_SESSION['name_of_user'];
             $email_user = $_SESSION['email_of_user'];
             echo $name_user; ?>!</h3>
          </div>
        <!-- <span class="title"><h1>Welcome to E-Farming System</h1></span> -->
        <!-- <div style="background-color: transparent;"></div> -->
        <!-- <div class="img"style="filter: blur(10px);">
        <a background-image="blur"></a>
        </div> -->
    </header>
    <nav>
        <a href="http://localhost:4000/connection_establish.php">Home</a>
        <a href="about.html">About Us</a>
        <a href="#">Documentation</a>
        <a href="http://localhost:4000/CropInfo.html">Crop Info</a> 
        <a href="http://localhost:4000/AddCrop.php">Add Crops</a> 
        <a href="http://localhost:4000/MyCrops.php">My Crops</a> 
        <!-- <ul class="list">
          <li><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Documentation</a></li>
          <li><a href="#">Visualisation</a></li>
        </ul> -->
        <div class="set12">

            <box-icon name='user' type='solid' ></box-icon>
            
            <abbr title="Accounts">
            <a href="http://localhost:4000/test.php"> 
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABMAAAATCAYAAAByUDbMAAAA9ElEQVQ4T9WUwQ2CQBBFoQLtQDtQKxAq0A7UDrACtQK1A+zADqQDoQItQTvwvwTNZLMLHrgwyT+Q2X0zf3ZCHHUYcYesqF+woazvpKn0kg5S+c84fDYLXZybywBn0lOi0CQArlzYWAcfnsN0t5cS6RaApS4Ma/cGGMXWAVjus8l8XCvYbJ2bD0b1k7SQqtre1XRDZytPd9vQngEcSW9PR8B8VjMXttTBowTMBp3yCLxsMCwsq0Ghw4USaZ2kMzq3cbEwqg6aKiu3kXIJsN1Frv1WI9FHaH8s/6wPHLBCLLCN8tsZSebSFqwHMG/066/RZjWY/wCKCiVU7ELrQAAAAABJRU5ErkJggg=="/ width="150%">
                </a>

        </abbr>
        </div>
    </nav> 
    

        

<br>
        <!-- <div class="box">
            <div class="container">
                
                    <h1>Rabi</h1>
                    <label for="touch"><div class="saan">Crops &nbsp;</div></label>               
                    <input type="checkbox" id="touch"> 

                    <ul class="slide" >
                        <li ><a href="wheat.html" class="bg">Wheat</a></li>                       
                        <li ><a href="Peas.html" class="bg">Peas</a></li>
                        <li ><a href="gram.html" class="bg">Gram</a></li>
                        <li ><a href="mustard.html" class="bg">Mustard</a></li>
                    </ul>
               

            </div>
        </div>

        <div class="box1">
            <div class="container">
                
                    <h1>Kharif</h1>
                    <label for="touch1"><div class="saan1">Crops &nbsp;</div></label>               
                    <input type="checkbox" id="touch1"> 

                    <ul class="slide1">
                        <li><a href="#" class="bg">Rice</a></li> 
                        <li><a href="#" class="bg">Maize</a></li>
                        <li><a href="#" class="bg">Jowar</a></li>
                        <li><a href="#" class="bg">Soyabean</a></li>
                        <li><a href="#" class="bg">Bajra</a></li>
                    </ul>
               

            </div>
        </div>

        <div class="box2">
            <div class="container">
                
                    <h1>Zaid</h1>
                    <label for="touch2"><span class="saan2">Crops &nbsp;</span></label>               
                    <input type="checkbox" id="touch2"> 

                    <ul class="slide2">
                        <li><a href="#" class="bg">Seasonal Fruits</a></li> 
                        <li><a href="#" class="bg">Vegetables</a></li>
                       
                    </ul>
               

            </div>
        </div> -->

        
        <footer>
        <div class="footer">

            <div class="footercontainer">
                <div class="socialIcons">
           <a href="https://github.com/cdac"><i class="fa-brands fa-github"></i></a>
           <a href="mailto:  info@efarmingsystem.com"><i class="fa-brands fa-google-plus"></i></a>
           <a href="www.linkedin.com/in/cdac"><i class="fa-brands fa-linkedin"></i></a>
        </div>
        <div class="footerNav">
            <ul >
            
                <li><a href="./about.html">Contact us</a></li>
                <li><a href="./CropInfo.html">Crop Info</a></li>
                <li><a href="./e-farming.pdf">Document</a></li>
            </ul>
        </div>
        
    </div>
    <div class="footerbottom">
        <p>Copyright  &copy;2024; Designed by <span class="designer">DIoT</span></p>
    </div>
</div>
       </footer>
</body>
</html>
