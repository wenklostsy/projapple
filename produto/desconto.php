<?php
#INSERE O ARQUIVO HEADER
include "../template/geral.php";
#VERIFICA SE O USUÁRIO POSSUI ACESSO
verificaAcesso();
#INCLUI O ARQUIVO DE CONEXAO
include "../process/conexao.php";
$inicioDesconto = filter_input(INPUT_POST, 'promoini', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$fimDesconto = filter_input(INPUT_POST, 'promofim', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$diaAtualDesconto = date("Y-m-d");
$valorDesconto = filter_input(INPUT_POST, 'valordesconto', FILTER_SANITIZE_NUMBER_FLOAT);
$dataFim = date("d/m/Y", strtotime($fimDesconto));

$id = $_GET['id'];

if ($inicioDesconto < $diaAtualDesconto) {
    $_SESSION['msg'] = "<div class='alert alert-warning p-3' role='alert'>
    A data de inicio do desconto não pode ser menor do que o dia atual
    </div>";
    header('location: ../cadastros/cad_produto.php');
    exit();
} elseif ($fimDesconto < $diaAtualDesconto) {
    $_SESSION['msg'] = "<div class='alert alert-warning p-3' role='alert'>
    O dia do término do desconto não pode ser menor do que o dia atual
    </div>";
    header('location: ../cadastros/cad_produto.php');
    exit();
} else {
    $comandoProduto = "UPDATE produtos SET promo_ini = '$inicioDesconto', promo_fim = '$fimDesconto', valor_desconto ='$valorDesconto',
     data_edit = NOW() WHERE idprodutos = $id";

    $executaProduto = mysqli_query($conexao, $comandoProduto);
    $numRows = mysqli_affected_rows($conexao);

    if ($numRows >= 1) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
    Promoção valida até o dia $dataFim!
  </div>";
        header("location: ../cadastros/cad_produto.php");
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
    Falha ao colocar produto em desconto.
  </div>";
        header("location: ../cadastros/cad_produto.php");
        die();
    }
}

mysqli_close($conexao);