<?php
session_start();
include "../process/conexao.php";

#VARIAVEIS DE CADASTRO
$nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$senha = trim(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$senha = trim(password_hash($senha, PASSWORD_DEFAULT));
$telefone = trim(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
#VARIAVEIS DE LOCALIDADE
$cep = trim(filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$cidade = trim(filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$estado = trim(filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$rua = trim(filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$bairro = trim(filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$numero = trim(filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT));

echo $nome . "<br>";
echo $email . "<br>";
echo $senha . "<br>";
echo $telefone . "<br>";
echo $cep . "<br>";
echo $cidade . "<br>";
echo $estado . "<br>";
echo $rua . "<br>";
echo $bairro . "<br>";
echo $numero . "<br>";

#VERIFICAÇÃO DE ALGUMA VARIAVEL VAZIA
if (empty($nome) or empty($email) or empty($senha) or empty($telefone)) {
  $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
    Preencha todos os campos!
  </div>";
  header('location: ../public/index.php');
  exit();
}

#VERIFICA SE OS DADOS DE LOCALIDADE ESTÃO VAZIOS
if (empty($cep) or empty($cidade) or empty($estado) or empty($rua) or empty($bairro) or empty($numero)) {
  $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
  Cep, Cidade, Estado, Rua, Bairro e Numero não podem estar vazios.
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
if ($associadadosUsuarioCAD['total'] == 1) {
  $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
    Usuário já cadastrado, por favor tente novamente.
  </div>";
  header('location: ../public/index.php');
  exit();
}

#VERIFICA SE JÁ EXISTE UM USUÁRIO CADASTRADO
if ($associadadosUsuarioACESS['total'] == 1) {
  $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
    Usuário já cadastrado, por favor tente novamente.
  </div>";
  header('location: ../public/index.php');
  exit();
}

#COMANDO PARA CADASTRO DE USUÁRIO
$comandoCad = "INSERT INTO users (nome, telefone, cep, cidade, estado, rua, bairro, numero, email, senha, data_cad ) VALUES 
('$nome', '$telefone', '$cep', '$cidade', '$estado', '$rua', '$bairro', '$numero','$email', '$senha', NOW());";

#COMANDO PARA CADASTRO DE ACESSO PADRÃO
$comandoAcesso = "INSERT INTO acesso (identificacao, lastmodificacao) VALUES ('$email', NOW())";

#CADASTRA O USUARIO
$executaCad = mysqli_query($conexao, $comandoCad);

if (mysqli_insert_id($conexao)) {
  #CRIA OS ACESSOS
  $executaAcesso = mysqli_query($conexao, $comandoAcesso);
  $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
    Usuário cadastrado com sucesso! Faça login para continuar.
  </div>";
  echo "Cadastrado com sucesso";
  header('location: ../public/index.php');
  exit();
} else {
  $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
  Falha ao cadastrar usuário.
</div>";
  echo "Falha";
  header('location: ../public/index.php');
  exit();
}

#ENCERRA CONEXAO
mysqli_close($conexao);
