<?php
if(!empty($_POST)) {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $sal_senha = "asdfg123";
    $senha_banco = "admin123";
    $senha_hash = md5($sal_senha . $senha_banco);

    if($usuario == "admin" && $senha_hash == "289a9c0a47203f5ab9a80e8baf4d8b88") {
        $_SESSION["nome"] = "Marcelão";
?>
    <span style= "color: green;">Login efetuado</span>
    <script>
        setTimeout(function() {
            window.location.href = "?pg=inicio";
        }, 1000);
    </script>

    <?php
    }
    else {
    ?>
        <p style= 'color: red;'>Dados inválidos! Tente novamente...</p>
        <p><a class="btns" href="javascript: history.back()">Voltar</a></p>

<?php
    }
}
else {
    header("Location: ?pg=login/tela_login");
}

?>