<?php
    $db = new mysqli('localhost','project','diot','esp32');

    //Check connection
    if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
    }   
   // copy the query---->create table trigger_sensor(sensor varchar(10),status int);
   //copy the query----->insert into trigger_sensor values("sensor1",0);
    
    $sql = "update trigger_sensor set status=1 where sensor like 'sensor1';";
    $sql_1 = "update trigger_sensor set status=0 where sensor like 'sensor1';";


?>
<html>
    <head>
<script>
    function start(){
<?php

if(isset($_POST['start']))
{
    $db->query($sql);

}
if(isset($_POST['stop']))
{
    $db->query($sql_1);
}
        ?>
    }

</script>
    </head>
    <body>
        <form method="post">
        <input type="submit" value="Start" name="start">
        <input type="submit" value="Stop" name="stop">

    </form>
    </body>
</html>