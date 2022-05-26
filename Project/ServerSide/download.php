<?php
	$conn = new PDO('mysql:host=localhost; dbname=test', 'root', '');
 
	if(ISSET($_REQUEST['Nome'])){
		$file = $_REQUEST['Nome'];
		$query = $conn->prepare("SELECT * FROM files WHERE Nome='$file'");
		$query->execute();
		$fetch = $query->fetch();
 
		header("Content-Disposition: attachment; filename=".$fetch['file']);
		header("Content-Type: application/octet-stream;");
		readfile("./Uploads/".$fetch['file']);
	}
?>

