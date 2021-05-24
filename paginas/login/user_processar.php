<?php
if(!empty($_POST)) {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
}

if($usuario = "admin" && $senha = "admin123") {
    echo "Login efetuado";
}
else {
    echo "Dados inválidos";
}

// continuar daqui. login é sempre aceito mesmo com senha errada e problemas com css
?>
