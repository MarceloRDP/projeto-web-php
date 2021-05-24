
<div id="div-form">
    <h1>Tela de Log in</h1>
    <!-- O formulário por padrão usa o método GET. Para formulários o mais adequado é POST e o action redireciona os dados. -->
    <form method="POST" action="?pg=login/user_processar">
        <div>
            <label>Nome de usuário:</label>
            <input type="text" name="usuario" placeholder="Digite seu nome de usuário..."/>
        </div>
        <div>
            <label>Senha:</label>
            <input type="password" name="senha" placeholder="Digite sua senha..."/>
        </div>
        <button class="btns" type="submit">Entrar</button>
    </form>
</div>
