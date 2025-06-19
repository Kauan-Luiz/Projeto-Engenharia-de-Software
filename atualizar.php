<?php
include "conexao.php";

$id       = $_POST["id"];
$nome     = $_POST["nome"];
$cpf      = $_POST["cpf"];
$telefone = $_POST["telefone"];
$email    = $_POST["email"];
$setor    = $_POST["setor"];
$vacinas  = isset($_POST["vacinas"]) ? implode(", ", $_POST["vacinas"]) : '';

$sql = "UPDATE vacinados SET 
        nome = '$nome',
        cpf = '$cpf',
        telefone = '$telefone',
        email = '$email',
        setor = '$setor',
        vacinas = '$vacinas'
        WHERE id = $id";

if ($conexao->query($sql) === TRUE) {
    header("Location: consultar.php");
    exit();
} else {
    echo "Erro ao atualizar: " . $conexao->error;
}
?>
