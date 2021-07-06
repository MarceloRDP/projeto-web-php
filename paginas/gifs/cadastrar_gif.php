<?php

if(!isset($_SESSION["nome"])) {
    header('Location: ?pg=login/tela_login');
}

$sqlCategoria = "SELECT id,categoria FROM categoria_gif";
$resultCategoria = $conn->query($sqlCategoria, PDO::FETCH_ASSOC);
?>

<div id="div-form">
    <h1>Cadastrar novo Gif</h1>
    <!-- O formulário por padrão usa o método GET. Para formulários o mais adequado é POST e o action redireciona os dados. -->
    <form method="POST" action="?pg=gifs/incluir_gif">
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" required placeholder="Digite o nome do gif..."/>
        </div>
        <div>
            <label>Categoria:</label>
            <select name="categoria">
            <option value="">Selecione a categoria...</option>
                <?php
                    while($linha = $resultCategoria->fetch()) {
                ?>
                    <option value="<?= $linha["id"]?>"><?= $linha["categoria"]?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <div>
            <label>Descrição:</label>
            <input type="text" name="descricao" required placeholder="Faça uma breve descrição..."/>
        </div>
        <div>
            <label>Link:</label>
            <input type="text" name="link" required placeholder="Cole o link aqui..."/>
        </div>
        <button class="btns" type="submit">Cadastrar</button>
    </form>
</div>