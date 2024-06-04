<?php 
    require_once('./configuracao_mysql.php');

    $id_teste = $_GET['id_teste'];
    $id_colecao = $_GET['id_colecao'];
    $estado_atual = $_GET['estado_atual'];

    // Atualiza o estado do teste
    $query_update_teste = "UPDATE testes SET programado = $estado_atual WHERE id = $id_teste";
    if (!mysqli_query($connection, $query_update_teste)) {
        echo "Erro ao atualizar o teste: " . mysqli_error($connection);
    }

    // Verifica se todos os testes da coleção estão programados
    $query_todos_testes = "SELECT * FROM testes WHERE id_colecao = '$id_colecao' AND programado = 0";
    $result_todos_testes = mysqli_query($connection, $query_todos_testes);

    if (mysqli_num_rows($result_todos_testes) == 0) {
        // Se não há testes não programados, atualiza a coleção para programada
        $query_update_colecao = "UPDATE colecao_de_testes SET programado = 1 WHERE id = '$id_colecao'";
        if (!mysqli_query($connection, $query_update_colecao)) {
            echo "Erro ao atualizar a coleção: " . mysqli_error($connection);
        }
    } else {
        // Caso contrário, mantém a coleção como não programada
        $query_update_colecao = "UPDATE colecao_de_testes SET programado = 0 WHERE id = '$id_colecao'";
        if (!mysqli_query($connection, $query_update_colecao)) {
            echo "Erro ao atualizar a coleção: " . mysqli_error($connection);
        }
    }

    mysqli_close($connection);
?>
