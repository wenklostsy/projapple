<?php

function areaAdm()
{
    #SE EXISTIR A SESSÃO ACESSO E SEU NÍVEL FOR MAIOR OU IGUAL A 1 EXIBE O BOTÃO DE DASHBOARD
    if (isset($_SESSION['acesso'][0]) and $_SESSION['acesso'][0] >= 1) {
        echo "<li class='nav-item'><a class='nav-link' href='../adm/dashboard.php'>Dashboard</a></li>";
    }
}

function verificaAcesso()
{
    if (!isset($_SESSION['acesso'][0]) or $_SESSION['acesso'][0] == 0) {
        header('location: ../public/index.php');
    }
}

#VERIFICA SE EXISTE O ID, SE É UM ITEM ATIVO OU SE NÃO EXISTE O CADASTRO DESSE PRODUTO
function verificaAtivo($conexao, $id)
{
    $comandoUltimosRegistros = "SELECT ativo FROM produtos WHERE idprodutos = $id";
    $executaRegistros = mysqli_query($conexao, $comandoUltimosRegistros);
    $prodAssoc = mysqli_fetch_assoc($executaRegistros);
    $numRows = mysqli_num_rows($executaRegistros);

    if ($prodAssoc['ativo'] == "nao" or empty($id) or $numRows == 0) {
        header('location: ../public/index.php');
    }
}

function verificaLogin()
{
    if (!isset($_SESSION['logado'][2])) {
        $_SESSION['msg'] = "<div class='alert alert-warning text-center' role='alert'>
        Faça o login para continuar
        </div>";
        header('location: ../public/index.php');
        exit();
    }
}

function verificaCarrinhoVazio()
{

    #MOSTRA O CARRINHO VAZIO
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['msg'] =
            "<div class='alert alert-warning' role='alert'>
             Seu carrinho esta vazio! :(
            </div>";
        header('location: ../public/index.php');
    } // VERIFICAR BUG DO HEADER

}

function verificaId($id)
{
    if ($id == 0 or empty($id)) {
?>
        <meta http-equiv="refresh" content="0;url=../public/index.php">
<?php
        die();
    }
}

function verificaDesconto()
{
    include "../process/conexao.php";
    $diaInputAtual = date('d/m/Y');
    #TRANSFORMA A DATA EM UM ARRAY, SEPARANDO-A PELAS BARRAS
    $diaAtual = explode("/", $diaInputAtual);
    $dia = $diaAtual[0];
    $mes = $diaAtual[1];
    $ano = $diaAtual[2];
    $data = "$ano-$mes-$dia";
    $comandoPromocao = "SELECT idprodutos, promo_fim FROM produtos WHERE valor_desconto >= 1";
    $executaPromocao = mysqli_query($conexao, $comandoPromocao);

    while ($prodAssoc = mysqli_fetch_assoc($executaPromocao)) {
        $id =  $prodAssoc['idprodutos'];
        $comandoFimPromocao = "UPDATE produtos SET promo_ini='', promo_fim='', valor_desconto='' WHERE idprodutos = $id";
        if ($prodAssoc['promo_fim'] < $data) {
            mysqli_query($conexao, $comandoFimPromocao);
        }
    }
}
verificaDesconto();
