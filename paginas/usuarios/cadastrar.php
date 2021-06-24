<?php

if(!isset($_SESSION["nome"])) {
    header('Location: ?pg=login/tela_login');
}

if(isset($_GET['id'])) {
    $sql = "SELECT * FROM usuarios WHERE id =" . $_GET["id"];
    $result = $conn->query($sql, PDO::FETCH_ASSOC);
    $registro = $result->fetch();
        ?>
        <div id="div-form">
        <h1>Formulário de Atualização de Cadastro</h1>
        <form method="POST" action="?pg=usuarios/atualizar">
            <div>
            <!-- Eu poderia utilizar um input type="hidden" -->
                <label>ID:</label>
                <input style= 'background:grey;' type="int" name="id" value="<?= $registro["id"]?>" readonly/>
            </div>
            <div>
                <label>Nome:</label>
                <input required type="text" name="nome" value="<?= $registro["nome"]?>"/>
            </div>
            <div>
                <label>Nome de usuário:</label>
                <input required type="text" name="usuario" value="<?= $registro["usuario"]?>"/>
            </div>

            <button class="btns" type="submit">Atualizar</button>
        </form>
    </div>
    <?php
    } else {
        ?>
        <div id="div-form">
        <h1>Formulário de Cadastro</h1>
        <!-- O formulário por padrão usa o método GET. Para formulários o mais adequado é POST e o action redireciona os dados. -->
        <form method="POST" action="?pg=usuarios/incluir">
            <div>
                <label>Nome:</label>
                <input required type="text" name="nome" placeholder="Digite o nome do novo usuario..."/>
            </div>
            <div>
                <label>Nome de usuário:</label>
                <input required type="text" name="usuario" placeholder="Digite o login do novo usuário..."/>
            </div>
            <div>
                <label>Senha:</label>
                <input required type="password" name="senha" placeholder="Digite a senha de acesso do novo usuário..."/>
            </div>
            <button class="btns" type="submit">Cadastrar</button>
        </form>
    </div>
    <?php
    }
    ?>
