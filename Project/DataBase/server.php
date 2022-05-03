<?php
session_start();

// initializing variables
$Nome = "";
$UserName = "";
$Pass = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'test');

// REGISTER USER
if (isset($_POST['registar'])) {
  // receive all input values from the form
  $Nome = mysqli_real_escape_string($db, $_POST['Nome']);
  $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
  $Pass = mysqli_real_escape_string($db, $_POST['Pass']);
  $Pass2 = mysqli_real_escape_string($db, $_POST['PassConf']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($Nome)) { array_push($errors, "Nome é obrigatório"); }
  if (empty($UserName)) { array_push($errors, "Username is required"); }
  if (empty($Pass)) { array_push($errors, "Password is required"); }
  if ($Pass != $Pass2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM registos WHERE UserName='$UserName' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['UserName'] === $UserName) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	//$pass = md5($Pass1);//encrypt the password before saving in the database

  	$query = "INSERT INTO registos (Nome, UserName, Pass) VALUES('$Nome','$UserName', '$Pass')";
  	mysqli_query($db, $query);
  	$_SESSION['UserName'] = $UserName;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: /Project/teste.php');
  }
}
//-----------------------------------------------------------------------------------

// LOGIN USER
if (isset($_POST['login'])) {
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Pass = mysqli_real_escape_string($db, $_POST['Pass']);
  
    if (empty($UserName)) {
        array_push($errors, "Username is required");
    }
    if (empty($Pass)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        //$Pass = md5($Pass);
        $query = "SELECT * FROM registos WHERE UserName='$UserName' AND Pass='$Pass'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['UserName'] = $UserName;
          $_SESSION['success'] = "You are now logged in";
          header('location: /Project/teste.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>
