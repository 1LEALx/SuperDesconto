<?php
    session_start();
    $token = md5(session_id());
    if(isset($_GET['token']) && $_GET['token'] === $token) {
        session_destroy();
        header("location: index.php");
        exit();
    } else {
        echo '<a href="doLogout.php?token='.$token.'>Confirmar logout</a>';
    }
    if(isset($_SESSION['logado'])){
        session_destroy();
        header("location: index.php");
    }
?>
