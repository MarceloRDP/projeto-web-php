<?php
    // session_destroy();
    unset($_SESSION["nome"]);

    header('Location: ?pg=login/tela_login');

?>