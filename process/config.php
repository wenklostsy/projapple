<?php
#VARIAVEL DO NOME DO USUÁRIO
@$nomeUsuario = $_SESSION['logado'][0];
#EMAIL DO USUÁRIO 
@$emailUsuario = $_SESSION['logado'][2];
#VARIAVEL DO ULTIMO MÊS
$ultimoMes = date('m/Y', strtotime('-1months'));
#VARIAVEL DO DIA ATUAL
$diaAtual = date('d/m/Y H:i', strtotime('-1hour'));
#VARIAVEL DO ULTIMO ANO
$ultimoAno = date('Y', strtotime('-1years'));
#NOME DO USUÁRIO LOGADO
@$nomeUsuarioLogado = $_SESSION['logado'][0];
#VARIAVEL DIA ATUAL PARA INPUT DATE

$diaInputAtual = date('d/m/Y');
#TRANSFORMA A DATA EM UM ARRAY, SEPARANDO-A PELAS BARRAS
$diaInput = explode("/",$diaInputAtual);

#COMANDO DA TABELA DE USUARIO
$selecionaUsuarioComando = "SELECT * FROM users";
#REQUER CONEXAO
require_once "../process/conexao.php";
#EXECUTA A QUERY
$usuariosGeral = mysqli_query($conexao, $selecionaUsuarioComando);
#EXECUTA A QUERY
$usuarios = mysqli_query($conexao, $selecionaUsuarioComando);
#VERIFICA A QUANTIDADE DE LINHAS QUE POSSUI
$numlinhasUsuarios = mysqli_num_rows($usuariosGeral);

#COMANDO DA TABELA DE PRODUTO
$selecionaProdutoComando = "SELECT * FROM produtos";
#EXECUTA A QUERY
$ProdutoGeral = mysqli_query($conexao, $selecionaProdutoComando);
#EXECUTA A QUERY
$Produto = mysqli_query($conexao, $selecionaProdutoComando);
#VERIFICA A QUANTIDADE DE LINHAS QUE POSSUI
$numlinhasProdutos = mysqli_num_rows($ProdutoGeral);

$Produto = mysqli_fetch_assoc($Produto);
#DATA DE CADASTRO DO USUARIO NO SITE
$data_cadastro_Produto = $Produto['data_cad'];
$data_cadastro_Produto = date('d/m/Y', strtotime($data_cadastro_Produto));
mysqli_close($conexao);

#CONFIGURAÇÕES GERAIS
$nomeSite = "MStudio.Com";
$nomeVendedor = "Matheus Ribeiro";
$cidadeVendedor = "São Paulo, Guarulhos";
$emailVendedor = "matheus.567a@gmail.com";
$celularVendedor = "(11) 96784-0919";
