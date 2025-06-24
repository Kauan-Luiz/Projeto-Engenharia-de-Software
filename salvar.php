<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome     = $_POST["nome"];
    $cpf      = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $email    = $_POST["email"];
    $vacinas  = isset($_POST["vacinas"]) ? implode(", ", $_POST["vacinas"]) : '';

    $sql = "INSERT INTO vacinados (nome, cpf, telefone, email, vacinas)
            VALUES ('$nome', '$cpf', '$telefone', '$email', '$vacinas')";

    if ($conexao->query($sql) === TRUE) {
        echo "<script>alert('Funcionario cadastrado com sucesso!'); window.location.href='CadastroFuncionarios.php';</script>";
        exit();
    } else {
        echo "Erro ao salvar: " . $conexao->error;
    }
}
?>

