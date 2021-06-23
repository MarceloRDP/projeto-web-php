<?php
if(empty($_POST)){
    header('Location: ?pg=usuarios/cadastrar');
} else {
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $sal_senha = "asdfg123";
    $senha_hash = md5($sal_senha . $senha);
    $registrarLog = FALSE;

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, usuario, senha) VALUES (:nome, :usuario, :senha)");

    $bind_param = ["nome" => $nome, "usuario" => $usuario, "senha" => $senha_hash];
    try {
        $conn->beginTransaction();
        if($stmt->execute($bind_param)) {
            echo '<span style= "color: green;">Registro ' . $conn->lastInsertId() . ' inserido no banco com sucesso!</span><br>';
            
            $registrarLog = TRUE;
            $id = $conn->lastInsertId();
            ?>
            <script>
            setTimeout(function() {
                window.location.href = "?pg=usuarios/cadastros";
            }, 2000);
            </script>
            <?php
        }
        else{
            echo '<span style= "color: red;">Erro ao inserir dados no banco!</span><br>';
            }
        $conn->commit();
    } catch(PDOExecption $e) {
        $conn->rollback();
        echo '<span style= "color: red;">Falha na transação: ' . $e->getMessage() . '</span><br>';
    }

    if($registrarLog) {
        $stmt = $conn->prepare("INSERT INTO logs (usuario, acao) VALUES (:usuario, :acao)");
        $bind_param = ["usuario" => $_SESSION["nome"], "acao" => " inseriu o usuario ID: " . $id];

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