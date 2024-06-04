<?php 
    require_once('./configuracao_mysql.php');

    $id_colecao = $_GET['id_colecao'];

    // Verifica se todos os testes da coleção estão programados
    $query_verificar_testes = "SELECT COUNT(*) AS total_testes, SUM(programado) AS total_programados FROM testes WHERE id_colecao = '$id_colecao'";
    $result_verificar_testes = mysqli_query($connection, $query_verificar_testes);
    $row_verificar = mysqli_fetch_assoc($result_verificar_testes);

    $total_testes = $row_verificar['total_testes'];
    $total_programados = $row_verificar['total_programados'];

    if ($total_testes == $total_programados) {
        // Se todos os testes estão programados, atualize a coleção de testes
        $query_atualizar_colecao = "UPDATE colecao_de_testes SET programado = 1 WHERE id = '$id_colecao'";
        mysqli_query($connection, $query_atualizar_colecao);
    }
?>