<?php 
    require_once('./configuracao_mysql.php');

    $colecao_teste = $_POST['colecao'];
    $titulo_teste = $_POST['titulo'];
    $descricao_teste = $_POST['descricao'];

    $query_insert = "INSERT INTO testes (id_colecao, titulo, descricao) VALUES('$colecao_teste', '$titulo_teste', '$descricao_teste')";
    
    if(mysqli_query($connection, $query_insert)){
        echo 'inserido';
    }
    else{
        echo mysqli_error($connection);
    }
?>