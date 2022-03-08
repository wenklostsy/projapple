<?php
session_start();
include "../process/conexao.php";

$nomeFornecedor = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$cnpj = trim(filter_input(INPUT_POST, 'cnpj', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$cep = trim(filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$cidade = trim(filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$estado = trim(filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$rua = trim(filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$bairro = trim(filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$numero = trim(filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT));
$complemento = trim(filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$telefone = trim(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_FLOAT));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
$obs = trim(filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

if (empty($complemento) OR empty($obs)) {
    $complemento = "Não informado.";
    $obs = "Nenhuma observação";
}

#VERIFICA SE O NOME, CNPJ TELEFONE OU O EMAIL ESTÃO VAZIOS
if (empty($nomeFornecedor) or empty($cnpj) or empty($telefone) or empty($email)) {
    $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
    Nome, CNPJ, telefone e email não podem estar vazios.
    </div>";
    header('location: fornecedores.php');
    exit();
}

#VERIFICA SE OS DADOS DE LOCALIDADE ESTÃO VAZIOS
if (empty($cep) or empty($cidade) or empty($estado) or empty($rua) or empty($bairro) or empty($numero)) {
    $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
    Cep, Cidade, Estado, Rua, Bairro e Numero não podem estar vazios.
    </div>";
    header('location: fornecedores.php');
    exit();
}


$comandoFornecedor = "INSERT INTO fornecedores
(nome, cnpj, cep, cidade, estado, rua, bairro, numero, complemento, fone, email, obs, data_cad) VALUES 
('$nomeFornecedor', '$cnpj', '$cep', '$cidade', '$estado', '$rua', '$bairro', '$numero', '$complemento',
 '$telefone', '$email', '$obs', NOW())";

$executaFornecedor = mysqli_query($conexao, $comandoFornecedor);

if (mysqli_insert_id($conexao)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
    <b>$nomeFornecedor</b> Cadastrado com sucesso.
    </div>";
    header('location: fornecedores.php');
    exit();
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
    Falha ao cadastrar fornecedor.
    </div>";
    header('location: fornecedores.php');
    exit();
}

mysqli_close($conexao);
