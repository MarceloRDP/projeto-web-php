<?php
// métodos para exibir erros:

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$pg = 'paginas/sobre.php'
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
                    <a href="?pg=aula_form"><li>Formulário</li></a>
                    <a href="?pg=login/tela_login"><li>Log in</li></a>
                </ul>
            </header>
            <aside class="esquerda">
                <img width="120px" height="450px" src="img/orkut1.png" alt="">
            </aside>
            <main>
                <?php
                    ini_set('display_errors', 1);
                    ini_set('display_startup_errors', 1);
                    error_reporting(E_ALL);
// Operador ternário: declara o IF ELSE em uma linha apenas. Abaixo está comentado como o IF seria da forma comum. ISSET = Existe? se sim (dois pontos) senão.
                    $pg = (isset($_GET['pg']) && !empty($_GET['pg']))? $_GET['pg'] : "inicio";

                    // $pg = "inicio";
                    // if(isset($_GET["pg"])) {
                    //     $pg = $_GET["pg"];
                    // }
                    include("paginas/" . $pg . ".php");
                ?>
            </main>
            <aside class="direita">
                <img width="120px" height="450px" src="img/orkut1.png" alt="">
            </aside>
            <footer>
                <h3>Site de Marcelo Reis de Paula</h3>
            </footer>
        </div>
    </body>
</html>