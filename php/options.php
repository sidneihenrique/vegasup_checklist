<?php 
    require_once('./configuracao_mysql.php');

    $id_projeto = $_GET['id_projeto'];

    $query = "SELECT * FROM colecao_de_testes WHERE id_projeto = '$id_projeto'";
    $result = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($result)){

?>
        <option value="<?=$row['id']?>"><?=$row['titulo']?></option>
<?php
    }

?>