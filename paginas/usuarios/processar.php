<?php

if(empty($_POST)){
    header('Location: ?pg=usuarios/cadastrar');
}

$nome = $_POST["nome"];
$usuario = $_POST["usuario"];
$senha = $_POST["senha"];
$sal_senha = "asdfg123";
$senha_hash = md5($sal_senha . $senha);

$stmt = $conn->prepare("INSERT INTO usuarios (nome, usuario, senha) VALUES (:nome, :usuario, :senha)");

$bind_param = ["nome" => $nome, "usuario" => $usuario, "senha" => $senha_hash];

if($stmt->execute($bind_param)) {
    echo '<span style= "color: green;">Registro ' . $conn->lastInsertId() . ' inserido no banco com sucesso!</span><br>';
    header('Location: ?pg=usuarios/cadastros');
}
else {
echo '<span style= "color: red;">Erro ao inserir dados no banco!</span><br>';
}

?>