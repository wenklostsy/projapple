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
