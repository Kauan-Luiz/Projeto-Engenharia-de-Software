<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $funcionario_id = $_POST['funcionario_id'];
    $vacina_id = $_POST['vacina_id'];
    $setor_id = $_POST['setor_id'];
    $data_vacinacao = $_POST['data_vacinacao'];
    $observacoes = $_POST['observacoes'];

    $sql = "UPDATE lancamentos_vacinas SET funcionario_id = ?, vacina_id = ?, setor_id = ?, data_vacinacao = ?, observacoes = ? WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iiissi", $funcionario_id, $vacina_id, $setor_id, $data_vacinacao, $observacoes, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Lançamento atualizado com sucesso!'); window.location.href='consultar.php';</script>";
    } else {
        echo "Erro: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
}
?>
