<?php
$conn = mysqli_connect('localhost', 'root', '', 'test');

if (isset($_POST['save'])) { 
    session_start();
    $filename = $_FILES['myfile']['name'];

    $destination = './Uploads/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'jpeg', 'jpg', 'png', 'mp3', 'mp4','txt', 'PNG', 'JPG', 'JPEG', 'PDF'])) {
        $_SESSION['msg'] = "Extensão não suportada. A extensão deve ser: .zip, .pdf, .jpeg, .jpg, .png, .mp3, .mp4, .txt.";
        header('location: ../ClientSide/home.php');
    } elseif ($_FILES['myfile']['size'] > 41943040) {
        $_SESSION['msg'] = "Ficheiro muito grande. O ficheiro deve ter menos de 40Mb.";
        header('location: ../ClientSide/home.php');
    } else {
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (Nome, Tamanho,idu) VALUES ('$filename', '$size',(SELECT Id FROM registos WHERE UserName = '".$_SESSION["UserName"]."'))";
            if (mysqli_query($conn, $sql)) {
                header("Location: ../ClientSide/home.php");
            }
        } else {
            $_SESSION['msg'] = "Upload falhou. Tente novamente.";
            header('location: ../ClientSide/home.php');
        }
    }
}
?>
