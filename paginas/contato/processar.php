<?php
// método para redirecionar a página ao tentar acessá-la diretamente:
if(empty($_POST) && empty($_SESSION)){
    header('Location: ?pg=contato/aula_form');
}
//Ao receber os dados de _POST _SESSION se torna um array.
if(!empty($_POST)) {
    $_SESSION["dados"][] = $_POST;
}

# Insert no banco de dados
$nome = $_POST["nome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];
$sql = "INSERT INTO contatos (nome, telefone, email, mensagem) VALUES ('$nome', '$telefone', '$email', '$mensagem')";

mysqli_query($conn, $sql);
exit();
?>

<table>
    <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Mensagem</th>
    </tr>         
        <?php
            foreach($_SESSION["dados"] as $valor_dados) {
        ?>
    <tr> 
        <?php
            foreach($valor_dados as $valor) {
        ?> 
            <td><?= $valor ?></td>
        <?php
            }
        ?>
    </tr>
    <?php
        }
    ?>
</table>

<br><br>
<a class="btns" href="?pg=contato/limpar_sessao">Limpar sessão</a>
