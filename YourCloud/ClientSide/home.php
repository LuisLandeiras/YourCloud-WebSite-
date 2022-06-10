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
        <script src="../Script/homeBackground.js"></script>
        <script src="../Script/homeUpload.js"></script>
        <script src="../Script/pdf.js"></script>
        <script src="../Script/api.js"></script>
        <script src="../Script/avisos.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <style>
            body{
                background: linear-gradient(black 30%, rgb(94, 2, 89));
                font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-repeat: no-repeat;
                height: auto;
                width: 100%;
                overflow-x: hidden;
            }
            h3{
              color: white;
              text-align: center;
            }
            .tabela{
                width: 500px;
                height: auto;
                margin-right: auto;
                margin-left: auto;
                background-color: rgba(0,0,0,0.5);
                color: white;
                padding: 10px;
                border-radius: 10px;
                margin-top: 10px;
                border : 1px solid white;
            }
            .tabela #container{
              display: flex;
              justify-content: center;
              width: 100%;
              border-bottom: 1px solid rgb(255, 252, 252);
              margin-bottom: 10px;
              text-align: center;
            }
            .tabela #container #texto{
              width: 90%;
            }
            .btn {
              text-decoration: none;
              background:transparent;
              border: 1px solid rgb(94, 2, 89);
              position: relative;
              overflow: hidden;
              font-family: Arial, Helvetica, sans-serif;
              color:rgb(94, 2, 89);
              outline: none;
              padding:10px 20px;
              text-transform:uppercase;
              border-radius:2px;
              cursor:pointer;
            }
            #divbtn {
              text-align: center;
              width: 100%;
            } 
            .btn:hover {
              box-shadow: 1px 1px 25px 10px rgba(81, 1, 90, 0.4);
            }
            .btn:before {
              content: "";
              position: absolute;
              top: 0;
              left: -100%;
              width: 100%;
              height: 100%;
              background: linear-gradient(
                120deg,
                transparent,
                rgba(79, 0, 77, 0.4),
                transparent
              );
              transition: all 650ms;
            } 
            .btn:hover:before {
              left: 100%;
            }
            #close{
                border: none;
                border-radius: 20px;
                height: 15px;
                background-color: red;
                color: white;
                right: 5px;
                top: 5px;
                text-align: center;
                margin-left: 450px;
                width: 5%;
            }
            .b{
                text-decoration: none;
                color: #fe34ae;
            }
        </style>
    </head>
    <body>
    	<nav class="navbar" id="bar" style="width: 97%">
            <a href="../register.php" id="logo" target=_blank>YourCloud</a>
            <input type="checkbox" id="toggler">
            <label for="toggler"><i class="ri-menu-line"></i></label>
            <div class="menu">
                <ul class="list">
                    <li><div id="divbtn"><button class="btn" onclick="PDF()">PDF</button></div></li>
                    <li><a onclick="view()" style="cursor: pointer;">Upload</a></li>
    				<li><a href="../ServerSide/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <form action="../ServerSide/upload.php">
            <div style="color:rgb(94, 2, 89);" class="msg-success">
                <?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];}?>
            </div>
        </form>
        <table style="margin-left: 2%; width:95%; height:auto; border-radius:15px; border-spacing:0; margin-top:50px;">
        	<thead>
        		<tr>
        			<th style="color: white; border-bottom:1px solid white">#</th>
        			<th style="color: white; border-bottom:1px solid white">Ficheiro</th>
                    <th style="color: white; border-bottom:1px solid white">Tamanho(Mb)</th>	
                    <th style="color: white; border-bottom:1px solid white">Visualizar</th>
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
                <td style="text-align:center; border-bottom:1px solid white"><a class="b" href="../ServerSide/Uploads/<?php echo $row['Nome'];?>" target="_blank">Visualizar</a></td>
        		<td style="text-align:center; border-bottom:1px solid white"><a class="b" href="../ServerSide/download.php?file_id=<?php echo $row['id'] ?>">Download</a></td>
                <td style="text-align:center; border-bottom:1px solid white"><a class="b" href="../ServerSide/delete.php?delete=<?php echo $row['id']; ?>">Eliminar</a></td>  
        	</tr>
        	<?php } ?>
        </table>
        <div class="tabela" style="display:none;"> 
            <form action="home.php">
                <button onclick="close()" id="close">X</button>
            </form>
            <form action="../ServerSide/upload.php" method="post" enctype="multipart/form-data" >
                <div id="container">
                    <div id="texto"><h3>Upload File</h3></div>
                </div>
                <input type="file" name="myfile"> <br> <br>
                <div id="divbtn">
                    <button class="btn" type="submit" name="save">upload</button>
                </div>
            </form> 
        </div>
        <div style="margin-top: 38%;">
            <div id="ttt" style="color: white;" >A temperatura é: </div>
            <div id="aaa" style="color: white;">O tempo é: </div>
        </div>
    </body>
</html>