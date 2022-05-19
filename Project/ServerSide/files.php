<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'test');

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = './ServerSide' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
   

    if (!in_array($extension, ['jpg', 'pdf', 'png', 'jpeg'])) {
        echo "You file extension must be .jpg, .pdf, .png or .jpeg";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

//Downloads files
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $stat = $conn->prepare("select * fromm files where id=?");
    $stat->bind_param(1,$id);
    $stat->execute();
    $data = $stat->fetch();

    $file = './ServerSide' .$data['name'];

    if(file_exists($file)){
        header('Content-Disposition: '.'name ="' .basename($file).'"');
        header('Content-Length: '.filesize($file));
        readfile($file);
        exit;
    }
}
?>