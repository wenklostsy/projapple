<?php
session_start();
include "../process/conexao.php";

$idProduto = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$quantidade = trim(filter_input(INPUT_POST, 'qtd', FILTER_SANITIZE_NUMBER_INT));
$notaFiscal = trim(filter_input(INPUT_POST, 'notafiscal', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$fornecedor = trim(filter_input(INPUT_POST, 'fornecedor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$valorGasto = trim(filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_FLOAT));
$dataEntrada = trim(filter_input(INPUT_POST, 'dataentrada', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

#VERIFICA SE O NOME, CNPJ TELEFONE OU O EMAIL ESTÃO VAZIOS
if (empty($idProduto) or empty($quantidade) or empty($notaFiscal) or empty($fornecedor) or empty($valorGasto) or empty($dataEntrada)) {
    $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
    Preencha todos os campos.
    </div>";
    header('location: entrada-material.php');
    exit();
}

$selecionaProduto = "SELECT * FROM produtos WHERE idprodutos = $idProduto";
$executaSelecao = mysqli_query($conexao,$selecionaProduto);
$assoc = mysqli_fetch_assoc($executaSelecao);

$nomeProduto = $assoc['nome'];
$estoqueAtual = $assoc['estoque'];
$estoqueRenovado = $estoqueAtual + $quantidade;

$comandoEntrada = "INSERT INTO entradas
(nome, quantidade, notafiscal, fornecedor, valor_gasto, data_entrada, data_cad) VALUES 
('$nomeProduto', '$quantidade', '$notaFiscal', '$fornecedor', '$valorGasto', '$dataEntrada', NOW())";

$executaEntrada = mysqli_query($conexao, $comandoEntrada);

if (mysqli_insert_id($conexao)) {
    $atualizaEstoque = "UPDATE produtos SET estoque='$estoqueRenovado' WHERE idprodutos='$idProduto'";
    $executaEntrada = mysqli_query($conexao, $atualizaEstoque);

    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
    Entrada realizada com sucesso.
    </div>";
    header('location: entrada-material.php');
    exit();
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
    Falha ao dar entrada no material.
    </div>";
    header('location: entrada-material.php');
    exit();
}

mysqli_close($conexao);
