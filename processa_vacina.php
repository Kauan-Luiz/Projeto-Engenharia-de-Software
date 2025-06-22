<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $funcionario_id = $_POST['funcionario_id'];
    $vacina_id = $_POST['vacina_id'];
    $setor_id = $_POST['setor_id'];
    $data_vacinacao = $_POST['data_vacinacao'];
    $observacoes = $_POST['observacoes'];

    $sql = "INSERT INTO lancamentos_vacinas 
        (funcionario_id, vacina_id, setor_id, data_vacinacao, observacoes) 
        VALUES (?, ?, ?, ?, ?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iiiss", $funcionario_id, $vacina_id, $setor_id, $data_vacinacao, $observacoes);

    if ($stmt->execute()) {
        echo "<script>alert('Vacina lançada com sucesso!'); window.location.href='LancarVacinas.php';</script>";
    } else {
        echo "Erro ao lançar vacina: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "Requisição inválida.";
}
?>
