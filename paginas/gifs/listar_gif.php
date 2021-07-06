<?php

if(!isset($_SESSION["nome"])) {
    header('Location: ?pg=login/tela_login');
}
$sql = "SELECT g.id, g.nome, c.categoria, g.descricao, g.imagem
        FROM gifs g 
        INNER JOIN categoria_gif c ON g.categoria_id = c.id";

if(isset($_POST["categoria"]) || isset($_POST["search"])){
    $search = "";
    if(!empty($_POST["search"])){
        $search = " WHERE (nome like '%" . $_POST["search"] . "%' OR descricao like '%" . $_POST["search"] . "%')";
    }
    if(!empty($_POST["categoria"])) {
        if($search != "") {
            $search .= " AND ";
        } else {
            $search .= " WHERE ";
        }
        $search .= "c.id = " . $_POST["categoria"];
    }
    $sql .= $search;
}


$result = $conn->query($sql, PDO::FETCH_ASSOC);

$sqlCategoria = "SELECT id,categoria FROM categoria_gif";
$resultCategoria = $conn->query($sqlCategoria, PDO::FETCH_ASSOC);

?>

<div class="linha">
    <form class="linha" method="POST" action="?pg=gifs/listar_gif">
        <label>Buscar por nome ou descrição:</label>
        <input class="select_menor" type="text" name="search" value="<?php
            echo isset($_POST['search']) ? $_POST['search'] : "";
        ?>" placeholder="Digite sua busca..."/>
        <label>Buscar por categoria:</label>
        <select class="select_menor" name="categoria">
        <option value="">Selec. a categoria</option>
            <?php
                while($linha = $resultCategoria->fetch()) {
            ?>
                <option value="<?= $linha["id"]?>" 
                <?php
                    echo isset($_POST['categoria']) && $linha["id"] == $_POST['categoria'] ? "selected" : "";
                ?>
                ><?= $linha["categoria"]?></option>
            <?php
                }
            ?>
        </select>
        <button class="btns" type="submit">Buscar</button>
    </form>
</div>

        

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Categoria</th>
        <th>Descrição</th>
        <th id="tbimg">Link da imagem</th>
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
<a class="btns" href="?pg=gifs/cadastrar_gif">VOLTAR</a>
