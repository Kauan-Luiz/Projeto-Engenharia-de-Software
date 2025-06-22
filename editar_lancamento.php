<?php
include("conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM lancamentos_vacinas WHERE id = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$lancamento = $result->fetch_assoc();

// Dados para os selects
$funcionarios = mysqli_query($conexao, "SELECT id, nome FROM vacinados ORDER BY nome");
$vacinas = mysqli_query($conexao, "SELECT id, nome FROM vacinas");
$setores = mysqli_query($conexao, "SELECT id, nome_setor FROM setores");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Lançamento</title>
</head>
<body>

<style>
.container-editar{

  min-width: 600px; /* de 480 para 600 */
  width: 100%;
  padding: 30px 40px;


}

h2 {
  font-weight: 700;
  font-size: 28px;
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

form select,
form input[type="date"],
form textarea {
  width: 100%;
  padding: 14px 16px;
  border: 1.8px solid #d0d5dd;
  border-radius: 10px;
  font-size: 16px;
  color: #333;
  transition: border-color 0.25s ease, box-shadow 0.25s ease;
  font-family: inherit;
  resize: vertical;
  outline-offset: 2px;
}

form select:focus,
form input[type="date"]:focus,
form textarea:focus {
  border-color: #4f46e5;
  box-shadow: 0 0 8px rgba(79, 70, 229, 0.35);
  outline: none;
}

form textarea {
  min-height: 100px;
}

button {
  margin-top: 30px;
  width: 100%;
  background-color: #4f46e5;
  border: none;
  padding: 16px 0;
  border-radius: 12px;
  font-size: 18px;
  color: #fff;
  font-weight: 700;
  cursor: pointer;
  box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
  transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

button:hover {
  background-color: #4338ca;
  box-shadow: 0 8px 20px rgba(67, 56, 202, 0.6);
}

/* Responsividade */
@media (max-width: 520px) {
  body {
    padding: 20px 10px;
  }

  .container {
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

    
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial - Vacina+</title>
    <link rel="stylesheet" href="Css/suporte.css">
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
          <div class="container-editar">
            <h2>Editar Lançamento de Vacina</h2>

            <form action="atualiza_lancamento.php" method="POST">
                <input type="hidden" name="id" value="<?= $lancamento['id'] ?>">

                <label>Funcionário</label>
                <select name="funcionario_id" required>
                    <?php while($row = mysqli_fetch_assoc($funcionarios)): ?>
                        <option value="<?= $row['id'] ?>" <?= ($row['id'] == $lancamento['funcionario_id']) ? 'selected' : '' ?>>
                            <?= $row['nome'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <label>Vacina</label>
                <select name="vacina_id" required>
                    <?php while($row = mysqli_fetch_assoc($vacinas)): ?>
                        <option value="<?= $row['id'] ?>" <?= ($row['id'] == $lancamento['vacina_id']) ? 'selected' : '' ?>>
                            <?= $row['nome'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <label>Setor</label>
                <select name="setor_id" required>
                    <?php while($row = mysqli_fetch_assoc($setores)): ?>
                        <option value="<?= $row['id'] ?>" <?= ($row['id'] == $lancamento['setor_id']) ? 'selected' : '' ?>>
                            <?= $row['nome_setor'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>

                <label>Data de Vacinação</label>
                <input type="date" name="data_vacinacao" value="<?= $lancamento['data_vacinacao'] ?>" required>

                <label>Observações</label>
                <textarea name="observacoes" rows="3"><?= $lancamento['observacoes'] ?></textarea>

                <button type="submit">Salvar Alterações</button>
            </form>
          </div>
        </main>          
      </div>
    </div>


</body>
</html>