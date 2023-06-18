<?php
include_once '../config/config.php';
include_once '../config/actions.php';

// Verifique se o ID foi fornecido como parâmetro
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Aqui você precisa executar a lógica para obter os dados do registro do banco de dados com base no ID
  // Substitua as linhas abaixo pela sua lógica de consulta ao banco de dados
  $registro = selecionaTipoDocumentoPorIdAction($conexao, $id);

  // Verifique se o registro foi encontrado
  if ($registro) {
    // Retorne os dados do registro como resposta no formato JSON
    echo json_encode($registro);
  } else {
    // Registro não encontrado, retorne uma resposta vazia ou uma mensagem de erro
    echo json_encode(null);
  }
}
