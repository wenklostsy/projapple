<?php
session_start();
include "../process/conexao.php";

#DEFINE QUE TIPO DE RELATÓRIO SERÁ EMITIDO
$tabela = $_POST['relatorio'];
#DEFINE A DATA DE INICIO
$datainicio = $_POST['dataini'];
#DEFINE A DATA DE FIM
$dataFim = $_POST['datafim'];

$nome = $_SESSION['logado'][0];

if ($tabela == "entradas") {
    $titulo = "Relatório de Despesas";
}

$comando = "SELECT * FROM $tabela WHERE data_entrada between '$datainicio' and '$dataFim'";
$executaRelatorio = mysqli_query($conexao, $comando);

$comandoTotal = "SELECT SUM(valor_gasto) as total  FROM $tabela WHERE data_entrada between '$datainicio' and '$dataFim'";
$executaTotal = mysqli_query($conexao, $comandoTotal);
$assoc = mysqli_fetch_assoc($executaTotal);
$total = number_format($assoc['total']/100,2,",",".");

$comandoQuantidade = "SELECT SUM(quantidade) as total  FROM $tabela WHERE data_entrada between '$datainicio' and '$dataFim'";
$executaQuantidade = mysqli_query($conexao, $comandoQuantidade);
$assocQtd = mysqli_fetch_assoc($executaQuantidade);


$ini = date("d/m/Y", strtotime($datainicio));
$fim = date("d/m/Y", strtotime($dataFim));
$agora = date("H:m:s");

use Dompdf\Dompdf;

require_once '../dompdf/autoload.inc.php';
include 'rel-despesas.php';

//$relatorio = file_get_contents('despesas.php');

$pdf = new Dompdf();

#DEFINE O TAMANHO DO PAPEL E ORIENTAÇÃO DA PAGINA portrait ou landscape
$pdf->setPaper('A4', 'landscape');
#CARREGA O CONTEUDO
$pdf->loadHtml($relatorio);
#RENDERIZA O PDF
$pdf->render();
#NOMEAR O PDF GERADO;
$pdf->stream(
    "Relatório - $agora",
    array(
        "Attachment" => false //FALSE APENAS VISUALIZAR
    )
);
