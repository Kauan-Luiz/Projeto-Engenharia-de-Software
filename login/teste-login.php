<?php
session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('../conexao.php');

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($sql);

    if (mysqli_num_rows($result) > 0) {
        // Pegar os dados do usuário
        $usuario = mysqli_fetch_assoc($result);

        // Corrigido: usa a coluna 'nome'
        $_SESSION['id_usuario'] = $usuario['id'];
        $_SESSION['nome_usuario'] = $usuario['nome']; // <- aqui trocamos

        // Redirecionar
        header('Location: ../PaginaInicial.php');
        exit();
    } else {
        header('Location: login.php');
        exit();
    }
} 

else {
    header('Location: login.php');
    exit();
};
?>
