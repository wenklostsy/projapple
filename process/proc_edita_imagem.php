<?php
session_start();
include "../process/conexao.php";
$id = $_GET['id'];
#VERIFICA SE EXISTE A ID

#COMANDO DA TABELA DE PRODUTO
$selecionaPrincipalComando = "SELECT principal, img2, img3 FROM produtos WHERE idprodutos = $id";
#EXECUTA A QUERY
$PrincipalGeral = mysqli_query($conexao, $selecionaPrincipalComando);
#EXECUTA A QUERY
$Principal = mysqli_fetch_assoc($PrincipalGeral);
#VERIFICA A QUANTIDADE DE LINHAS QUE POSSUI
$numlinhasPrincipal = mysqli_num_rows($PrincipalGeral);
$principal = $_FILES['principal']['name'];
$formatosAceitos = array("png", "jpeg", "jpg");
$pasta = "../arquivos/fotos_produtos/";
$nomeBanco = $Principal['principal'];

echo $nomeBanco;

#VERIFICAÇÃO DE UPLOAD DO ARQUIVO PRINCIPAL
if (isset($_POST['acaoprincipal'])) {
    #RECEBE O NOME DO ARQUIVO
    $arquivoPrincipal = $_FILES['principal'];
    #RETIRA A EXTENSÃO DO ARQUIVO COM O PATHINFO NA CHAVE "NAME"
    $extensao = pathinfo($arquivoPrincipal['name'], PATHINFO_EXTENSION);
    #VERIFICA SE NA EXTENSÃO ENVIADA CONTEM ALGUMA DAS EXTENSÕES PERTMITIDAS NO ARRAY
    if (in_array($extensao, $formatosAceitos)) {
        #DEFINE O NOME TEMPORARIO
        $temporario = $_FILES['principal']['tmp_name'];
        #DEFINE UM NOVO NOME PARA O ARQUIVO COM UM ID UNICO
        $novoNome = $nomeBanco;
    }
    if (move_uploaded_file($temporario, $pasta . $novoNome)) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
        Imagem principal alterada com sucesso.
      </div>";
        header("location: ../adm/edita_prod.php?id=$id");
        exit();
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
            Formato do arquivo principal incompativel.
          </div>";
        header("location: ../adm/edita_prod.php?id=$id");
        die();
    }
}

#VERIFICAÇÃO DE UPLOAD DO SECUNDARIO
if (isset($_POST['segundacao'])) {
    #RECEBE O NOME DO ARQUIVO
    $arquivoDois = $_FILES['dois'];
    #RETIRA A EXTENSÃO DO ARQUIVO COM O PATHINFO NA CHAVE "NAME"
    $extensao = pathinfo($arquivoDois['name'], PATHINFO_EXTENSION);
    #VERIFICA SE NA EXTENSÃO ENVIADA CONTEM ALGUMA DAS EXTENSÕES PERTMITIDAS NO ARRAY
    if (in_array($extensao, $formatosAceitos)) {
        #DEFINE O NOME TEMPORARIO
        $temporario = $_FILES['dois']['tmp_name'];
        #DEFINE UM NOVO NOME PARA O ARQUIVO COM UM ID UNICO
        $novoNome = "Ft_produto_dois_".uniqid().".$extensao";
    }
    $comandoDois = "UPDATE produtos SET img2 = '$novoNome' WHERE idprodutos = $id";
    mysqli_query($conexao,$comandoDois);
    if (move_uploaded_file($temporario, $pasta . $novoNome)) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
        Arquivo dois alterado com sucesso.
      </div>";
        header("location: ../adm/edita_prod.php?id=$id");
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
            Formato do arquivo principal incompativel.
          </div>";
        header("location: ../adm/edita_prod.php?id=$id");
        die();
    }
}

#VERIFICAÇÃO DE UPLOAD DO TERCEIRO ARQUIVO
if (isset($_POST['terceiraacao'])) {
    #RECEBE O NOME DO ARQUIVO
    $arquivotres = $_FILES['tres'];
    #RETIRA A EXTENSÃO DO ARQUIVO COM O PATHINFO NA CHAVE "NAME"
    $extensao = pathinfo($arquivotres['name'], PATHINFO_EXTENSION);
    #VERIFICA SE NA EXTENSÃO ENVIADA CONTEM ALGUMA DAS EXTENSÕES PERTMITIDAS NO ARRAY
    if (in_array($extensao, $formatosAceitos)) {
        #DEFINE O NOME TEMPORARIO
        $temporario = $_FILES['tres']['tmp_name'];
        #DEFINE UM NOVO NOME PARA O ARQUIVO COM UM ID UNICO
        $novoNome = "Ft_produto_tres_".uniqid().".$extensao";
    }
    $comandotres = "UPDATE produtos SET img3 = '$novoNome' WHERE idprodutos = $id";
    mysqli_query($conexao,$comandotres);
    if (move_uploaded_file($temporario, $pasta . $novoNome)) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
        Arquivo três alterado com sucesso.
      </div>";
        header("location: ../adm/edita_prod.php?id=$id");
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
            Formato do arquivo principal incompativel.
          </div>";
        header("location: ../adm/edita_prod.php?id=$id");
        die();
    }
}

mysqli_close($conexao);