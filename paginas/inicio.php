<?php

if(!isset($_SESSION["nome"])) {
    header('Location: ?pg=login/tela_login');
}

?>

<h3>Bem-vindo, <?= $_SESSION["nome"] ?>!</h3>

<img width="400px" height="400px"src="https://i.pinimg.com/originals/25/6e/9f/256e9f7e2280cd9678fe3c9d97e86e5a.gif" alt="Imagem feliz">

<p><a class ="btns" href="?pg=login/limpar_sessao">S A I R</a></p>