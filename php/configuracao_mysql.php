<?php 

    header('Content-Type: text/html; charset=utf8');
    header("Access-Control-Allow-Origin: *");

    session_start();
    ob_start();
    error_reporting(1);
    ini_set('display_errors', 1 );

    $servidor = "localhost:3306";
    $usuario = "root";
    $senha = "";
    $banco = "vegasup_checklist";

    $connection = mysqli_connect($servidor, $usuario, $senha, $banco);


    $t = time();



?>