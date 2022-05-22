<?php
	$conn = new PDO('mysql:host=localhost; dbname=test', 'root', '');
	if(isset($_POST['save']) != ""){
	  $name=$_FILES['myfile']['name'];
	  $size=$_FILES['myfile']['size'];
	  $temp=$_FILES['myfile']['tmp_name'];
	  $fname = $name;
	  $chk = $conn->query("SELECT * FROM  files where Nome = '$name' ")->rowCount();
	  if($chk){
	    $i = 1;
	    $c = 0;
		while($c == 0){
	    	$i++;
	    	$reversedParts = explode('.', strrev($name), 2);
	    	$tname = (strrev($reversedParts[1]))."_".($i).'.'.(strrev($reversedParts[0]));
	    	$chk2 = $conn->query("SELECT * FROM  files where Nome = '$tname' ")->rowCount();
	    	if($chk2 == 0){
	    		$c = 1;
	    		$name = $tname;
	    	}
	    }
	}
	    $move =  move_uploaded_file($temp,"./Uploads/".$fname);
	    if($move){
	    	$query=$conn->query("insert into files(Nome, Tamanho)values('$name', '$size')");
	        if($query){
	            header("location:home.php");
	        }
	    }
	}
?>