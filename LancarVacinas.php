<?php include("conexao.php"); 

$sqlFuncionarios = "SELECT id, nome FROM vacinados ORDER BY nome ASC";
$resultFuncionarios = mysqli_query($conexao, $sqlFuncionarios);


$sqlVacinas = "SELECT id, nome FROM vacinas";
$resultVacinas = mysqli_query($conexao, $sqlVacinas);

$sqlSetores = "SELECT id, nome_setor FROM setores";
$resultSetor = mysqli_query($conexao, $sqlSetores);

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lançar Vacinas - Vacina+</title>
    <link rel="stylesheet" href="Css/Padrao.css">
</head>
<body>
     <style>
       
       .container-lancamentos {
        width: 600px;
        width: 100%; 
        
        }

       h2 {
        
        font-weight: 700;
        font-size: 20px;
        color: #222;
        margin-bottom: 30px;
        text-align: center;
        letter-spacing: 0.02em;
        }

        form label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #444;
        font-size: 15px;
        letter-spacing: 0.01em;
        }

      

        /* Responsividade */
        @media (max-width: 520px) {
        body {
            padding: 20px 10px;
        }

        .container-lancamentos {
            padding: 25px 20px;
        }
        }
        
        select:hover,
        select:focus {
        outline: none;
        border-color: #4f46e5; /* a cor do foco que já tem no CSS moderno */
        box-shadow: 0 0 8px rgba(79, 70, 229, 0.35);
        background-color: white; /* manter o fundo branco */
        }

        /* Remove o destaque azul do botão do select no Chrome/Edge */
        select::-ms-expand {
        display: none;
        }

        /* Remove contorno azul no Firefox */
        select:-moz-focusring {
        color: transparent;
        text-shadow: 0 0 0 #000;
        }


    </style>


<?php include("header.php"); ?>

<div class="container">
    <?php include("article.php"); ?>

    <div class="conteudo">
        <main>
            <div class="container-lancamentos">
                <h2>Lançamento de Vacina</h2>
                    <form action="processa_vacina.php" method="POST">
                        <label for="funcionario">Funcionário</label>
                        <select name="funcionario_id" required>
                            <option value="">Selecione</option>
                            <?php while($row = mysqli_fetch_assoc($resultFuncionarios)): ?>
                                <option value="<?= $row['id']; ?>"><?= $row['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>

                        <label for="">Vacina</label>
                        <select name="vacina_id" required>
                            <option value="">Selecione</option>
                            <?php while($row = mysqli_fetch_assoc($resultVacinas)): ?>
                                <option value="<?= $row['id']; ?>"><?= $row['nome']; ?></option>
                            <?php endwhile; ?>
                        </select>

                        <label for="">Setor</label>
                        <select name="setor_id" required>
                            <option value="">Selecione</option>
                            <?php while($row = mysqli_fetch_assoc($resultSetor)): ?>
                                <option value="<?= $row['id']; ?>"><?= $row['nome_setor']; ?></option>
                            <?php endwhile; ?>
                        </select>
                

                        <label for="data_vacinacao">Data da Vacinação</label>
                        <input type="date" name="data_vacinacao" required>

                        <button type="submit">Lançar Vacina</button>
                        
                    </form>

            </div>
        </main>
    </div>
</div>

</body>
</html>
