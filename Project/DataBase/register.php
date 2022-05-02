<?php 
    $sql = mysqli_connect('localhost', 'root', '', 'test');
    $Nome = $_POST['Nome'];
    $UserName = $_POST['UserName'];
    $Pass = $_POST['Pass'];
    $user_info = "INSERT INTO registos (Nome, UserName, Pass) VALUES ('$Nome', '$UserName', '$Pass')";
    $result = mysqli_query($sql, $user_info);
    if($result){
        header("Location: index.php");
    }else{
        echo "Erro ao registar!";
    }
    mysqli_close($sql);
?>
