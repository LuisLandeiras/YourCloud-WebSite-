<!DOCTYPE html>
<?php include('include/config.php');?>
<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="./Style/index.css">
        <link rel="stylesheet" href="./Style/indexAnimation.css">
        <link rel="stylesheet" href="./Style/navbar.css">
        <link rel="stylesheet" href="./Style/footer.css">
        <script src="./Script/indexBackground.js"></script>
        <script src="./Script/indexPass.js"></script>
        <title>YourCloud</title>
    </head>
    <body>
      <?php include './Templates/nav.php';?>
      <form id="box">
          <h3 id="h3">Faça já o seu Registo:</h3>
          <label>Primeiro Nome:</label>
          <br>
          <input type="text">
          <br>
          <p></p>
          <label>Apelido:</label>
          <br>
          <input type="text">
          <br>
          <p></p>
          <label>UserName</label>
          <br>
          <input type="text">
          <br>
          <p></p>
          <label>Password:</label>
          <br>
          <input type="password" minlength="8" id="pass">
          <br>
          <p></p>
          <label>Repita a Password:</label>
          <br>
          <input type="password" id="repitepass">   
          <br>
          <p></p>
          <button type="submit" id="submit" value="Registar" onclick="equal()">Registar</button>
          <button type="reset" id="reset" value="Limpar">Limpar</button>
          <p id="ou"> <br> ------Ou------</p>
          <br>
          <a href="login.html" id="login">Faça login</a>
      </form>
      <br>
      <div class="container">
          <div class="box">
            <span></span>
            <div class="content">
              <h2>Card one</h2>
              <p>Suporta todo o tipo de ficheiros.</p>
              <a href="#">Read More</a>
            </div>
          </div>
          <div class="box">
            <span></span>
            <div class="content">
              <h2>Card two</h2>
              <p>Privacidade e segurança garantidas.</p>
              <a href="#">Read More</a>
            </div>
          </div>
          <div class="box">
            <span></span>
            <div class="content">
              <h2>Card Three</h2>
              <p>Uma quantidade minima garantida de armazenamento a cada utilizador.</p>
              <a href="#">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include './Templates/footer.php';?>
      <div class="stars" id="stars">
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
          <div class="star"></div>
      </div>
    </body>
</html>