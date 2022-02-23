<?php
session_start();
include "../process/conexao.php";

#VARIAVEIS DE CADASTRO
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$senha = password_hash($senha, PASSWORD_DEFAULT);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

#VERIFICAÇÃO DE ALGUMA VARIAVEL VAZIA
if (empty($nome) or empty($email) or empty($senha) or empty($telefone)) {
  $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
    Preencha todos os campos!
  </div>";
  header('location: ../public/index.php');
  exit();
}

#COMANDOS DE CADASTRO E ACESSO DO USUÁRIO
$verificaUsuarioCAD = "SELECT COUNT(*) AS total FROM users WHERE email = '$email'";
$verificaUsuarioACESS = "SELECT COUNT(*) AS total FROM acesso WHERE identificacao = '$email'";

#EXECUÇÃO E ASSOCIAÇÃO DE CADASTRO DO USUÁRIO
$executaUsuarioCAD = mysqli_query($conexao, $verificaUsuarioCAD);
$associadadosUsuarioCAD = mysqli_fetch_assoc($executaUsuarioCAD);

#EXECUÇÃO E ASSOCIAÇÃO DO CADASTRO DE ACESSO
$executaUsuarioACESS = mysqli_query($conexao, $verificaUsuarioACESS);
$associadadosUsuarioACESS = mysqli_fetch_assoc($executaUsuarioACESS);

#VERIFICA SE JÁ EXISTE UM USUÁRIO CADASTRADO
if ($associadadosUsuarioCAD['total'] OR $associadadosUsuarioACESS == 1) {
  $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
    Usuário já cadastrado, por favor tente novamente.
  </div>";
  header('location: ../public/index.php');
  exit();
}

#COMANDO PARA CADASTRO DE USUÁRIO
$comandoCad = "INSERT INTO users (nome, telefone, email, senha, data_cad ) VALUES 
('$nome', '$telefone', '$email', '$senha', NOW());";

#COMANDO PARA CADASTRO DE ACESSO PADRÃO
$comandoAcesso = "INSERT INTO acesso (identificacao , lastmodificacao) VALUES 
('$email', NOW());";

#CRIA OS ACESSOS
$executaAcesso = mysqli_query($conexao, $comandoAcesso);
#VERIFICA SE FOI AFETADA ALGUMA LINHA
$affectedRows = mysqli_affected_rows($conexao);

if ($affectedRows == 1) {
  #CADASTRA O USUARIO
  $executaCad = mysqli_query($conexao, $comandoCad);
  #EXIBE A MENSAGEM QUE JÁ EXISTE USUÁRIO CADASTRADO NO BANCO
  if (mysqli_insert_id($conexao)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
    Usuário cadastrado com sucesso! Faça login para continuar.
  </div>";
    header('location: ../public/index.php');
    exit();
  }
} else {
  $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
  Falha ao cadastrar usuário.
</div>";
  header('location: ../public/index.php');
  exit();
}

#ENCERRA CONEXAO
mysqli_close($conexao);
