<?php include("conexao.php"); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lançar Vacinas - Vacina+</title>
    <link rel="stylesheet" href="Css/CadastroVacinasFuncionarios.css">
    <link rel="stylesheet" href="Css/Padrao.css">
</head>
<body>

<?php include("header.php"); ?>

<div class="container">
    <?php include("article.php"); ?>

    <div class="conteudo">
        <main>
            <div class="form-container">
                <h3>Lançamento de Vacinas para Funcionários</h3>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="funcionario">Funcionário:</label>
                        <select name="id_funcionario" required>
                            <option value="">Selecione</option>
                            <?php
                            $sql_func = "SELECT id, nome FROM funcionarios ORDER BY nome";
                            $res_func = mysqli_query($conexao, $sql_func);
                            while ($row = mysqli_fetch_assoc($res_func)) {
                                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vacina">Vacina:</label>
                        <select name="id_vacina" required>
                            <option value="">Selecione</option>
                            <?php
                            $sql_vac = "SELECT id, nome FROM vacinas ORDER BY nome";
                            $res_vac = mysqli_query($conexao, $sql_vac);
                            while ($row = mysqli_fetch_assoc($res_vac)) {
                                echo "<option value='{$row['id']}'>{$row['nome']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="data_aplicacao">Data de Aplicação:</label>
                        <input type="date" name="data_aplicacao" required>
                    </div>

                    <button type="submit" name="lancar">Lançar Vacina</button>
                </form>

                
            </div>
        </main>
    </div>
</div>

</body>
</html>
