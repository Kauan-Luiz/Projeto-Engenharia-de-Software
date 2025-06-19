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
                <div class="form-container">
                    <h3>Formulário de Vacinação</h3>
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

                    <div class="form-group">
                        <label for="setor">Setor:</label>
                        <input type="text" id="setor" name="setor" required>
                    </div>

                    <fieldset>
                        <legend>Vacinas Recebidas:</legend>
                        <div class="checkbox-group">
                        <label><input type="checkbox" name="vacinas[]" value="Covid-19"> Covid-19</label>
                        <label><input type="checkbox" name="vacinas[]" value="Influenza"> Influenza (Gripe)</label>
                        <label><input type="checkbox" name="vacinas[]" value="Hepatite B"> Hepatite B</label>
                        <label><input type="checkbox" name="vacinas[]" value="Tétano"> Tétano</label>
                        <label><input type="checkbox" name="vacinas[]" value="Febre Amarela"> Febre Amarela</label>
                        </div>
                    </fieldset>

                    <button type="submit">Enviar</button>
                    </form>
                </div>
            </main>
        </div>       
  
    </div>

</body>
</html>