<?php 
    require_once('./configuracao_mysql.php');

    $id_teste = $_GET['id_teste'];
    $id_colecao = $_GET['id_colecao'];
    $estado_atual = $_GET['estado_atual'];

    // Inverte o estado atual do teste
    $novo_estado = $estado_atual == 1 ? 0 : 1;

    // Atualiza o estado do teste
    $query_update_teste = "UPDATE testes SET programado = $novo_estado WHERE id = $id_teste";
    mysqli_query($connection, $query_update_teste);

    // Verifica se todos os testes da coleção estão programados
    $query_todos_testes = "SELECT * FROM testes WHERE id_colecao = '$id_colecao' AND programado = 0";
    $result_todos_testes = mysqli_query($connection, $query_todos_testes);

    if (mysqli_num_rows($result_todos_testes) == 0) {
        // Se não há testes não programados, atualiza a coleção para programada
        $query_update_colecao = "UPDATE colecao_de_testes SET programado = 1 WHERE id = '$id_colecao'";
        mysqli_query($connection, $query_update_colecao);
    } else {
        // Caso contrário, mantém a coleção como não programada
        $query_update_colecao = "UPDATE colecao_de_testes SET programado = 0 WHERE id = '$id_colecao'";
        mysqli_query($connection, $query_update_colecao);
    }

    mysqli_close($connection);
?>
