<?php
include("conexao.php");

$busca = '';
if (isset($_GET['buscar'])) {
    $busca = trim($_GET['buscar']);
}

// Define quantos registros por página
$limite = 10;

// Página atual (padrão 1)
$pagina = isset($_GET['pagina']) && is_numeric($_GET['pagina']) ? (int) $_GET['pagina'] : 1;

// Calcular o OFFSET
$offset = ($pagina - 1) * $limite;

// Consulta para contar total de registros (considerando busca)
$countSql = "SELECT COUNT(*) AS total FROM lancamentos_vacinas lv
             JOIN vacinados f ON lv.funcionario_id = f.id";

if (!empty($busca)) {
    $countSql .= " WHERE f.nome LIKE ?";
    $stmtCount = $conexao->prepare($countSql);
    $param = "%$busca%";
    $stmtCount->bind_param("s", $param);
} else {
    $stmtCount = $conexao->prepare($countSql);
}

$stmtCount->execute();
$resultCount = $stmtCount->get_result();
$totalRegistros = $resultCount->fetch_assoc()['total'];
$stmtCount->close();

// Calcula total de páginas
$totalPaginas = ceil($totalRegistros / $limite);

// Consulta principal com limite e offset
$sql = "SELECT lv.id, v.nome AS vacina, f.nome AS funcionario, s.nome_setor, lv.data_vacinacao, lv.observacoes
        FROM lancamentos_vacinas lv
        JOIN vacinados f ON lv.funcionario_id = f.id
        JOIN vacinas v ON lv.vacina_id = v.id
        JOIN setores s ON lv.setor_id = s.id";

if (!empty($busca)) {
    $sql .= " WHERE f.nome LIKE ?";
    $sql .= " ORDER BY lv.id DESC LIMIT ? OFFSET ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sii", $param, $limite, $offset);
} else {
    $sql .= " ORDER BY lv.id DESC LIMIT ? OFFSET ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ii", $limite, $offset);
}

$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Css/Padrao.css">
    <link rel="stylesheet" href="Css/consulta.css">
</head>
<body>
   
    <?php
    include_once("header.php");
    ?>

    <div class="container">
        <?php
        include_once("article.php");
        ?>


        <div class="conteudo">
        

            <main>    
                <div class="container-consulta">
                    <h2>Consulta de Vacinas Lançadas</h2>

                    <form method="GET" action="" class="form-buscar">
                        <input type="text" name="buscar" placeholder="Buscar funcionário..." value="<?= htmlspecialchars($busca) ?>" id="input-buscar">
                        <button type="submit">Buscar</button>
                    </form>

                    <?php if ($resultado->num_rows > 0): ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Funcionário</th>
                                    <th>Vacina</th>
                                    <th>Setor</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $resultado->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['funcionario'] ?></td>
                                        <td><?= $row['vacina'] ?></td>
                                        <td><?= $row['nome_setor'] ?></td>
                                        <td><?= date('d/m/Y', strtotime($row['data_vacinacao'])) ?></td>
                                        <td class="acoes">
                                            <a href="editar_lancamento.php?id=<?= $row['id'] ?>">Editar</a> |
                                            <a href="excluir_lancamento.php?id=<?= $row['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p class="no-data">Nenhum lançamento encontrado.</p>
                    <?php endif; ?>

                    <?php if ($totalPaginas > 1): ?>
                        <nav style="text-align:center; margin-top:20px;">
                            <?php if ($pagina > 1): ?>
                                <a href="?buscar=<?= urlencode($busca) ?>&pagina=<?= $pagina - 1 ?>" style="margin-right:10px;">&laquo; Anterior</a>
                            <?php endif; ?>

                            <?php
                            // Mostrar links das páginas (exemplo simples mostrando todas)
                            for ($i = 1; $i <= $totalPaginas; $i++):
                            ?>
                                <?php if ($i == $pagina): ?>
                                    <strong><?= $i ?></strong>
                                <?php else: ?>
                                    <a href="?buscar=<?= urlencode($busca) ?>&pagina=<?= $i ?>"><?= $i ?></a>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($pagina < $totalPaginas): ?>
                                <a href="?buscar=<?= urlencode($busca) ?>&pagina=<?= $pagina + 1 ?>" style="margin-left:10px;">Próximo &raquo;</a>
                            <?php endif; ?>
                        </nav>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>

    <script src="JavaScript/consulta.js"></script>
</body>
</html>
