<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM lancamentos_vacinas WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Lançamento excluído com sucesso!'); window.location.href='consultar.php';</script>";
    } else {
        echo "Erro ao excluir: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
} else {
    echo "ID inválido.";
}
?>
