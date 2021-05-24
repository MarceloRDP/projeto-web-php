<?php
// método para redirecionar a página ao tentar acessá-la diretamente:
if(empty($_POST) && empty($_SESSION)){
    header('Location: ?pg=aula_form');
}
//Ao receber os dados de _POST _SESSION se torna um array.
if(!empty($_POST)) {
    $_SESSION["dados"][] = $_POST;
}
// session_destroy();
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
<a class="btns" href="?pg=limpar_sessao">Limpar sessão</a>
