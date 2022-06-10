<!--
  Trabalho realizador por:
  Luís Alves a46107
  Ana Pires a45723
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="./Style/register.css">
        <link rel="stylesheet" href="./Style/registerAnimation.css">
        <link rel="stylesheet" href="./Style/footer.css">
        <link rel="stylesheet" href="./Style/navbar.css">
        <script src="./Script/registerBackground.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <title>YourCloud</title>
    </head>
    <body>
      <nav class="navbar" id="bar">
        <a href="register.php" id="logo">YourCloud</a>
        <input type="checkbox" id="toggler">
        <label for="toggler"><i class="ri-menu-line"></i></label>
        <div class="menu">
            <ul class="list">
                <li><a href="./ClientSide/sobre.html" target=_blank>Sobre Nós</a></li>
                <li><a href="./ClientSide/login.php">Login</a></li>
                <li>
                    <input type="checkbox" id="tema" onclick="background()">
                    <label for="tema" class="button" id="button"></label>
                </li>
            </ul>
        </div>
      </nav>
      <br>
      <form class="box" id="box" action="./ServerSide/register.php" method="post">
        <h3 id="h3">Faça já o seu Registo:</h3>
        <br>
          <div class="input-container">
            <input type="text" required="" name="Nome">
            <label>Primeiro Nome</label>
            <br>
          </div>
          <div class="input-container">
            <input type="text" required="" name="UserName">
            <label >UserName</label>
          </div>
          <div class="input-container">
            <input type="password" minlength="8" maxlength="20" id="pass" required="" name="Pass">
            <label>Password</label>
          </div>
          <div class="input-container">
            <input type="password" minlength="8" maxlength="20" id="repitepass" required="" name="PassConf"> 
            <label>Repita a Password</label>  
          </div>
        <button type="submit" id="submit" value="Registar" name="registar">Registo</button>
        <button type="reset" id="reset" value="Limpar">Limpar</button>
        
        <p id="ou"> <br> ------Ou------</p>
        <br>
        <a href="./ClientSide/login.php" id="login">Faça login</a>
      </form>
      <br>
      <div class="container" style="display: flex; flex-direction: row; align-items: center; justify-content: space-around;">
        <div class="box" style="margin: 0px;">
          <span></span>
          <div class="content">
            <h2>Ficheiros</h2>
            <p>Suporta todo o tipo de ficheiros.</p>
            <a href="./ClientSide/sobre.html#mensagem1" target=_blank>Read More</a>
          </div>
        </div>
        <div class="box" style="margin: 0px;">
          <span></span>
          <div class="content">
            <h2>Armazenamento</h2>
            <p>Uma quantidade minima garantida de armazenamento a cada utilizador.</p>
            <a href="./ClientSide/sobre.html#mensagem2" target=_blank>Read More</a>
          </div>
        </div>
      </div>

    <footer>YourCloud</footer>
    </body>
    <?php include './Templates/back.html';?>
</html>