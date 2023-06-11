<?php

define("SQLErrorMessage", "SQL error");


function insereTipoDocumentoDb($conexao, $tipoDoc, $tempArquivamento)
{
  $tipoDoc = mysqli_real_escape_string($conexao, $tipoDoc);
  $tempArquivamento = mysqli_real_escape_string($conexao, $tempArquivamento);

  if ($tipoDoc && $tempArquivamento) {
    $sql = "INSERT INTO tipo_doc (tipo_doc, temp_arquivamento) VALUES (?, ?)";
    $stmt = mysqli_stmt_init($conexao);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      exit(SQLErrorMessage);
    }

    mysqli_stmt_bind_param($stmt, 'ss', $tipoDoc, $tempArquivamento);
    mysqli_stmt_execute($stmt);
    mysqli_close($conexao);
    return true;
  }
}
function selecionaTipoDocumentoPorNomeDb($conexao, $tipoDoc)
{
  $tipoDoc = mysqli_real_escape_string($conexao, $tipoDoc);

  $sql = "SELECT * FROM tipo_doc  WHERE tipoDoc = ?";
  $stmt = mysqli_stmt_init($conexao);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    exit(SQLErrorMessage);
  }

  mysqli_stmt_bind_param($stmt, 's', $tipoDoc);
  mysqli_stmt_execute($stmt);

  $tipoDoc = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

  mysqli_close($conexao);
  return $tipoDoc;
}

function listaTipoDocumentoDb($conexao)
{
  $tipoDocumento = [];

  $sql = "SELECT * FROM tipo_doc";
  $result = mysqli_query($conexao, $sql);

  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    $tipoDocumento = mysqli_fetch_all($result, MYSQLI_ASSOC);
  }

  mysqli_close($conexao);
  return $tipoDocumento;
}

function atualizarTipoDocumentoDb($conexao, $codTipoDoc, $tipoDoc, $tempArquivamento)
{
  if ($codTipoDoc && $tipoDoc && $tempArquivamento) {
    $sql = "UPDATE tipo_doc SET tipo_doc = ?, temp_arquivamento = ? WHERE cod_tipo_doc  = ?";
    $stmt = mysqli_stmt_init($conexao);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      exit(SQLErrorMessage);
    }

    mysqli_stmt_bind_param($stmt, 'sii', $tipoDoc, $tempArquivamento, $id);
    mysqli_stmt_execute($stmt);
    mysqli_close($conexao);
    return true;
  }
}

function deletaTipoDocumentoDb($conexao, $codTipoDoc)
{
  $codTipoDoc = mysqli_real_escape_string($conexao, $codTipoDoc);

  if ($codTipoDoc) {
    $sql = "DELETE FROM tipo_doc WHERE cod_tipo_doc = ?";
    $stmt = mysqli_stmt_init($conexao);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
      exit(SQLErrorMessage);
    }

    mysqli_stmt_bind_param($stmt, 'i', $codTipoDoc);
    mysqli_stmt_execute($stmt);
    return true;
  }
}
