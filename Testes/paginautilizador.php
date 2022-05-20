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
    <link rel="stylesheet" type="text/css" href="../Project/Style/navbar.css">
    <link rel="stylesheet" type="text/css" href="paginautilizador.css">
</head>
<body>
	<nav class="navbar" id="bar">
        <a href="index.php" id="logo" target=_blank>YourCloud</a>
        <input type="checkbox" id="toggler">
        <label for="toggler"><i class="ri-menu-line"></i></label>
        <div class="menu">
            <ul class="list">
                <li><a href="sobre.php" target=_blank>Sobre Nós</a></li>
				<li><a href="logout.php">Logout</a></li>
                <li>
                    <input type="checkbox" id="tema" onclick="background()">
                    <label for="tema" class="button" id="button"></label>
                </li>
            </ul>
        </div>
    </nav>
    <br>

    <div>
        <form action="" method="post" enctype="multipart/form-data" >
            <h3>Upload File</h3>
            <input type="file" name="myfile"> <br> <br>
            <button type="submit" name="save">upload</button>
        </form>
    </div>

</body>
</html>