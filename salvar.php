<?php
include "conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome     = $_POST["nome"];
    $cpf      = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $email    = $_POST["email"];
    $setor    = $_POST["setor"];
    $vacinas  = isset($_POST["vacinas"]) ? implode(", ", $_POST["vacinas"]) : '';

    $sql = "INSERT INTO vacinados (nome, cpf, telefone, email, setor, vacinas)
            VALUES ('$nome', '$cpf', '$telefone', '$email', '$setor', '$vacinas')";

    if ($conexao->query($sql) === TRUE) {
        header("Location: consultar.php");
        exit();
    } else {
        echo "Erro ao salvar: " . $conexao->error;
    }
}
?>

