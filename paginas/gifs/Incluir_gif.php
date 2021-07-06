<?php
if(empty($_POST)){
    header('Location: ?pg=gifs/cadastrar_gif');
} else {
    $nome = $_POST["nome"];
    $categoria_id = $_POST["categoria"];
    $descricao = $_POST["descricao"];
    $link = $_POST["link"];

    $stmt = $conn->prepare("INSERT INTO gifs (nome, categoria_id, descricao, imagem) VALUES (:nome, :categoria_id, :descricao, :link)");

    $bind_param = ["nome" => $nome, "categoria_id" => $categoria_id, "descricao" => $descricao, "link" => "<img src='" . $link . "'></img>"];
    try {
        $conn->beginTransaction();
        if($stmt->execute($bind_param)) {
            echo '<span style= "color: green;">Registro ' . $conn->lastInsertId() . ' inserido no banco com sucesso!</span><br>';
            ?>
            <script>
            setTimeout(function() {
                window.location.href = "?pg=gifs/listar_gif";
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
}
?>