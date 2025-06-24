
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial - Vacina+</title>
    <link rel="stylesheet" href="Css/CadastroSetor.css">
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
                <div class="form-container-setor">
                    <h2>Cadastro de Setor</h2>
                    <form action="salvarSetor.php" method="POST">

                    <div class="form-group">
                        <label for="nome">Nome do Setor:</label>
                        <input type="text" id="nome" name="nome_setor" required>
                    </div>

                    <div class="form-group">
                        <label for="responsavel">Responsável:</label>
                        <input type="text" id="responsavel" name="responsavel">
                    </div>

                    <div class="form-group">
                        <label for="email">Email do Setor:</label>
                        <input type="email" id="email" name="email_setor">
                    </div>


                    <div class="form-group">
                        <label for="localizacao">Localização:</label>
                        <select name="" id="">
                            <option value="Predio 1">Predio 1</option>
                            <option value="Predio 2">Predio 2</option>
                            <option value="Predio 2">Predio 3</option>
                        </select>
                    </div>


                    <button type="submit">Cadastrar Setor</button>
                    </form>
                </div>
            </main>
        </div>       
  
    </div>

    <?php

    ?>
</body>
</html>