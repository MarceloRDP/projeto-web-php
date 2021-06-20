<?php

if(!isset($_SESSION["nome"])) {
    header('Location: ?pg=login/tela_login');
}

?>

<h3>Bem-vindo, <?= $_SESSION["nome"] ?>!</h3>

<img width="300px" height="400px"src="https://m.gifmania.pt/Gifs-Animados-Desenhos-Animados/Imagens-Animadas-Dic/Gif-Animados-Ursinhos-Carinhosos/Ursinhos-Carinhosos-28096.gif" alt="Imagem feliz">


<p><a class ="btns" href="?pg=login/limpar_sessao">S A I R</a></p>