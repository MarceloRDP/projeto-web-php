<?php
if(empty($_GET)){
    header('Location: ?pg=usuarios/cadastrar');
} else {
    $id = $_GET["id"];
    $registrarLog = NULL;

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
    
    $bind_param = ["id" => $id];

    try {
        $conn->beginTransaction();
        if($stmt->execute($bind_param)) {
            echo '<span style= "color: green;">Registro ' . $id . ' excluído do banco com sucesso!</span><br>';
            $registrarLog = TRUE;
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
        $bind_param = ["usuario" => $_SESSION["nome"], "acao" => " excluiu o usuario ID: " . $id];
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