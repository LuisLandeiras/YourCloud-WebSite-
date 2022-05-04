<?php
    session_start();
    header('location: ../ClientSide/login.html');

    $db = mysqli_connect('localhost', 'root', '', 'test');

    $name = $_POST['Nome'];
    $username = $_POST['UserName'];
    $password = $_POST['Pass'];
    $pass = $_POST['PassConf'];

    $sql = "SELECT * FROM registos WHERE UserName = '$username'";
    $result = mysqli_query($db, $sql);
    $num = mysqli_num_rows($result);

    if($pass !== $password){
        echo "Passwords do not match";
        header('location: ../register.html'); 
    }
    else if($num == 1){
        header('location: ../register.html');
        echo "Username already exists";
    }
    else{
        $sql = "INSERT INTO registos (Nome, UserName, Pass) VALUES ('$name', '$username', '$password')";
        mysqli_query($db, $sql);
        $_SESSION['success'] = "You are now logged in";
        echo $_SESSION['success'];
    }  
?>
