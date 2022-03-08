<?php
#INSERE O ARQUIVO HEADER
include "../template/geral.php";
#VERIFICA SE O USUÁRIO POSSUI ACESSO
verificaAcesso();
#INCLUI OS ARQUIVOS MODAIS
include "../template/modal.php";

#CRIA O COMANDO DE PAGINAÇÃO PARA A FUNÇÃO SER REALIZADA COM A TABELA ESPECIFICA
$comandoPaginacao = "SELECT * FROM fornecedores ORDER BY idfornecedores DESC";
#SELECIONA A QUANTIDADE DE REGISTROS A SEREM EXIBIDOS
$totalDePaginas = 10;
#INCLUI A PAGINAÇÃO
include "../template/paginacao.php";
?>
<title>Lista de Fornecedores</title>

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
                                <h1 class="h2 mb-0 ls-tight">Entrada de Material</h1>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs overflow-x border-0">
                            <li class="nav-item ">
                                <a href="fornecedores.php" class="nav-link">Cadastro de Fornecedores</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular active">Lista de Fornecedores</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- CONTEUDO PRINCIPAL -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
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
                            $comandoFornecedor = "SELECT * FROM fornecedores ORDER BY idfornecedores DESC";
                            $executaFornecedor = mysqli_query($conexao, $comandoFornecedor);
                            $numRows = mysqli_num_rows($executaFornecedor);

                            if ($numRows == 0) {
                                echo "<div class='alert alert-primary' role='alert'>
                                    Nenhum fornecedor cadastrado.
                                </div>";
                            } else {
                            ?>
                                <table class="table table-hover table-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="col" scope="col">Nome do Fornecedor</th>
                                            <th class="d-none d-md-table-cell" scope="row">Cidade</th>
                                            <th class="d-none d-md-table-cell" scope="col">Telefone</th>
                                            <th class="d-none d-md-table-cell" scope="col">Email</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    while ($fornecedores = mysqli_fetch_assoc($limite)) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <th class="col" scope="row"><?php echo $fornecedores['nome'] ?></th>
                                                <th class="d-none d-md-table-cell" scope="row"><?php echo $fornecedores['cidade'] ?></th>
                                                <td class="d-none d-md-table-cell"><?php echo $fornecedores['fone'] ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo $fornecedores['email'] ?></td>
                                                <td>
                                                    <!-- BOTÃO DE VISUALIZAR FORNECEDOR -->
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_editar<?php echo $fornecedores['idfornecedores'] ?>">
                                                        <i class="fa-solid fa-eye btn-info p-2 rounded"></i>
                                                    </a>
                                                    <!-- BOTÃO DE EDITAR FORNECEDOR -->
                                                    <a type="button" data-bs-toggle="modal" href="../adm/edita_prod.php?id=<?php echo $fornecedores['idfornecedores'] ?>">
                                                        <i class=" fas fa-edit btn-primary p-2 rounded"></i>
                                                    </a>
                                                    <!-- BOTÃO DE APAGAR FORNECEDOR -->
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_apagar<?php echo $fornecedores['idfornecedores'] ?>">
                                                        <i class="fas fa-trash btn-danger p-2 rounded"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!-- MODAL DE VISUALIZAR -->
                                        <div class="modal fade" id="modal_editar<?php echo $fornecedores['idfornecedores'] ?>" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header text-light apagarModal">
                                                        <h5 class="modal-title" id="exampleModalLabel">Dados: <?php echo $fornecedores['nome'] ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body row g-3">
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Nome do Fornecedor</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo $fornecedores['nome'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">CNPJ</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo $fornecedores['cnpj'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Cep</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo $fornecedores['cep'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Cidade</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo $fornecedores['cidade'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Estado</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo $fornecedores['estado'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Complemento</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo $fornecedores['complemento'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Data da ultima edição</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo date("d/m/Y", strtotime($fornecedores['data_edit'])) ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Data de Cadastro</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo date("d/m/Y", strtotime($fornecedores['data_cad'])) ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="validationServer04" class="form-label">Observações</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo nl2br($fornecedores['obs']) ?>
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
                                <?php
                                if ($numRows > 0) {
                                ?>
                                    <div class="card-footer border-0 py-5">
                                        <?php
                                        paginacao($anterior, $proximo, $pc, $tp);
                                        ?>
                                    </div>
                                <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

</html>