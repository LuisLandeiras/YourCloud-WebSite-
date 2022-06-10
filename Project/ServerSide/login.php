<?php
    session_start();

    $db = mysqli_connect('localhost', 'root', '', 'test');

   if (isset($_POST['UserName'])) {
        $username = $_POST['UserName'];
    }
    else {
        $username = "";
    }
    if (isset($_POST['Pass'])) {
        $password = $_POST['Pass'];
    }
    else {
        $password = "";
    }

    if(empty(trim($username))){
        echo "Please enter a username.";
    }
    elseif(empty(trim($password))){
        echo "Please enter a password.";
    }
    
    $sql = "SELECT * FROM registos WHERE UserName = '$username' && Pass = '$password'";
    $result = mysqli_query($db, $sql);
    $num = mysqli_num_rows($result);

    if($num == 1){
        session_start();
        $_SESSION['UserName'] = $username;
        $_SESSION['logged'] = true;
        header('location: ../ClientSide/home.php');
    }
    else{
        $_SESSION['message'] = "Username ou Password incorretos.";
        header('location: ../ClientSide/login.php');
    }
?>