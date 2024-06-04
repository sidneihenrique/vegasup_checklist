<?php 
require_once('./configuracao_mysql.php');

$id_projeto = $_GET['id_projeto'];

$query_colecoes_programados = "SELECT * FROM colecao_de_testes WHERE id_projeto = '$id_projeto' AND programado = 0";
$result_colecoes_programados = mysqli_query($connection, $query_colecoes_programados);

?>

<div id="programados" class="tab_content">

<?php

while($row_colecao = mysqli_fetch_assoc($result_colecoes_programados)){
?>
    <details class="colecao">
        <summary><?=$row_colecao['titulo']?></summary>
<?php 
        $id_colecao = $row_colecao['id'];
        $query_testes = "SELECT * FROM testes WHERE id_colecao = '$id_colecao'";
        $result_testes = mysqli_query($connection, $query_testes);
        while($row_teste = mysqli_fetch_assoc($result_testes)){
?>
            <details class="teste">
                <summary>
                    <div class="left">
                        <label for="check_<?=$row_teste['id'];?>" class="checkbox">
                            <input type="checkbox" id="check_<?=$row_teste['id'];?>" style="display: none;">
                        </label>
                        <h2><?=$row_teste['titulo'];?></h2>
                    </div>
                </summary>

                <p class="descricao">
                    <?=$row_teste['descricao'];?>
                </p>
            </details>
<?php
        }

?>

    </details>
<?php
}
?>
    

</div>

<div id="executados" class="tab_content">

<?php 

    $query_colecoes_executados = "SELECT * FROM colecao_de_testes WHERE id_projeto = '$id_projeto' AND programado = 1";
    $result_colecoes_executados = mysqli_query($connection, $query_colecoes_executados);

    while($row_colecao = mysqli_fetch_assoc($result_colecoes_programados)){
?>
    <details class="colecao">
        <summary><?=$row_colecao['titulo']?></summary>
<?php 
        $id_colecao = $row_colecao['id'];
        $query_testes = "SELECT * FROM testes WHERE id_colecao = '$id_colecao'";
        $result_testes = mysqli_query($connection, $query_testes);
        while($row_teste = mysqli_fetch_assoc($result_testes)){
?>
            <details class="teste">
                <summary>
                    <div class="left">
                        <label for="check_<?=$row_teste['id'];?>" class="checkbox">
                            <input type="checkbox" id="check_<?=$row_teste['id'];?>" style="display: none;">
                        </label>
                        <h2><?=$row_teste['titulo'];?></h2>
                    </div>
                </summary>

                <p class="descricao">
                    <?=$row_teste['descricao'];?>
                </p>
            </details>
<?php
        }

?>

    </details>
<?php
}
?>

</div>

