<?php 

$html = '<table border=1';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<td>Nome</td>';
$html .= '<td>Quantidade</td>';
$html .= '<td>Nota Fiscal</td>';
$html .= '<td>Fornecedor</td>';
$html .= '<td>Total Gasto</td>';
$html .= '<td>Valor Unitário</td>';
$html .= '<td>Data de Entrada</td>';
$html .= '</tr>';
$html .= '</thead>';

while ($dados = mysqli_fetch_assoc($executaRelatorio)) {
    $html .= '<tbody>';
    $html .= '<tr><td>'.$dados['nome']."</td>";
    $html .= '<td>'.$dados['quantidade']."</td>";
    $html .= '<td>'.$dados['notafiscal']."</td>";
    $html .= '<td>'.$dados['fornecedor']."</td>";
    $html .= '<td>'. number_format($dados['valor_gasto']/100,2,",",".")."</td>";
    $html .= '<td>'. number_format(($dados['valor_gasto']/$dados['quantidade'])/100,2,",",".")."</td>";
    $html .= '<td>'. date("d/m/Y", strtotime($dados['data_entrada']))."</td></tr>";
    $html .= '</tbody>';
}

$html .= '</table>';

$relatorio = "<html xml:lang='en' xmlns='http://www.w3.org/1999/xhtml' lang='pt-br'>

<head>
    <meta http-equiv='content-type' content='text/html; charset=UTF-8' />
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js'></script>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
    <title>Relatório de Despesas - $ini-$fim</title>
    <style type='text/css'>
        @page {
            margin: 2cm;
        }
        body {
            font-family: sans-serif;
            margin: 0.5cm 0;
            text-align: justify;
        }
        #header,
        #footer {
            position: fixed;
            left: 0;
            right: 0;
            color: #aaa;
            font-size: 0.9em;
        }
        #header {
            top: 0;
            border-bottom: 0.1pt solid #aaa;
        }

        #footer {
            bottom: 0;
            border-top: 0.1pt solid #aaa;
        }
        #header table,
        #footer table {
            width: 100%;
            border-collapse: collapse;
            border: none;
        }
        #header td,
        #footer td {
            padding: 0;
            width: 50%;
        }
        .page-number {
            text-align: center;
        }
        .page-number:before {
            content: 'Pagina '  counter(page);
        }
        hr {
            page-break-after: always;
            border: 0;
        }
        #CSS TABELAS
        table {
            width: 100%;
        }
        th {
            height: 25px;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div id='header'>
        <table>
            <tr>
                <td>Relatório Gerado por $nome</td>
                <td style='text-align: right;'>DashTech,The future starts now</td>
            </tr>
        </table>
    </div>
    <div id='footer'>
        <div class='page-number'></div>
    </div>

    <h4>$titulo ($ini - $fim)</h4>
    $html

    <p>
        Total Gasto R$: $total <br>
        Quantidade de itens: $assocQtd[total]<br>
    </p>
    
</body>

</html>
";

$nomeRelatorio = "Relatório de Despesas - $ini - $fim.pdf";