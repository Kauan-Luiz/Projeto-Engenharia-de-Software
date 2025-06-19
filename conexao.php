<?php

$hostname = "localhost";
$usuario = "root";
$senha = "";
$db = "vacina_mais";

$conexao = new mysqli($hostname, $usuario, $senha, $db);

if ($conexao->connect_error) {
    die("Falha ao conectar: " . $conexao->connect_error);
    
}

?>
