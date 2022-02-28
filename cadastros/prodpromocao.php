<?php
#INSERE O ARQUIVO HEADER
include "../template/geral.php";
#VERIFICA SE O USUÁRIO POSSUI ACESSO
verificaAcesso();
#INCLUI OS ARQUIVOS MODAIS
include "../template/modal.php";
#INCLUI O ARQUIVO DE CONEXAO
include "../process/conexao.php";
?>
<title>Dashboard</title>

<body>
    <!-- Navbar-->
    <?php
    include_once "../template/navbar.php";
    ?>
    <!--DIV DO CONTEUDO PRINCIPAL DO DASHBOARD-->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!--MENU LATERAL ADM-->
        <?php include "../template/adm_dash.php" ?>
        <!-- CONTEUDO PRINCIPAL -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- TITULO DA ABA ATUAL DO DASHBOARD -->
                                <h1 class="h2 mb-0 ls-tight">Cadastro de Produtos</h1>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs overflow-x border-0">
                            <li class="nav-item ">
                                <a href="../cadastros/cad_produto.php" class="nav-link font-regular">Principal</a>
                            </li>
                            <li class="nav-item">
                                <a href="../cadastros/prodpromocao.php" class="nav-link active">Produtos em Desconto</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!--Main-->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!--CONTEUDO PRINCIPAL-->
                    <!--EXIBE MENSAGEM AS MENSAGENS-->
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <div class="card shadow border-0 mb-7">
                        <div class="table-responsive">
                            <?php
                            $comandoUltimosRegistros = "SELECT * FROM produtos WHERE promo_ini >= '$diaInputAtual', promo_fim >= '$diaInputAtual' AND valor_desconto > 1 ORDER BY idprodutos DESC";
                            $executaRegistros = mysqli_query($conexao, $comandoUltimosRegistros);
                            $numRows = mysqli_num_rows($executaRegistros);

                            if ($numRows == 0) {
                                echo "<div class='alert alert-primary' role='alert'>
                                    Nenhuma promoção foi iniciada.
                                </div>";
                            } else {
                            ?>
                                <table class="table table-hover table-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="d-none d-md-table-cell" scope="col">Id</th>
                                            <th scope="col">Nome</th>
                                            <th class="d-none d-md-table-cell" scope="col">Valor</th>
                                            <th class="d-none d-md-table-cell" scope="col">Valor do Desconto</th>
                                            <th class="d-none d-md-table-cell" scope="col">% De desconto</th>
                                            <th class="d-none d-md-table-cell" scope="col">Valor final</th>
                                            <th class="d-none d-md-table-cell" scope="col">Estoque</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    while ($ultimosRegistros = mysqli_fetch_assoc($executaRegistros)) {
                                        $valorDesconto = ($ultimosRegistros['valor_desconto'] / 100);
                                        $valorInicial = ($ultimosRegistros['valor'] / 100);
                                        $porcentagem = $valorDesconto / $valorInicial * 100;
                                    ?>
                                        <tbody>
                                            <tr>
                                                <th class="d-none d-md-table-cell" scope="row"><?php echo $ultimosRegistros['idprodutos'] ?></th>
                                                <th scope="row"><?php echo $ultimosRegistros['nome'] ?></th>
                                                <td class="d-none d-md-table-cell"><?php echo  number_format($ultimosRegistros['valor'] / 100, 2, ',', '.') ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo  number_format($ultimosRegistros['valor_desconto'] / 100, 2, ',', '.') ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo ceil($porcentagem) . "%" ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo  number_format(($ultimosRegistros['valor'] - $ultimosRegistros['valor_desconto']) / 100, 2, ',', '.') ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo $ultimosRegistros['estoque'] ?></td>
                                                <td>
                                                    <!-- BOTÃO DE VISUALIZAR PRODUTO -->
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_editar<?php echo $ultimosRegistros['idprodutos'] ?>">
                                                        <i class="fa-solid fa-eye btn-primary p-2 rounded"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!-- MODAL DE APAGAR -->
                                        <div class="modal fade" id="modal_apagar<?php echo $ultimosRegistros['idprodutos'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollablea">
                                                <div class="modal-content">
                                                    <div class="modal-header text-light apagarModal">
                                                        <h5 class="modal-title" id="exampleModalLabel">Apagar: <?php echo $ultimosRegistros['nome'] ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Você tem certeza que deseja apagar <b><?php echo $ultimosRegistros['nome'] ?></b>? Todos os dados vinculados a esse produto serão apagados.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                        <a class="btn btn-danger" href="../process/apagar_prod.php?id=<?php echo $ultimosRegistros['idprodutos'] ?>">Apagar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- MODAL DE VISUALIZAR -->
                                        <div class="modal fade" id="modal_editar<?php echo $ultimosRegistros['idprodutos'] ?>" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header text-light apagarModal">
                                                        <h5 class="modal-title" id="exampleModalLabel">Informações de Desconto: <?php echo $ultimosRegistros['nome'] ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body row g-3">
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Preço Original</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                R$: <?php echo number_format($ultimosRegistros['valor'] / 100, 2, ",", ".") ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Valor do desconto</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                R$: <?php echo number_format($ultimosRegistros['valor_desconto'] / 100, 2, ",", ".") ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Inicio do desconto</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo date("d/m/Y", strtotime($ultimosRegistros['promo_ini'])) ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Esse desconto se encerra no dia</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo date("d/m/Y", strtotime($ultimosRegistros['promo_fim'])) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>