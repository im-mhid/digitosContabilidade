<?php

require_once 'database.php';

function criarTipoDocumentoAction($conexao, $tipoDoc, $tempArquivamento)
{
    $insereTipoDb = insereTipoDocumentoDb($conexao, $tipoDoc, $tempArquivamento);
    return $insereTipoDb == 1 ? 'criado-com-sucesso' : 'erro-ao-criar';
}

function selecionaTipoDocumentoPorNomeAction($conexao, $tipoDoc)
{
    return selecionaTipoDocumentoPorNomeDb($conexao, $tipoDoc);
}

function listaTipoDocumentoAction($conexao)
{
    return listaTipoDocumentoDb($conexao);
}

function atualizarTipoDocumentoAction($conexao, $codTipoDoc, $tipoDoc, $tempArquivamento)
{
    $atualizarTipoDocumentoDb = atualizarTipoDocumentoDb($conexao, $codTipoDoc, $tipoDoc, $tempArquivamento);
    return $atualizarTipoDocumentoDb == 1 ? 'atualizado-com-sucesso' : 'erro-ao-atualizar';
}

function deletarTipoDocumentoAction($conexao, $codTipoDoc)
{
    $deletaTipoDocumentoDb = deletaTipoDocumentoDb($conexao, $codTipoDoc);
    return $deletaTipoDocumentoDb == 1 ? 'removido-com-sucesso' : 'erro-ao-remover';
}
