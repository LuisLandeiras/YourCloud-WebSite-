<?php
    session_start();

    $db = mysqli_connect('localhost', 'root', '', 'test');

    $name = $_POST['Nome'];
    $username = $_POST['UserName'];
    $password = $_POST['Pass'];
    $pass = $_POST['PassConf'];

    $sql = "SELECT * FROM registos WHERE UserName = '$username'";
    $result = mysqli_query($db, $sql);
    $num = mysqli_num_rows($result);

    if($pass !== $password){
        $_SESSION['mess'] = "Passwords não coincidem.";
        header('location: ../register.php');

    }
    else if($num == 1){
        $_SESSION['mess'] = "Username já existe.";
        header('location: ../register.php');
    }
    else{
        $sql = "INSERT INTO registos (Nome, UserName, Pass) VALUES ('$name', '$username', '$password')";
        mysqli_query($db, $sql);
        header("Location: ../ClientSide/login.php");
    }  
?>
