<?php
include "conexao.php";

$id = $_GET["id"];

$sql = "DELETE FROM vacinados WHERE id = $id";

if ($conexao->query($sql) === TRUE) {
    header("Location: consultar.php");
    exit();
} else {
    echo "Erro ao excluir: " . $conexao->error;
}
?>

