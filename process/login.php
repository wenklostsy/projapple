<?php
session_start();
include "../process/conexao.php";

#VARIAVEIS DE CADASTRO
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

#VERIFICAÇÃO DE ALGUMA VARIAVEL VAZIA
if (empty($email) or empty($senha)) {
  $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
    Preencha todos os campos!
  </div>";
  header('location: ../public/index.php');
  exit();
}

#COMANDO DA VERIFICAÇÃO DE LOGIN E DO ACESSO
$verificaLogin = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$verificaAcesso = "SELECT * FROM acesso WHERE identificacao = '$email' LIMIT 1";
#EXECUÇÃO DO COMANDO DE DE LOGIN E DO ACESSO
$executaLogin = mysqli_query($conexao, $verificaLogin);
$executaAcesso = mysqli_query($conexao, $verificaAcesso);
#ASSOCIAÇÃO DOS DADOS
$Login = mysqli_fetch_assoc($executaLogin);
$Acesso = mysqli_fetch_assoc($executaAcesso);

if (password_verify($senha, $Login['senha'])) {
$_SESSION['logado'] = [$Login['nome'], $Login['telefone'], $Login['email']];
$_SESSION['acesso'] = [$Acesso['areaadm'], $Acesso['areauser'], $Acesso['lastmodificacao']];
header('location: ../public/index.php');
}else {
  $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
    E-mail ou senha estão incorretos.
  </div>";
  header('location: ../public/index.php');
  exit();
}

// #COMANDOS DE CADASTRO E ACESSO DO USUÁRIO
// $verificaUsuarioCAD = "SELECT COUNT(*) AS total FROM users WHERE email = '$email' senha = ''";

// #EXECUÇÃO E ASSOCIAÇÃO DE CADASTRO DO USUÁRIO
// $executaUsuarioCAD = mysqli_query($conexao, $verificaUsuarioCAD);
// $associadadosUsuarioCAD = mysqli_fetch_assoc($executaUsuarioCAD);

mysqli_close($conexao);
