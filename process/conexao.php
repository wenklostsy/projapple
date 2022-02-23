<?php 

$USUARIO = "root";
$SENHA = "";
$DB = "apple";
$HOST = "localhost";

$conexao = mysqli_connect($HOST, $USUARIO,$SENHA,$DB);
mysqli_character_set_name($conexao);

#TESTE DE CONEXAO
// if ($conexao) {
//     echo "Conectado com sucesso.";
// } else {
//     echo "Falha ao conectar";
// }



