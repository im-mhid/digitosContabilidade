<?php
$dbServidor = 'localhost';
$dbUsuario = 'root';
$dbSenha = '';
$dbNome = 'contabilidade';
$conexao = mysqli_connect($dbServidor, $dbUsuario, $dbSenha, $dbNome);
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
