<?php
    session_start();
    if (!isset($_SESSION["nome"])) {
        header("Location: profile.php");
        exit();
    }
?>
