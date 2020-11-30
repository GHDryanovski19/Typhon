<?php
    require_once 'db_connect.php';
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
        $sql = "SELECT play_counter FROM users WHERE username = :username ";
        $getUsers = $pdo->prepare($sql);
        $getUsers -> bindParam("username",$_COOKIE['username'],PDO::PARAM_STR);
        $getUsers -> execute();
        $result = $getUsers->fetchALL(PDO::FETCH_COLUMN, 0);
        $_COOKIE['playCounter'] = $result[0];
?>