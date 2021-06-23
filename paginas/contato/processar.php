<?php

if(empty($_POST)){
    header('Location: ?pg=contato/aula_form');
}

$nome = !empty($_POST["nome"]) ? $_POST["nome"] : NULL;
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$cidade_id = $_POST["cidade"];
$mensagem = $_POST["mensagem"];

# Insert no banco de dados
// $stmt = $conn->prepare("INSERT INTO contatos (nome, telefone, email, cidade_id, mensagem) VALUES (?, ?, ?, ?, ?)");
// $bind_param = [$nome, $telefone, $email, $cidade_id, $mensagem];

$stmt = $conn->prepare("INSERT INTO contatos (nome, telefone, email, cidade_id, mensagem) VALUES (:nome, :telefone, :email, :cidade_id, :mensagem)");
$bind_param = ["nome" => $nome, "telefone" => $telefone, "email" => $email, "cidade_id" => $cidade_id, "mensagem" => $mensagem];

// try {
//     $conn->beginTransaction();
//     $stmt->execute($bind_param);
//     echo '<span style= "color: green;">Registro ' . $conn->lastInsertId() . ' inserido no banco com sucesso!</span><br>';
//     $conn->commit();

// } catch(PDOExecption $e) {
//     $conn->rollback();
//     echo '<span style= "color: red;">Erro ao inserir o registro no banco: ' . $e->getMessage() . '</span><br>';
// }

if($stmt->execute($bind_param)) {
    echo '<span style= "color: green;">Registro ' . $conn->lastInsertId() . ' inserido no banco com sucesso!</span><br>';
}
else {
echo '<span style= "color: red;">Erro ao inserir dados no banco!</span><br>';
}

$sql = "SELECT c.nome, c.telefone, c.email, ci.nome as cidade,
     e.sigla as estado, c.mensagem, DATE_FORMAT(c.data_hora, '%d/%m/%Y %H:%i:%S') 
        FROM contatos c 
        INNER JOIN cidades ci ON ci.id = c.cidade_id 
        INNER JOIN estados e ON e.id = ci.estado_id
        ORDER BY ci.nome, c.data_hora DESC";

// Consulta procedural: $result = mysqli_query($conn, $sql);
$result = $conn->query($sql, PDO::FETCH_ASSOC);

?>

<table>
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Mensagem</th>
        <th>Data e Hora</th>
    </tr>         
        <?php
            while($linha = $result->fetch()) {
        ?>
    <tr> 
        <?php
            foreach($linha as $chave => $valor) {
        ?> 
            <td>
                <?= $valor ?>
            </td>
            <?php
                }
            ?>
    </tr>
    <?php
        }
    ?>
</table>

<br><br>
<a class="btns" href="?pg=contato/aula_form">VOLTAR</a>
