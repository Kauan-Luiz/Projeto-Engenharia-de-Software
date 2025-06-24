<?php
include("conexao.php");

$nome = $_POST['nome_setor'];
$responsavel = $_POST['responsavel'];
$email = $_POST['email_setor'];



// preparando e executando a query
$sql = "INSERT INTO setores (nome_setor, responsavel, email_setor)
        VALUES (?, ?, ?)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("sss", $nome, $responsavel, $email);

if ($stmt->execute()) {
    echo "<script>alert('Setor cadastrado com sucesso!'); window.location.href='CadastroSetor.php';</script>";
} else {
    echo "Erro ao cadastrar setor: " . $stmt->error;
}

$stmt->close();
$conexao->close();


?>
