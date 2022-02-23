<?php
#INSERE O ARQUIVO HEADER
include "../template/geral.php";
#VERIFICA SE O USUÁRIO ESTÁ LOGADO
verificaLogin();
#INCLUI O ARQUIVO CONEXAO
include "../process/conexao.php";
// verificaAtivo($conexao, 10);
?>
<title>Carrinho de Compras</title>

<body>
    <?php
    include_once "../template/navbar.php";
    #EXIBE MENSAGEM AS MENSAGENS
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <div>
        <div id="ui-view" data-select2-id="ui-view">
            <div>
                <div class="card">
                    <div class="card-header">Fatura:
                        <strong>
                            <?php echo $nomeSite ?>
                        </strong>
                        <a class="btn btn-sm btn-secondary float-right mr-1 d-print-none" href="#" onclick="javascript:window.print();" data-abc="true">
                            <i class="fa fa-print"></i> Imprimir
                        </a>
                        <a class="btn btn-sm btn-info float-right mr-1 d-print-none" href="#" data-abc="true">
                            <i class="fa fa-save"></i> Save
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-4">
                                <h6 class="mb-3">Vendedor: <?php echo $nomeVendedor ?></h6>
                                <div>
                                    <strong><?php echo $nomeSite ?></strong>
                                </div>
                                <div><?php echo $cidadeVendedor ?></div>
                                <div>Email: <?php echo $emailVendedor ?></div>
                                <div>Celular: <?php echo $celularVendedor ?></div>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="mb-3">To:</h6>
                                <div>
                                    <strong>BBBootstrap.com</strong>
                                </div>
                                <div>42, Awesome Enclave</div>
                                <div>New York City, New york, 10394</div>
                                <div>Email: admin@bbbootstrap.com</div>
                                <div>Phone: +48 123 456 789</div>
                            </div>
                            <div class="col-sm-4">
                                <h6 class="mb-3">Details:</h6>
                                <div>Invoice
                                    <strong>#BBB-10010110101938</strong>
                                </div>
                                <div><?php echo $diaAtual ?></div>
                                <div>VAT: NYC09090390</div>
                                <div>Nome da Conta: <?php echo $nomeUsuarioLogado ?></div>
                                <div>
                                    <strong>SWIFT code: 99 8888 7777 6666 5555</strong>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive-sm">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">#</th>
                                        <th>Item</th>
                                        <th class="center">Quantidade</th>
                                        <th class="right">Preço Unitário</th>
                                        <th class="right">Total</th>
                                        <th class="right">Adicionar/Remover</th>
                                    </tr>
                                </thead>
                                <?php
                                #VERIFICANDO SE O CODIGO DO PRODUTO NÃO ESTÁ VAZIO
                                if (!empty($_GET['id'])) {
                                    #DEFINE QUE O ID VAI SER O NUMERO ENVIADO PELA URL
                                    $cod_produto = $_GET['id'];
                                } else {
                                    if (!empty($_SESSION['carrinho'])) {
                                        #SE EXISTIR O ARRAY CARRINHO MAS NÃO TER O ID RODA UM FOREACH CRIANDO O ID
                                        foreach ($_SESSION['carrinho'] as $id => $qtd) {
                                            $cod_produto = $id;
                                        }
                                    }
                                }
                                #SE O MEU ID FOR DIFERENTE DE
                                if (!empty($_GET['id'])) {

                                    #SE NÃO EXISTIR A SESSION CARRINHO CRIA A SESSÃO
                                    if (!isset($_SESSION['carrinho'])) {
                                        $_SESSION['carrinho'] = array();
                                    }

                                    #SE A VARIAVEL $cod_produto NÃO ESTIVER SETADA (PREENCHIDA)
                                    if (!isset($_SESSION['carrinho'][$cod_produto])) {
                                        #SERÁ ADICIONADO UM PRODUTO AO CARRINHO
                                        $_SESSION['carrinho'][$cod_produto] = 1;
                                    } else {
                                        if (isset($_GET['addremove'])) {
                                            $addremove = $_GET['addremove'];
                                            #CASO CONTRARIO E ELA ESTIVER SETADA ADICIONA NOVOS PRODUTOS
                                            if ($addremove == 1) {
                                                $_SESSION['carrinho'][$cod_produto] += 1;
                                            } else {
                                                $_SESSION['carrinho'][$cod_produto] -= 1;
                                            }
                                        }
                                    }
                                    $qtdTotal = null; // VARIAVEL DE QUANTIDADE TOTAL QUE RECEBE O VALOR NULO
                                    $total = null; //VARIAVEL TOTAL QUE RECEBE O VALOR NULO
                                    foreach ($_SESSION['carrinho'] as $id => $qtd) {
                                        $comandoUltimosRegistros = "SELECT * FROM produtos WHERE idprodutos = $id";
                                        $executaRegistros = mysqli_query($conexao, $comandoUltimosRegistros);
                                        $prodAssoc = mysqli_fetch_assoc($executaRegistros);
                                        #NOME DO PRODUTO
                                        $nomeProduto = $prodAssoc['nome'];
                                        #VARIAVEL DE VALOR UNITARIO FORMATADA
                                        $valorUnitario = number_format($prodAssoc['valor'] / 100, 2, ",", ".");
                                        #PEGA O VALOR TOTAL DA CONTA
                                        $total += $prodAssoc['valor'] * $qtd / 100;
                                        #TOTAL DA CONTA FORMATADO
                                        $totalConta = number_format($total, 2, ",", ".");
                                        #TOTAL DO PRODUTO INDIVIDUAL
                                        $totalIndividual = $prodAssoc['valor'] * $qtd / 100;
                                        #tTOTAL DO PRODUTO INDIVIDUAL FORMATADO
                                        $totalIndividual = number_format($totalIndividual, 2, ",", ".");
                                        $qtdTotal += $qtd;
                                        include "tabelacar.php";
                                    }
                                    #MOSTRA O CARRINHO DE COMPRAS VAZIO
                                }  ?>
                            </table>
                        </div>
                        <?php if (!empty($_SESSION['carrinho'])) { ?>
                            <div class="p-3 row">
                                <div class="col-lg-4 col-sm-5">TEXTO DE COMPRA #EDITAR</div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong>Quantidade: </strong>
                                                </td>
                                                <td class="right"><?php echo $qtdTotal ?></td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Total</strong>
                                                </td>
                                                <td class="right">
                                                    <strong>R$: <?php echo $totalConta ?></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <a class="btn btn-success" href="#" data-abc="true">
                                        <i class="fa fa-usd"></i>Continuar com Pagamento</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <?php include "../template/footer.php" ?>
</body>

</html>