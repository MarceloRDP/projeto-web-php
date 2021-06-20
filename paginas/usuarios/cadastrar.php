<?php

if(!isset($_SESSION["nome"])) {
    header('Location: ?pg=login/tela_login');
}

?>

<div id="div-form">
    <h1>Formulário de Cadastro</h1>
    <!-- O formulário por padrão usa o método GET. Para formulários o mais adequado é POST e o action redireciona os dados. -->
    <form method="POST" action="?pg=usuarios/processar">
        <div>
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome do novo usuário..."/>
        </div>
        <div>
            <label>Nome de usuário:</label>
            <input type="text" name="usuario" placeholder="Digite o login do novo usuário..."/>
        </div>
        <div>
            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Digite a senha de acesso do novo usuário..."/>
        </div>
        <button class="btns" type="submit">Cadastrar</button>
    </form>
</div>