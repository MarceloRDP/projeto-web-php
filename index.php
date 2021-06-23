<?php
// métodos para exibir erros:

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// include("bd/conexao.php");
// a diferença é que o require dá um erro fatal e interompe o script. O include apenas dá uma mensagem de erro.
require("bd/conexao.php");

?>

<html>

    <head>
        <meta charset="UTF-8">
        <title>Meu site</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

    </head>
    <body>
        <div class="container">
            <header>
                <ul>
                    <a href="?pg=inicio"><li>Início</li></a>
                    <a href="?pg=sobre"><li>Sobre</li></a>
                    <a href="?pg=contato/aula_form"><li>Formulário</li></a>
                    <?php
                        if(empty($_SESSION)) {
                    ?>
                    <a href="?pg=login/tela_login"><li>Log in</li></a>
                    <?php
                    }
                    else {
                    ?>
                        <a href="?pg=usuarios/cadastrar"><li>Cadastrar</li></a>
                        <a href="?pg=usuarios/cadastros"><li>Cadastros</li></a>
                        <a href="?pg=usuarios/logs"><li>Logs do sistema</li></a>
                    <?php
                    }
                    ?>
                </ul>
            </header>
            <aside class="esquerda">
                <img width="120px" height="450px" src="img/orkut1.png" alt="Logo Orkut">
            </aside>
            <main>
                <?php
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);
// Operador ternário: declara o IF ELSE em uma linha apenas. Abaixo está comentado como o IF seria da forma comum. ISSET = Existe? se sim (dois pontos) senão.
                    $pg = (isset($_GET['pg']) && !empty($_GET['pg']))? $_GET['pg'] : "login/tela_login";

                    // $pg = "inicio";
                    // if(isset($_GET["pg"])) {
                    //     $pg = $_GET["pg"];
                    // }
                    include("paginas/" . $pg . ".php");
                ?>
            </main>
            <aside class="direita">
                <img width="120px" height="450px" src="img/orkut1.png" alt="Logo Orkut">
            </aside>
            <footer>
                <h3>Site de Marcelo Reis de Paula</h3>
            </footer>
        </div>
    </body>
</html>