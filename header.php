<?php
session_start();

if (!isset($_SESSION['id_usuario'])) {
header('Location: login/login.php');
exit();
}

$nomeUsuario = $_SESSION['nome_usuario'];
?>

    <header>
    <div class="logo">
        <a href="PaginaInicial.php"><img src="img/logo.png" alt="" srcset=""></a>
    </div>
    <div class="usuario">
        <?php echo($nomeUsuario);?>
        <img src="img/usuario.png" alt=""> 
       
    </div>
    </header>




