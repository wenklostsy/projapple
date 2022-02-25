<?php
session_start();
include "../process/conexao.php";

$id = $_GET['id'];

//verificaId($id);

$nomeProduto = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$categoria = trim(filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$ativo = trim(filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$descricao = trim(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$especificacao = trim(filter_input(INPUT_POST, 'especificacao', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$estoque = trim(filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$valor = trim(filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_FLOAT));

#VERIFICA SE ALGUMA VARIAVEL ESTA VAZIA
if (empty($nomeProduto) or empty($categoria) or empty($ativo) or empty($descricao) or empty($especificacao) or
  empty($estoque) or empty($valor) ) {
  $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
      Preencha todos os campos!
    </div>";
  header('location: ../cadastros/cad_produto.php');
  exit();
}

$comandoProduto = "UPDATE produtos SET nome = '$nomeProduto', categoria = '$categoria', ativo ='$ativo',
descricao = '$descricao', especificacao ='$especificacao', estoque = '$estoque', valor = '$valor', data_edit = NOW() WHERE idprodutos = $id";

$executaProduto = mysqli_query($conexao, $comandoProduto);
$numRows = mysqli_affected_rows($conexao);

if ($numRows >= 1) {
  $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
    Produto cadastrado com sucesso.
  </div>";
  header("location: ../adm/edita_prod.php?id=$id");
} else {
  $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
    Falha ao cadastrar produto.
  </div>";
  header("location: ../adm/edita_prod.php?id=$id");
  die();
}

mysqli_close($conexao);
