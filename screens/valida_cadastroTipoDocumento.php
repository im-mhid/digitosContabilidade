<?php
require_once '../config/config.php';
require_once '../config/actions.php';

$tipoDocCadastro =  $tempoArquivamentoCadastro = "";
$tipoDocCadastroErro = $tempoArquivamentoCadastroErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  function formataCampo($campo)
  {
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
  }

  // Validação do campo tipoDocCadastro
  if (empty($_POST["tipoDocCadastro"])) {
    $tipoDocCadastroErro = "O tipo do documento é obrigatório";
  } else {
    $tipoDocCadastro = formataCampo($_POST["tipoDocCadastro"]);
    // Verifica se o nome contém apenas letras e espaços
    if (!ctype_alpha(str_replace(' ', '', $tipoDocCadastro))) {
      $tipoDocCadastroErro = "O tipo do documento deve conter apenas letras e espaços";
    }
  }

  // Validação do campo tempoArquivamentoCadastro
  if (empty($_POST["tempoArquivamentoCadastro"])) {
    $tempoArquivamentoCadastroErro = "O tipo do documento é obrigatório";
  } else {
    $tempoArquivamentoCadastro = formataCampo($_POST["tempoArquivamentoCadastro"]);
    // Verifica se o valor é um número inteiro
    if (!is_numeric($tempoArquivamentoCadastro) || !is_int($tempoArquivamentoCadastro + 0)) {
      $tempoArquivamentoCadastroErro = "O tempo de arquivamento deve ser um número inteiro";
    }
  }

  // Se não houver erros, o registro do usuário pode ser realizado
  if (empty($tipoDocCadastroErro) && empty($tempoArquivamentoCadastroErro)) {
    $resultado = criarTipoDocumentoAction($conexao, $tipoDocCadastro, $tempoArquivamentoCadastro);
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit();
  }
}
