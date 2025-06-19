<?php include 'conexao.php'; ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial - Vacina+</title>
    <link rel="stylesheet" href="Css/consulta.css">
    <link rel="stylesheet" href="Css/Padrao.css">
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
                <div class="search-container">
                    <div class="search-box">
                        <form method="GET" action="consultar.php">
                            <input type="text" name="busca" id="search" placeholder="Buscar por nome..." value="<?= isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : '' ?>">
                            <button type="submit">Buscar</button>
                        </form>
                    </div>
                </div>

                <?php
                // Captura o termo de busca e escapa para evitar SQL Injection
                $busca = isset($_GET['busca']) ? $conexao->real_escape_string($_GET['busca']) : "";

                // Monta a query filtrando pelo nome, se houver termo
                $query = "SELECT * FROM vacinados";
                if ($busca != "") {
                    $query .= " WHERE nome LIKE '%$busca%'";
                }
                $query .= " ORDER BY nome ASC";

                // Executa a query filtrada
                $resultado = $conexao->query($query);
                ?>

                <table id="tabela">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Setor</th>
                            <th>Vacinas</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Agora sim exibe o resultado da consulta filtrada
                        if ($resultado && $resultado->num_rows > 0) {
                            while ($linha = $resultado->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
                                echo "<td>" . htmlspecialchars($linha['cpf']) . "</td>";
                                echo "<td>" . htmlspecialchars($linha['telefone']) . "</td>";
                                echo "<td>" . htmlspecialchars($linha['email']) . "</td>";
                                echo "<td>" . htmlspecialchars($linha['setor']) . "</td>";
                                echo "<td>" . htmlspecialchars($linha['vacinas']) . "</td>";
                                echo "<td class='actions'>
                                        <a href='editar.php?id=" . $linha['id'] . "'><button class='edit-btn'>Editar</button></a>
                                        <a href='excluir.php?id=" . $linha['id'] . "' onclick=\"return confirm('Deseja excluir este registro?');\"><button class='delete-btn'>Excluir</button></a>
                                    </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Nenhum registro encontrado.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>

    <script src="JavaScript/consulta.js"></script>
</body>
</html>
