<?php
session_start();
require_once 'db_connect.php';
if(isset($_POST['Autentification']))
{
    if("youwillneverguestthevalueofthegetrequest" == $_POST['Autentification'])
    {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
        $sql = "SELECT play_counter, id FROM users WHERE username = :username ";
        $getUsers = $pdo->prepare($sql);
        $getUsers -> bindParam("username",$_SESSION['username'],PDO::PARAM_STR);
        $getUsers -> execute();
        $result = $getUsers->fetchALL(PDO::FETCH_COLUMN, 0);
        $result[0]++;
        $updateCounter = $pdo -> prepare("UPDATE users SET play_counter = :playCounter WHERE username = :username");
        $updateCounter -> bindParam("username",$_SESSION['username'], PDO::PARAM_STR);
        $updateCounter -> bindParam("playCounter", $result[0], PDO::PARAM_INT);
        $updateCounter -> execute();
    }
}
?>