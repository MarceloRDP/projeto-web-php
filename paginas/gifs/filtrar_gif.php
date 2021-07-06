<?php
if(isset($_POST["categoria"])){
    $sql .= " WHERE c.categoria = g." . $_GET["categoria"];
}
$result = $conn->query($sql, PDO::FETCH_ASSOC);

$sqlCategoria = "SELECT id,categoria FROM categoria_gif";
$resultCategoria = $conn->query($sqlCategoria, PDO::FETCH_ASSOC);
$sql = "SELECT g.id, g.nome, c.categoria, g.descricao, g.imagem
        FROM gifs g 
        INNER JOIN categoria_gif c ON g.categoria_id = c.id 
        ORDER BY g.id
        WHERE c.categoria = g." . $_GET['categoria'];


$result = $conn->query($sql, PDO::FETCH_ASSOC);

$sqlCategoria = "SELECT id,categoria FROM categoria_gif";
$resultCategoria = $conn->query($sqlCategoria, PDO::FETCH_ASSOC);
?>