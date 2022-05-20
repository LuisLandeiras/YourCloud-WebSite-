<?php
    session_start();

    $db = mysqli_connect('localhost', 'root', '', 'test');

    $name = $_POST['Nome'];
    $username = $_POST['UserName'];
    $password = $_POST['Pass'];

    $sql = "SELECT * FROM registos WHERE UserName = '$username' && Pass = '$password'";
    $result = mysqli_query($db, $sql);
    $num = mysqli_num_rows($result);

    if($num == 1){
        $_SESSION['UserName'] = $username;
        header('location: home.php');
    }
    else{
        header('location: ../ClientSide/login.php');
    }
?>