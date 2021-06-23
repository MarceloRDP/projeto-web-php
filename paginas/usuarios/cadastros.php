<?php

if(!isset($_SESSION["nome"])) {
    header('Location: ?pg=login/tela_login');
}

$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql, PDO::FETCH_ASSOC);

?>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Usuário</th>
        <th>Hash da senha</th>
        <th>Data e Hora (criação)</th>
        <th>Data e Hora (atualiz.)</th>
        <th>Editar</th>
        <th>Excluir</th>
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
            <td>
                <a href="?pg=usuarios/cadastrar&id=<?= $linha["id"]?>">Editar</a>  
            </td>
            <td>
                <a href="?pg=usuarios/excluir&id=<?= $linha["id"]?>">Excluir</a>   
            </td>           
    </tr>
    <?php
        }
    ?>
</table>

<br><br>
<a class="btns" href="?pg=usuarios/cadastrar">VOLTAR</a>
