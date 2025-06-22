<?php
include("conexao.php");

$nome = $_POST['nome_setor'];
$descricao = $_POST['descricao'];
$responsavel = $_POST['responsavel'];
$email = $_POST['email_setor'];
$ramal = $_POST['ramal'];
$localizacao = $_POST['localizacao'];
$status = $_POST['status'];

// preparando e executando a query
$sql = "INSERT INTO setores (nome_setor, descricao, responsavel, email_setor, ramal, localizacao, status)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("sssssss", $nome, $descricao, $responsavel, $email, $ramal, $localizacao, $status);

if ($stmt->execute()) {
    echo "<script>alert('Setor cadastrado com sucesso!'); window.location.href='CadastroSetor.php';</script>";
} else {
    echo "Erro ao cadastrar setor: " . $stmt->error;
}

$stmt->close();
$conexao->close();


?>
