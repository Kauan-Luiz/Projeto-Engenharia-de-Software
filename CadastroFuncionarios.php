<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial - Vacina+</title>
    <link rel="stylesheet" href="Css/CadastroFuncionarios.css">
    <link rel="stylesheet" href="Css/Padrao.css">
</head>
<body>
     <?php
    include_once("header.php");
    ?>

    <div class="container">
        <?php
            include_once("article.php")
        ?>

        <div class="conteudo">
            <main>
                <div class="container-cadastro-funcionario">
                        <h2>Cadastro de Funcionário</h2>
                        <form action="salvar.php" method="post">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" required>
                        </div>

                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" id="cpf" name="cpf" title="Digite 11 números">
                        </div>

                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="tel" id="telefone" name="telefone" required placeholder="(XX) XXXXX-XXXX">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <button type="submit">Enviar</button>
                        </form>
                </div>
            </main>
        </div>       
  
    </div>

</body>
</html>