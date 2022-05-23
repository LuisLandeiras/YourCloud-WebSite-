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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

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
                <li><a onclick="view()" style="cursor: pointer;">Upload</a></li>
                <li>
                    <input type="checkbox" id="tema" onclick="background()">
                    <label for="tema" class="button" id="button"></label>
                </li>
            </ul>
        </div>
    </nav>
    <br>

    <div class="tabela" style="display: none;"> 
        <form action="" method="post" enctype="multipart/form-data" >
            <div id="container">
                <div id="texto"><h3>Upload File</h3></div>
                <div id="close"><button onclick="close()">X</button></div>
            </div>
            <input type="file" name="myfile"> <br> <br>
            <button type="submit" name="save">upload</button>
        </form>
    </div>

    <script>
        function view() {
            document.getElementsByClassName("tabela")[0].style.display = "block";
            document.getElementsByClassName("tabela")[0].style = "position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);";
        }
        function close(){
            document.getElementsByClassName("tabela")[0].style.display = "none";
        }
	</script>

<table class="tb">
			<thead>
				<tr>
					<th>#</th>
					<th>File</th>
                    <th>Size(Mb)</th>	
                    <th>View</th>
                    <th>Download</th>
                    <th>Eliminar</th>
				</tr>
			</thead>
			<?php
			$query=$conn->query("select * from files order by id desc");
            $i = 0;
			while($row=$query->fetch()){
				$name=$row['Nome'];
                $i++;
                $size=$row['Tamanho'];
			?>
			<tr>
                <td><?php echo $i;?></td>
				<td>&emsp;<?php echo $name;?></td>
                <td>&emsp;<?php echo number_format((float)$size/1024/1024, 3);?></td>
                <td><a href="./Uploads/<?php echo $row['Nome'];?>" target="_blank">view</a></td>
				<td><a href="">download</a></td>
                <td><a href="?delete=<?php echo $row['id']; ?>">eliminar</a></td>
			</tr>
			<?php } ?>
	</table>

</body>
</html>

