<?php
include "conexao.php";

$id = $_GET['id'];

$resultado = $conexao->query("SELECT * FROM vacinados WHERE id = $id");
$dados = $resultado->fetch_assoc();

$vacinasMarcadas = explode(", ", $dados["vacinas"]);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Registro</title>
</head>
<body>
    <style>
body {
  background: #f5f8fa;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 20px 10px;
  display: flex;
  justify-content: center;
  align-items: start;
  min-height: 100vh;
  overflow: hidden;
}

form {
  width: 350px;
  background: #fff;
  padding: 10px 12px;
  border-radius: 8px;
  box-shadow: 0 1px 5px rgba(0,0,0,0.08);
  box-sizing: border-box;
}



label {
  display: block;
  font-weight: 600;
  color: #333;
  margin-bottom: 4px;
  font-size: 0.85rem;
}

label input[type="text"],
label input[type="email"] {
  width: 100%;
  padding: 4px 6px;
  font-size: 0.85rem;
  border: 1.8px solid #007bff;
  border-radius: 5px;
  outline: none;
  box-sizing: border-box;
  transition: border-color 0.3s ease;
}

label input[type="text"]:focus,
label input[type="email"]:focus {
  border-color: #0056b3;
}

fieldset {
  border: 1.8px solid #007bff;
  border-radius: 5px;
  padding: 6px 10px;
  
  font-size: 0.85rem;
}

legend {
  font-weight: 700;
  color: #007bff;
  padding: 0 5px;
  font-size: 0.9rem;
}

fieldset label {
  font-weight: 500;
  color: #333;
  margin-bottom: 3px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 5px;
  user-select: none;
  font-size: 0.85rem;
}

fieldset input[type="checkbox"] {
  width: 13px;
  height: 13px;
  cursor: pointer;
  accent-color: #007bff;
}

button[type="submit"] {
  width: 100%;
  background-color: #007bff;
  color: white;
  border: none;
  font-weight: 700;
  font-size: 0.9rem;
  padding: 6px 0;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  box-shadow: 0 2px 5px rgba(0,123,255,0.4);
}

button[type="submit"]:hover {
  background-color: #0056b3;
  box-shadow: 0 3px 8px rgba(0,86,179,0.6);
}
    </style>
    <form action="atualizar.php" method="post">
        <input type="hidden" name="id" value="<?= $dados['id'] ?>">

        <label>Nome: <input type="text" name="nome" value="<?= $dados['nome'] ?>" required></label><br>
        <label>CPF: <input type="text" name="cpf" value="<?= $dados['cpf'] ?>" required></label><br>
        <label>Telefone: <input type="text" name="telefone" value="<?= $dados['telefone'] ?>" required></label><br>
        <label>Email: <input type="email" name="email" value="<?= $dados['email'] ?>" required></label><br>
        <label>Setor: <input type="text" name="setor" value="<?= $dados['setor'] ?>" required></label><br>

        <fieldset>
            <legend>Vacinas Recebidas:</legend>
            <?php
            $vacinas = ["Covid-19", "Influenza", "Hepatite B", "Tétano", "Febre Amarela"];
            foreach ($vacinas as $v) {
                $checked = in_array($v, $vacinasMarcadas) ? "checked" : "";
                echo "<label><input type='checkbox' name='vacinas[]' value='$v' $checked> $v</label><br>";
            }
            ?>
        </fieldset>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>
