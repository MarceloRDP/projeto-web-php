<?php

// $sql = "DELETE FROM contatos";
$sql = "TRUNCATE contatos";

mysqli_query($conn, $sql);

header('Location: ?pg=contato/aula_form');

?>