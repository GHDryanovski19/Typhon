<?php

    session_start();

    session_destroy();
    setcookie("username", "", time() + (86400 * 30), "/");
    setcookie("playCounter", "", time() + (86400 * 30), "/");
    header('location: ../html/index.php');

?>
