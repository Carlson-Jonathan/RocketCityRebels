<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Hello world!</p>

	<?php
	$password = "Carlson/Kadous CS499 Senior Project";
	
	$hash = password_hash($password, PASSWORD_DEFAULT);
	
	echo "<p>$hash</p>";

	?>

</body>
</html>