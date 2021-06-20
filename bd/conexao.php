<?php

/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=projeto_web_2021;host=localhost;charset=utf8';
$user = 'root';
$password = '';

try {
  $conn = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
  die ('DB Error: ' . $e->getMessage());
}

?>