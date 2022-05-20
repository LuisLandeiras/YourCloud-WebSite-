<?php 
    session_start(); 
	if (isset($_SESSION['username'])) {	
		header('location: login.php');
	}
?>
<?php include 'upload.php';?>
<?php include 'download.php';?>
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
    <form action="upload.php" method="post" enctype="multipart/form-data" >
        <h3>Upload File</h3>
        <input type="file" name="myfile"> <br> <br>
        <button type="submit" name="save">upload</button>
    </form>
    <br>



    <table>
			<thead>
				<tr>
					<th>#</th>
					<th>File</th>
                    <th>Size(Mb)</th>	
                    <th>View</th>
                    <th>Download</th>
				</tr>
			</thead>
			<?php
			$query=$conn->query("select * from files order by id desc");
			while($row=$query->fetch()){
				$name=$row['Nome'];
                $id=$row['id'];
                $size=$row['Tamanho'];
			?>
			<tr>
                <td><?php echo $id;?></td>
				<td>&emsp;<?php echo $name;?></td>
                <td>&emsp;<?php echo number_format((float)$size/1024/1024, 3);?></td>
                <td></td>
				<td><button><a href="download.php?file='. urlencode($image) . '"></a>download</button></td>
			</tr>
			<?php }?>
		</table>
</body>
</html>