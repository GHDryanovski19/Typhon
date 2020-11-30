<?php
session_start();
require_once 'db_connect.php';
if(isset($_COOKIE['username']) && isset($_COOKIE['playCounter'])) {
  $_SESSION['id'] = $id;
  $_SESSION['username'] = $username;
  header('location: ../html/index.php');
}
else {
  if(isset($_POST['login-btn'])) {

    $user = $_POST['user-name'];
    $password = $_POST['user-pass'];

    try {
      $SQLQuery = "SELECT * FROM users WHERE username = :username";
      $statement = $conn->prepare($SQLQuery);
      $statement->execute(array(':username' => $user));

      while($row = $statement->fetch()) {
        $id = $row['id'];
        $playCounter = $row['play_counter'];
        $hashed_password = $row['password'];
        $username = $row['username'];

        if(password_verify($password, $hashed_password)) {
          $_SESSION['id'] = $id;
          $_SESSION['username'] = $username;
  
          setcookie("username", $username, time() + (86400 * 30), "/");
          setcookie("playCounter", $playCounter, time() + (86400 * 30), "/");

          header('location: ../html/index.php');
        }
        else {
          echo "Error: Invalid username or password";
        }
      }
    }
    catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}
?>