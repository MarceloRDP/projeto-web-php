<?php

if(empty($_POST)){
    header('Location: ?pg=usuarios/cadastrar');
} else {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $registrarLog = FALSE;

    $stmt = $conn->prepare("UPDATE usuarios SET nome = :nome, usuario = :usuario, data_hora_atualizacao = NOW() WHERE id = :id");
    
    $bind_param = ["nome" => $nome, "usuario" => $usuario, "id" => $id];
    if($stmt->execute($bind_param)) {
        echo '<span style= "color: green;">Registro ' . $id . ' alterado no banco com sucesso!</span><br>';
        $registrarLog = TRUE;
        ?>
        <script>
        setTimeout(function() {
            window.location.href = "?pg=usuarios/cadastros";
        }, 2000);
        </script>
        <?php
    }
    else {
    echo '<span style= "color: red;">Erro ao inserir dados no banco!</span><br>';
    }

    if($registrarLog) {
        $stmt = $conn->prepare("INSERT INTO logs (usuario, acao) VALUES (:usuario, :acao)");
        $bind_param = ["usuario" => $_SESSION["nome"], "acao" => " atualizou o usuario ID: " . $id];
        try {
            $conn->beginTransaction();
            $stmt->execute($bind_param);
            $conn->commit();
        } catch(PDOExecption $e) {
            $conn->rollback();
        }
    }

}
?>