<?php

if(!isset($_SESSION["nome"])) {
    header('Location: ?pg=login/tela_login');
}

$sql = "SELECT * FROM logs";
$result = $conn->query($sql, PDO::FETCH_ASSOC);

?>

<table>
    <tr>
        <th>ID</th>
        <th>Usuário</th>
        <th>Ação do usuário</th>
        <th>Data e Hora (atualiz.)</th>

    </tr>         
        <?php
            while($linha = $result->fetch()) {
        ?>
    <tr> 
        <?php
            foreach($linha as $chave => $valor) {
        ?> 
            <td>
                <?= $valor ?>
            </td>
            <?php
                }
            ?>          
    </tr>
    <?php
        }
    ?>
</table>

<br><br>
<a class="btns" href="?pg=usuarios/cadastros">VOLTAR</a>