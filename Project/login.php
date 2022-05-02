<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./Style/login.css">
        <link rel="stylesheet" href="./Style/navbar.css">
        <link rel="stylesheet" href="./Style/footer.css">
        <script src="./Script/loginBackground.js"></script>
        <title>Login</title>
    </head>
    <body>
        <?php include './Templates/nav.php';?>
        <div class="box" id="box">
            <form action="./DataBase/login.php" method="GET">
                <span class="text-center">login</span>
                <div class="input-container">
                    <input type="text" required=""/>
                    <label>UserName</label>		
                </div>
                <div class="input-container">		
                    <input type="password" required=""/>
                    <label>Password</label>
                </div>
                <div id="divbtn">
                    <button type="submit" class="btn">Login</button>
                </div>    
            </form>	
        </div>
        <?php include './Templates/footer.php';?>
        <div class="bg"></div>
        <div class="bg bg2"></div>
        <div class="bg bg3"></div>
    </body>
</html>