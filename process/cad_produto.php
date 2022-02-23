<?php
session_start();
include "../process/conexao.php";

$nomeProduto = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$ativo = filter_input(INPUT_POST, 'ativo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$especificacao = filter_input(INPUT_POST, 'especificacao', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_FLOAT);
$principal = $_FILES['principal']['name'];
$formatosAceitos = array("png", "jpeg", "jpg");
$pasta = "../arquivos/fotos_produtos/";

#VERIFICA SE ALGUMA VARIAVEL ESTA VAZIA
if (
    empty($nomeProduto) or empty($categoria) or empty($ativo) or empty($descricao) or empty($especificacao) or
    empty($estoque) or empty($principal) or empty($valor)
) {
    $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
      Preencha todos os campos!
    </div>";
    header('location: ../cadastros/cad_produto.php');
    exit();
}

#VERIFICAÇÃO DE UPLOAD DO ARQUIVO PRINCIPAL
if (isset($_POST['acao'])) {
    #RECEBE O NOME DO ARQUIVO
    $arquivoPrincipal = $_FILES['principal'];
    #RETIRA A EXTENSÃO DO ARQUIVO COM O PATHINFO NA CHAVE "NAME"
    $extensao = pathinfo($arquivoPrincipal['name'], PATHINFO_EXTENSION);
    #VERIFICA SE NA EXTENSÃO ENVIADA CONTEM ALGUMA DAS EXTENSÕES PERTMITIDAS NO ARRAY
    if (in_array($extensao, $formatosAceitos)) {
        #DEFINE O NOME TEMPORARIO
        $temporario = $_FILES['principal']['tmp_name'];
        #DEFINE UM NOVO NOME PARA O ARQUIVO COM UM ID UNICO
        $novoNome = "Ft_produto_" . uniqid() . ".$extensao";
    }
}

#VERIFICAÇÃO DE UPLOAD DO ARQUIVO DOIS
if (isset($_FILES['img_dois']['name'])) {
    $arquivoImg_dois = $_FILES['img_dois'];
    $extensaoDois = pathinfo($arquivoImg_dois['name'], PATHINFO_EXTENSION);

    if (in_array($extensaoDois, $formatosAceitos)) {
        $temporarioDois = $_FILES['img_dois']['tmp_name'];
        $nomeDois = "Ft_produto_dois_" . uniqid() . ".$extensaoDois";
    }
}

#VERIFICAÇÃO DE UPLOAD DO ARQUIVO TRÊS
if (isset($_FILES['img_tres']['name'])) {
    $arquivoImg_tres = $_FILES['img_tres'];
    $extensaotres = pathinfo($arquivoImg_tres['name'], PATHINFO_EXTENSION);

    if (in_array($extensaotres, $formatosAceitos)) {
        $temporariotres = $_FILES['img_tres']['tmp_name'];
        $novoNometres = "Ft_produto_tres_" . uniqid() . ".$extensaotres";
    }
}

$comandoProduto = "INSERT INTO produtos
(nome, categoria, ativo, descricao, especificacao, estoque, valor, principal, img2, img3, data_cad) VALUES 
('$nomeProduto', '$categoria', '$ativo', '$descricao', '$especificacao', '$estoque', '$valor', '$novoNome', '$nomeDois',
 '$novoNometres', NOW())";

$executaProduto = mysqli_query($conexao, $comandoProduto);

if (mysqli_insert_id($conexao)) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
    Produto cadastrado com sucesso.
  </div>";
    #MOVE OS ARQUIVOS PARA A PASTA
    if (move_uploaded_file($temporario, $pasta . $novoNome)) {
    } else {
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
            Formato do arquivo principal incompativel.
          </div>";
        header('location: ../cadastros/cad_produto.php');
        die();
    }
    #MOVE O ARQUIVO DOIS PARA A PASTA
    if (isset($nomeDois)) {
        move_uploaded_file($temporarioDois, $pasta . $nomeDois);
    } else {
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
          Formato do arquivo dois incompativel.
        </div>";
        header('location: ../cadastros/cad_produto.php');
        die();
    }
    #MOVE O ARQUIVO TRÊS PARA A PASTA
    if (isset($novoNometres)) {
        move_uploaded_file($temporariotres, $pasta . $novoNometres);
    } else {
        $_SESSION['msg'] = "<div class='alert alert-warning' role='alert'>
            Formato do arquivo três incompativel.
        </div>";
        header('location: ../cadastros/cad_produto.php');
        die();
    }
    header('location: ../cadastros/cad_produto.php');
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
    Falha ao cadastrar produto.
  </div>";
    header('location: ../cadastros/cad_produto.php');
    die();
}

mysqli_close($conexao);
