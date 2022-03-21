<?php
session_start();
include "../process/conexao.php";
@$secundaria = $_GET['secundaria'];
@$terceira = $_GET['terceira'];
#VERIFICA SE EXISTE A ID

if (isset($secundaria)) {
    $comando = "SELECT img2 FROM produtos WHERE idprodutos = $secundaria";
    $executaComando = mysqli_query($conexao, $comando);
    #ASSOCIA OS DADOS DO BANCO DE DADOS NA VARIAVEL $associaDados
    $associaDados = mysqli_fetch_assoc($executaComando);

    $apagaBanco = "UPDATE produtos SET img2=NULL WHERE idprodutos= $secundaria";
    #DEFINE UM NOVO NOME PARA O ARQUIVO COM UM ID UNICO
    $nomeBanco = $associaDados['img2'];
    #APAGA FOTO ANTIGA QUE JA CONTEM NO BANCO
    $apagarFotoAntigaComando = unlink('../arquivos/fotos_produtos/' . $nomeBanco);

    if ($apagarFotoAntigaComando) {
        $apagaDadosBanco = mysqli_query($conexao, $apagaBanco);
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
            Imagem secundaria apagada com sucesso.
        </div>";
        header("location: ../adm/edita_prod.php?id=$secundaria");
        exit();
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
            Falha ao apagar imagem secundaria.
        </div>";
        header("location: ../adm/edita_prod.php?id=$secundaria");
        exit();
    }
} elseif (isset($terceira)) {
    $comando = "SELECT img3 FROM produtos WHERE idprodutos = $terceira";
    $executaComando = mysqli_query($conexao, $comando);
    #ASSOCIA OS DADOS DO BANCO DE DADOS NA VARIAVEL $associaDados
    $associaDados = mysqli_fetch_assoc($executaComando);
    
    $apagaBanco = "UPDATE produtos SET img3=NULL WHERE idprodutos= $terceira";
    #DEFINE UM NOVO NOME PARA O ARQUIVO COM UM ID UNICO
    $nomeBanco = $associaDados['img3'];
    #APAGA FOTO ANTIGA QUE JA CONTEM NO BANCO
    $apagarFotoAntigaComando = unlink('../arquivos/fotos_produtos/' . $nomeBanco);

    if ($apagarFotoAntigaComando) {
        $apagaDadosBanco = mysqli_query($conexao, $apagaBanco);
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
            Terceira imagem apagada com sucesso.
        </div>";
        header("location: ../adm/edita_prod.php?id=$terceira");
        exit();
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
            Falha ao apagar terceira imagem.
        </div>";
        header("location: ../adm/edita_prod.php?id=$terceira");
        exit();
    }

}
mysqli_close($conexao);
