<?php
$page = $_SERVER['PHP_SELF'];
$sec = "2";
?>
<html>
<head>
	<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
	<title>Real time Visualtisation</title>
</head>
<body>
	<img src="../plot.png" alt="Real-time Data Plot" width="60%" style="border-radius: 26px;">
	<form action="http://localhost:4000/mycrops_exists.php">
	<input type="submit" value="Go back">
	</form>
</body>
</html>
