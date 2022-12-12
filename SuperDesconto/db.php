<?php
date_default_timezone_set("America/Sao_Paulo");

    $con = mysqli_connect("localhost", "root", "", "superdesconto");
    if (mysqli_connect_errno()) {
        echo "Falha na conexão com o MySQL: " . mysqli_connect_error();
    }
    session_start();
?>
