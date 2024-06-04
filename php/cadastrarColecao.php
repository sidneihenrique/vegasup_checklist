<?php 
    require_once('./configuracao_mysql.php');

    $titulo_colecao = $_POST['titulo'];

    $query_insert = "INSERT INTO colecao_de_testes (titulo) VALUES('$titulo_colecao')";
    
    if(mysqli_query($connection, $query_insert)){
        echo 'inserido';
    }
    else{
        echo mysqli_error($connection);
    }
?>