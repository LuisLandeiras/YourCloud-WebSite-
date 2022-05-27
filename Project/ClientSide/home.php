<?php 
  session_start(); 
	if (isset($_SESSION['id'])) {	
		header('location: ../ServerSide/login.php');
	}
?>
<?php include '../ServerSide/upload.php';?>
<?php include '../ServerSide/download.php';?>
<?php include '../ServerSide/delete.php';?>
<!DOCTYPE html>
<html>
    <head>
    	<title>Home</title>
        <link rel="stylesheet" type="text/css" href="../Style/navbar.css">
        <link rel="stylesheet" type="text/css" href="../Style/home.css">
        <script src="../Script/homeBackground.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    </head>
    <body style="height:100vh;width:100%;overflow-x:none">
    	<nav class="navbar" id="bar">
            <a href="../register.php" id="logo" target=_blank>YourCloud</a>
            <input type="checkbox" id="toggler">
            <label for="toggler"><i class="ri-menu-line"></i></label>
            <div class="menu">
                <ul class="list">
                    <li><a onclick="view()" style="cursor: pointer;">Upload</a></li>
    				<li><a href="../ServerSide/logout.php">Logout</a></li>
                    <li>
                        <input type="checkbox" id="tema" onclick="background()">
                        <label for="tema" class="button" id="button"></label>
                    </li>
                </ul>
            </div>
        </nav>
        <br>
        <div class="tabela" style="display: none;"> 
            <form action="../ServerSide/upload.php" method="post" enctype="multipart/form-data" >
                <div id="container">
                    <div id="texto"><h3>Upload File</h3></div>
                    <div id="close"><button onclick="close()">X</button></div>
                </div>
                <input type="file" name="myfile"> <br> <br>
                <button type="submit" name="save">upload</button>
            </form>
        </div>
        <script src="../Script/homeUpload.js"></script>
        <table style="margin-left: auto; margin-right:auto; width:80%; height:auto; border-radius:15px; border-spacing:0; margin-top:50px">
        	<thead>
        		<tr>
        			<th style="color: white; border-bottom:1px solid white">#</th>
        			<th style="color: white; border-bottom:1px solid white">File</th>
                    <th style="color: white; border-bottom:1px solid white">Size(Mb)</th>	
                    <th style="color: white; border-bottom:1px solid white">View</th>
                    <th style="color: white; border-bottom:1px solid white">Download</th>
                    <th style="color: white; border-bottom:1px solid white">Eliminar</th> 
        		</tr>
        	</thead>
        	<?php
        	$query=$conn->query("SELECT *  from  files Where (SELECT Id FROM registos WHERE UserName = '".$_SESSION["UserName"]."')=idu order by id desc");
            $i = 0;
        	while($row=$query->fetch()){
        		$name=$row['Nome'];
                $i++;
                $size=$row['Tamanho'];
        	?>
        	<tr>
                <td style="color: white; text-align:center; border-bottom:1px solid white; height: 50px"><?php echo $i;?></td>
        		<td style="color: white; text-align:center; border-bottom:1px solid white">&emsp;<?php echo $name;?></td>
                <td style="color: white; text-align:center; border-bottom:1px solid white">&emsp;<?php echo number_format((float)$size/1024/1024, 3);?></td>
                <td style="text-align:center; border-bottom:1px solid white"><a href="../ServerSide/Uploads/<?php echo $row['Nome'];?>" target="_blank">view</a></td>
        		<td style="text-align:center; border-bottom:1px solid white"><a href="../ServerSide/download.php?file_id=<?php echo $row['id'] ?>">download</a></td>
                <td style="text-align:center; border-bottom:1px solid white"><a href="../ServerSide/delete.php?delete=<?php echo $row['id']; ?>">eliminar</a></td>  
        	</tr>
        	<?php } ?>
        </table>
    </body>
</html>