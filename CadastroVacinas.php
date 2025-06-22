<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial - Vacina+</title>
    <link rel="stylesheet" href="Css/CadastroVacinas.css">
    <link rel="stylesheet" href="Css/Padrao.css">
</head>
<body>
    
    <?php
    include_once("header.php");
    
    ?>

    <div class="container">
        
        <?php
        include_once("article.php");
        ?>

        <div class="conteudo">
            <main>
                <div class="container-cadastro-vacinas">
                    <div class="form-container">
                        <h3>Cadastro de Vacinas</h3>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label>Nome da Vacina:</label>
                                <input type="text" name="nome" required>
                            </div>

                            <div class="form-group">
                                <label>Fabricante:</label>
                                <input type="text" name="fabricante">
                            </div>

                        

                            <button type="submit" name="cadastrar">Cadastrar</button>
                        </form>
                    </div>

                        <?php
                        if (isset($_POST['cadastrar'])) {
                            include("conexao.php"); // arquivo onde está sua variável $conexao

                            $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
                            $fabricante = mysqli_real_escape_string($conexao, $_POST['fabricante']);
                            $dose = intval($_POST['dose']);
                            $data_validade = $_POST['data_validade'];

                            $sql = "INSERT INTO vacinas (nome, fabricante)
                                    VALUES ('$nome', '$fabricante')";

                            if (mysqli_query($conexao, $sql)) {
                                echo "<p style='color: green;'>Vacina cadastrada com sucesso!</p>";
                            } else {
                                echo "<p style='color: red;'>Erro ao cadastrar: " . mysqli_error($conexao) . "</p>";
                            }
                        }
                        ?>
                </div>        
            </main>
                
        </div>
    </div>

</body>
</html>