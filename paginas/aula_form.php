<html>

    <head>
        <meta charset="UTF-8">
        <title>Formulário</title>
        <link rel="stylesheet" type="text/css" href="../css/estilo.css">

    </head>
    <body>
        <div class="container">
            <header>
                <h1>Meu Site</h1>
            </header>
            <aside class="esquerda">

            </aside>
            <main>
                    <div id="div-form">
                        <h1>Formulário de Contato</h1>
                        <!-- O formulário por padrão usa o método GET. Para formulários o mais adequado é POST e o action redireciona os dados. -->
                        <form method="POST" action="/aulas_php/projeto-web-php/paginas/processar.php">
                            <div>
                                <label>Nome</label>
                                <input type="text" name="nome" placeholder="Digite seu nome..."/>
                            </div>
                            <div>
                                <label>Telefone</label>
                                <input type="text" name="telefone" placeholder="Digite seu telefone..."/>
                            </div>
                            <div>
                                <label>E-mail</label>
                                <input type="email" name="email" placeholder="Digite seu e-mail..."/>
                            </div>
                            <div>
                                <label>Mensagem</label>
                                <textarea name="mensagem" placeholder="Digite sua mensagem..."></textarea>
                            </div>
                            <button type="submit">Enviar</button>
                        </form>
                    </div>
            </main>
            <aside class="direita">

            </aside>
            <footer>
                <h3>Site de Marcelo Reis de Paula</h3>
            </footer>
        </div>
    </body>
</html>