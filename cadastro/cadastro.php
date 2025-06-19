<?php
    include_once("../conexao.php");

    if(isset($_POST['submit']))
    {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')");
    header("Location: ../login/login.php");
    exit();

    }



?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro</title>
</head>
<body>

    <div class="container-register">
        <div class="register">
            <div>
                <div class="register-top-container">  
                    <div class="text-register">
                        <h2>CADASTRO</h2>
                        <h2 class="point">.</h2>
                    </div>
                    <a href=""><img src="../img/logo.png" alt="" class="logo"></a>
                </div>

                <form class="form" action="cadastro.php" method="POST">
                    <div>
                        <label for="">Usuario</label><br>
                        <input type="text" name="nome" required placeholder="Seu Usuario">
                    </div>
                    <div>
                        <label for="">Email</label><br>
                        <input type="text" name="email" required placeholder="Exemplo@gmail.com">
                    </div>
                    <div>
                        <label for="">Senha</label><br>
                        <input type="password" name="senha" required placeholder="********">

                    </div>

                    <div class="enter-button">
                        <input type="submit" value="Cadastrar" name="submit">
                    </div>
                </form>

                <a href="../login/login.php" class="voltarAoLogin">Voltar ao Login</a>
            </div>
            
                 
        </div>
    </div>
</body>
</html>
