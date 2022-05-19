<?php 
  
  session_start(); 
	if (isset($_SESSION['username'])) {	
		header('location: login.php');
	}
?>
<?php include 'files.php';?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
    <link rel="stylesheet" type="text/css" href="../Style/navbar.css">
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
	<menu>
		<li><input type="checkbox" id="pdf" ><label for="pdf">PDF</label></li>
		<li><input type="checkbox" id="mp3"><label for="mp3">MP3</label></li>
	</menu>
    <form action="home.php" method="post" enctype="multipart/form-data" >
        <h3>Upload File</h3>
        <input type="file" name="myfile"> <br> <br>
        <button type="submit" name="save">upload</button>
    </form>
    <br>
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>Download</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $stmt = $conn->prepare("select * from files");
                            $stmt->execute();
                            while($row = $stmt->fetch()){
                        ?>
                        <tr>
                            <td><?php echo $row['Id']?></td>
                            <td><?php echo $row['name']?></td>
                            <td><a href="files.php" class="btn btn-primary">Download</a></td>
                        </tr>
                        <?php
                            }
                        ?>

                    </tbody>
            </table>
        </div>
    </div>
</body>
</html>