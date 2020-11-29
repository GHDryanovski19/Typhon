<?php

require_once 'db_connect.php';
if(isset($_POST['Autentification']))
{
    if("youwillneverguestthevalueofthegetrequest" == $_POST['Autentification'])
    {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
        $sql = 'SELECT username FROM users';
        $getUsers = $pdo->prepare("SELECT username FROM users WHERE id = 1");
        $getUsers -> execute();
        $result = $getUsers->fetchALL(PDO::FETCH_COLUMN, 0);
        $result = intval($result[0]);
        echo $result;
        $result++;
        $updateCounter = $pdo -> prepare("UPDATE users SET username = :username WHERE id = 1");
        $updateCounter -> bindParam("username", $result, PDO::PARAM_STR);
        $updateCounter -> execute();
    }
}

?>