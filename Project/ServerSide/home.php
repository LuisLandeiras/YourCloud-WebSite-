<?php 
  session_start(); 
	if (isset($_SESSION['username'])) {	
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
	<a href="logout.php">Logout</a>	
</body>
</html>