<?php
$conn = mysqli_connect('localhost', 'root', '', 'test');

// Uploads files
if (isset($_POST['save'])) { 
    session_start();
    $filename = $_FILES['myfile']['name'];

    $destination = './Uploads/' . $filename;
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'jpeg', 'jpg', 'png', 'mp3', 'mp4','txt', ])) {
        echo "You file extension must be .zip, .pdf, .jpeg, .jpg, .png, .mp3, .mp4, .txt";
    } elseif ($_FILES['myfile']['size'] > 41943040) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (Nome, Tamanho,idu) VALUES ('$filename', '$size',(SELECT Id FROM registos WHERE UserName = '".$_SESSION["UserName"]."'))";
            if (mysqli_query($conn, $sql)) {
                header("Location: ../ClientSide/home.php");
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

