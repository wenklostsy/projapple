<?php
session_start();
include "../../process/conexao.php";

$id = $_GET['id'];

$comandoApagar = "DELETE FROM perguntas WHERE idperguntas=$id";
$executaComando = mysqli_query($conexao, $comandoApagar);
$linhasAfetadas = mysqli_affected_rows($conexao);

$apagarComentarios = "DELETE FROM comentarios WHERE idpergunta = $id";

if ($linhasAfetadas == 1) {
  $executaComentario = mysqli_query($conexao, $apagarComentarios);
  $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
      Pergunta apagada com sucesso.
    </div>";
  header('location: ../../adm/usuarios.php');
  exit();
} else {
  $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
      Falha ao apagar produto
    </div>";
  header('location: ../../adm/usuarios.php');
  exit();
}

mysqli_close($conexao);
