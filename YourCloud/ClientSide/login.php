<?php
    session_start();

    if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
        header('location: ../register.php');
        exit;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../Style/login.css">
        <link rel="stylesheet" href="../Style/navbar.css">
        <link rel="stylesheet" href="../Style/footer.css">
        <script src="../Script/loginBackground.js"></script>
        <title>Login</title>
    </head>
    <body style="overflow-y: hidden;">
        <nav class="navbar" id="bar">
            <a href="../register.php" id="logo">YourCloud</a>
            <input type="checkbox" id="toggler">
            <label for="toggler"><i class="ri-menu-line"></i></label>
            <div class="menu">
                <ul class="list">
                    <li><a href="sobre.html" target=_blank>Sobre Nós</a></li>
                    <li><a href="../register.php">Registar</a></li>
                    <li>
                        <input type="checkbox" id="tema" onclick="background()">
                        <label for="tema" class="button" id="button"></label>
                    </li>
                </ul>
            </div>
        </nav>
        <br>
        <div class="box" id="box">
            <form action="../ServerSide/login.php" method="post">
                <span class="text-center">login</span>
                <div class="input-container">
                    <input type="text" name="UserName"/>
                    <label>UserName</label>		
                </div>
                <div class="input-container">		
                    <input type="password" name="Pass"/>
                    <label>Password</label>
                </div>
                <div style="color: rgb(94, 2, 89);"><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];}?></div>
            
                <div id="divbtn">
                    <button type="submit" class="btn" name="login">Login</button>
                </div>    
            </form>	
        </div>
        <div class="bg"></div>
        <div class="bg bg2"></div>
        <div class="bg bg3"></div>
        <footer>YourCloud</footer>
    </body>
</html>