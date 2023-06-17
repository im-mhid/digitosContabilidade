<?php
require_once '../config/config.php';
require_once '../config/actions.php';
// Verifica se o ID do registro foi fornecido na URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Realize as operações de exclusão do registro com o ID fornecido
  // Por exemplo, você pode usar uma função para executar a exclusão no banco de dados
  deletarTipoDocumentoAction($conexao, $id);
  // Após a exclusão, redirecione para a página principal ou qualquer outra página desejada
  header('Location: tipoDocumento.php');
  exit();
} else {
  // Se o ID do registro não foi fornecido, redirecione para a página principal ou exiba uma mensagem de erro adequada
  header('Location: tipoDocumento.php');
  exit();
}
