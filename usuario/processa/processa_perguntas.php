<?php
session_start();
include "../../process/conexao.php";

#VARIAVEIS DE CADASTRO
$titulo = trim(filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$descricao = trim(filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$tag = trim(filter_input(INPUT_POST, 'tag', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$usuario = $_SESSION['logado'][0];
$id = $_GET['id'];

if (isset($id)) {
  if (empty($titulo) or empty($descricao)) {
    $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
      Preencha todos os campos!
    </div>";
    header('location: ../../adm/usuarios.php');
    exit();
  } else {
    $comandoResposta = "UPDATE perguntas SET titulo = '$titulo', tag= '$tag', status='1', resposta='$descricao'
   WHERE idperguntas='$id'";

    $executaResposta = mysqli_query($conexao, $comandoResposta);
    $linhasAfetadas = mysqli_affected_rows($conexao);

    if ($linhasAfetadas == 1) {
      $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
          Resposta enviada com sucesso!
        </div>";
      header('location: ../../adm/usuarios.php');
      exit();
    } else {
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
        Falha ao responder a pergunta.
      </div>";
      header('location: ../../adm/usuarios.php');
      exit();
    }
  }
}else {
  #VERIFICAÇÃO DE ALGUMA VARIAVEL VAZIA
  if (empty($titulo)) {
    $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
    Preencha todos os campos!
  </div>";
    header('location: ../perguntas.php');
    exit();
  } else {
    $comandoCad = "INSERT INTO perguntas (titulo, descricao, usuario, data_cad) VALUES 
    ('$titulo', '$descricao', '$usuario', NOW())";

    $executaComando = mysqli_query($conexao, $comandoCad);

    if (mysqli_insert_id($conexao)) {
      $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
          Pergunta enviada com sucesso! Aguarde a aprovação de um administrador.
        </div>";
      header('location: ../perguntas.php');
      exit();
    } else {
      $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
        Falha ao enviar pergunta.
      </div>";
      header('location: ../perguntas.php');
      exit();
    }
  }
}

mysqli_close($conexao);