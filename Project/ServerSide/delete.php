<?php 
    $conn = new PDO('mysql:host=localhost; dbname=test', 'root', '');
    if(isset($_REQUEST['delete'])){
        $id=$_REQUEST['delete'];
        $select_stmt=$conn->prepare('SELECT * FROM files WHERE id=:id');
        $select_stmt->bindParam(':id', $id);
        $select_stmt->execute();
        $row=$select_stmt->fetch(PDO::FETCH_ASSOC);

        unlink("./Uploads/".$row['Nome']);

        $delete_stmt=$conn->prepare('DELETE FROM files WHERE id=:id');
        $delete_stmt->bindParam(':id', $id);
        $delete_stmt->execute();
        
        header("location: ../ClientSide/home.php");
    }
?>