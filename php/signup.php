<?php

require_once 'db_connect.php';
print_r($_POST);
if(isset($_POST['signup'])) {

      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
	
	  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
	  $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
	  $addUser = $pdo->prepare($sql);
	  $addUser -> execute(array(
		':username' => $username,
		':password' => $hashed_password,
		':email' => $email
	));;
	  print_r ($addUser -> errorCode());
	  header("Location: reglog.php");
}

?>