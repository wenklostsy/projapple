<?php
include_once "../process/conexao.php";

$id = $_GET['id'];

if (!isset($id) or $id == "") {
    header('location: ../cadastros/cad_produto.php');
    exit();
}
$comandoImg = "SELECT principal, img2, img3 FROM produtos WHERE idprodutos='$id'";
$executaImg = mysqli_query($conexao, $comandoImg);
$imagem = mysqli_fetch_assoc($executaImg);

#COMANDO PARA DELETAR AS IMAGENS E EM SEGUIDA A EXECUÇÃO
$deletarPrincipal = unlink('../arquivos/fotos_produtos/' . $imagem['principal']);
mysqli_query($conexao, $deletarPrincipal);
$deletarDois = unlink('../arquivos/fotos_produtos/' . $imagem['img2']);
mysqli_query($conexao, $deletarPrincipal);
$deletarTres = unlink('../arquivos/fotos_produtos/' . $imagem['img3']);
mysqli_query($conexao, $deletarPrincipal);

$comandoApagar = "DELETE FROM produtos WHERE idprodutos='$id'";
$executaApagar = mysqli_query($conexao, $comandoApagar);
$linhasAfetadas = mysqli_affected_rows($conexao);

if ($linhasAfetadas == 1) {
    $_SESSION['msg'] = "<div class='alert alert-sucess' role='alert'>
    Produto apagado com suceso!
  </div>";
    header('location: ../cadastros/cad_produto.php');
    exit();
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
    Falha ao tentar apagar produto.
  </div>";
    header('location: ../cadastros/cad_produto.php');
    exit();
}

mysqli_close($conexao);
