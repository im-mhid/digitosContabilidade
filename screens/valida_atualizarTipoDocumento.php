<?php
require_once '../config/config.php';
require_once '../config/actions.php';

$codTipoDocEditar = $tipoDocEditar =  $tempoArquivamentoEditar = "";
$codTipoDocEditarErro = $tipoDocEditarErro = $tempoArquivamentoEditarErro = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  function formataCampo($campo)
  {
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
  }

  if (empty($_POST["codTipoDocEditar"])) {
    $codTipoDocEditarErro = "O id tipo do documento é obrigatório";
  } else {
    $codTipoDocEditar = formataCampo($_POST["codTipoDocEditar"]);
    // Verifica se o valor é um número inteiro
    if (!is_numeric($codTipoDocEditar) || !is_int($codTipoDocEditar + 0)) {
      $codTipoDocEditarErro = "O id do tipo de documento deve ser um número inteiro";
    }
  }

  if (empty($_POST["tipoDocEditar"])) {
    $tipoDocEditarErro = "O tipo do documento é obrigatório";
  } else {
    $tipoDocEditar = formataCampo($_POST["tipoDocEditar"]);
    // Verifica se o nome contém apenas letras e espaços
    if (!ctype_alpha(str_replace(' ', '', $tipoDocEditar))) {
      $tipoDocEditarErro = "O tipo do documento deve conter apenas letras e espaços";
    }
  }

  if (empty($_POST["tempoArmazenamentoEditar"])) {
    $tempoArquivamentoEditarErro = "O tempo de arquivamento é obrigatório";
  } else {
    $tempoArquivamentoEditar = formataCampo($_POST["tempoArmazenamentoEditar"]);
    // Verifica se o valor é um número inteiro
    if (!is_numeric($tempoArquivamentoEditar) || !is_int($tempoArquivamentoEditar + 0)) {
      $tempoArquivamentoEditarErro = "O tempo de arquivamento deve ser um número inteiro";
    }
  }

  if (empty($codTipoDocEditarErro) && empty($tipoDocEditarErro) && empty($tempoArquivamentoEditarErro)) {
    $resultado = atualizarTipoDocumentoAction($conexao, $codTipoDocEditar, $tipoDocEditar, $tempoArquivamentoEditar);

    if ($resultado == 'atualizado-com-sucesso') {
      header("Location: /digitoscontabilidade/screens/tipoDocumento.php");
      exit();
    } else {
      echo "<h1>" . $resultado . "</h1>";
      echo "<script>alert('" . $resultado . "');</script>";
      echo "<script>window.location.href = '/digitoscontabilidade/screens/tipoDocumento.php';</script>";
    }
  } else {
    echo "<script>alert('" . $codTipoDocEditarErro . $tipoDocEditarErro . $tempoArquivamentoEditarErro . "');</script>";
    echo "<script>window.location.href = '/digitoscontabilidade/screens/tipoDocumento.php';</script>";
    exit();
  }
}
