<?php
session_start();
include "../../process/conexao.php";

#VARIAVEIS DE CADASTRO
$comentario = trim(filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
$usuario = $_SESSION['logado'][0];
$id = $_GET['id'];

if (!isset($id) or empty($id)) {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
      OPERAÇÃO INVALIDA
    </div>";
    header('location: ../../public/perguntas-post.php');
    exit();
}

if (empty($comentario)) {
    $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
      Preencha o campo de comentário.
    </div>";
    header("location: ../../public/perguntas-post.php?id=$id");
    exit();
}

$comandoComentario = "INSERT INTO comentarios (idpergunta, comentario, usuario, data_comentario)
VALUES ('$id', '$comentario', '$usuario', NOW())";

$executaComando = mysqli_query($conexao, $comandoComentario);

if (mysqli_insert_id($conexao)) {
    header("location: ../../public/perguntas-post.php?id=$id");
    exit();
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
        Falha ao enviar comentário.
      </div>";
    header("location: ../../public/perguntas-post.php?id=$id");
    exit();
}

mysqli_close($conexao);
