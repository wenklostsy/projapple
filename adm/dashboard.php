<?php
#INSERE O ARQUIVO HEADER
include "../template/geral.php";
#VERIFICA SE O USUÁRIO POSSUI ACESSO
verificaAcesso();
#CRIA O COMANDO DE PAGINAÇÃO PARA A FUNÇÃO SER REALIZADA COM A TABELA ESPECIFICA
$comandoPaginacao = "SELECT * FROM users";
#SELECIONA A QUANTIDADE DE REGISTROS A SEREM EXIBIDOS
$totalDePaginas = 5;
#INCLUI A PAGINAÇÃO
include "../template/paginacao.php";
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
                                <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs overflow-x border-0">
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">Principal</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular">Compartilhados</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                    <div class="row g-6 mb-6">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Faturamento</span>
                                            <span class="h3 font-bold mb-0">R$: 750.90</span>
                                        </div>
                                        <div class="col-auto">
                                            <div>
                                                <button class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                    <a class="text-white" href="relatorios.php">
                                                        <i class="fa-solid fa-dollar-sign"></i>
                                                    </a>
                                                    <!--
                                                    <p data-bs-toggle='modal' data-bs-target='#Modal_Faturamento'>
                                                        <i class="fa-solid fa-dollar-sign"></i>
                                                    </p>-->
                                                </button>
                                                <i class="bi bi-credit-card">
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="badge badge-pill bg-soft-success text-success me-2">
                                            <i class="bi bi-arrow-up me-1"></i>13%
                                        </span>
                                        <span class="text-nowrap text-xs text-muted">Desde o último mês</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CARD DE PRODUTOS -->
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">
                                                Total de Produtos
                                            </span>
                                            <span class="h3 font-bold mb-0">
                                                <?php echo $numlinhasProdutos ?>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                + <i class="bi bi-people"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="badge badge-pill bg-soft-success text-success me-2">
                                            +<i class="bi bi-arrow-up me-1"></i>30%
                                        </span>
                                        <span class="text-nowrap text-xs text-muted">Desde o último mês</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CARD DE USUÁRIOS -->
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Usuários</span>
                                            <span class="h3 font-bold mb-0"><?php echo $numlinhasUsuarios ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                +<i class="bi bi-clock-history"> </i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="badge badge-pill bg-soft-danger text-danger me-2">
                                            <i class="bi bi-arrow-down me-1"></i>-5%
                                        </span>
                                        <span class="text-nowrap text-xs text-muted">Desde o último mês</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CARD TOTAL DE VENDAS -->
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total de vendas</span>
                                            <span class="h3 font-bold mb-0">95%</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                                <i class="bi bi-minecart-loaded">

                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="badge badge-pill bg-soft-success text-success me-2">
                                            <i class="bi bi-arrow-up me-1"></i>10%
                                        </span>
                                        <span class="text-nowrap text-xs text-muted">Desde o último mês</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $comandoEntradas = "SELECT SUM(valor_gasto) as total FROM entradas WHERE data_entrada between '$data_incio' and '$data_fim'";
                        $verificaGasto = mysqli_query($conexao, $comandoEntradas);
                        $verificaGasto = mysqli_fetch_assoc($verificaGasto);
                        ?>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Gastos</span>
                                            <span class="h3 font-bold mb-0">R$: <?php echo number_format($verificaGasto['total'] / 100, 2, ",", ".") ?></span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white text-lg rounded-circle">
                                                <i class="fa-solid fa-dollar-sign"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 mb-0 text-sm">
                                        <span class="badge badge-pill bg-soft-success text-success me-2">
                                            <i class="bi bi-arrow-up me-1"></i>10%
                                        </span>
                                        <span class="text-nowrap text-xs text-muted">Desde o último mês</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h5 class="mb-0">Usuários</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th class="d-none d-md-table-cell" scope="col">Cadastrado</th>
                                        <th class="d-none d-sm-table-cell" scope="col">Email</th>
                                        <th class="d-none d-md-table-cell" scope="col">Telefone</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php
                                if ($numlinhasUsuarios == 0) {
                                    echo "<div class='alert alert-danger' role='alert'>
                                        Não existem usuários cadastrados.
                                      </div>";
                                } else {
                                    while ($users = mysqli_fetch_assoc($limite)) {
                                        $data_cadastro_user = $users['data_cad'];
                                        $data_cadastro_user = date('d/m/Y', strtotime($data_cadastro_user));
                                ?>
                                        <tbody>
                                            <!--TABELA COM O REGISTRO DOS USUÁRIOS-->
                                            <tr>
                                                <td>
                                                    <a class="text-heading font-semibold" href="" data-bs-toggle='modal' data-bs-target='#Modal_Contato_<?php echo $users['idusers']; ?>'>
                                                        <?php echo $users['nome']; ?>
                                                    </a>
                                                </td>
                                                <td class="d-none d-md-table-cell">
                                                    <?php echo $data_cadastro_user; ?>
                                                </td>
                                                <td>
                                                    <a class="d-none d-sm-table-cell text-heading font-semibold" href="#">
                                                        <?php echo $users['email']; ?>
                                                    </a>
                                                </td>
                                                <td class="d-none d-md-table-cell">
                                                    <?php echo $users['telefone']; ?>
                                                </td>
                                                <td class="text-heading font-semibold">
                                                    <a href="#" data-bs-toggle='modal' data-bs-target='#Modal_Contato_<?php echo $users['idusers']; ?>' class="btn btn-sm btn-neutral">Entrar em contato</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--MODAL DE CONTATO-->
                                        <div class="modal fade" id="Modal_Contato_<?php echo $users['idusers']; ?>" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalToggleLabel2">Contato</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Email:</label>
                                                                <input class="form-control" type="text" value="<?php echo $users['email']; ?>" disabled>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Assunto:</label>
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected>Motivo do Contato</option>
                                                                    <option value="1">Duvidas</option>
                                                                    <option value="2">Desconto</option>
                                                                    <option value="3">Pedido</option>
                                                                    <option value="3">Outros</option>
                                                                </select>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Mensagem:</label>
                                                                <textarea class="form-control" id="message-text"></textarea>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cencelar</button>
                                                        <button class="btn btn-primary" data-bs-target="#" data-bs-toggle="modal">Enviar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                            </table>
                        </div>
                        <div class="card-footer border-0 py-5">
                        <?php
                                    paginacao($anterior, $proximo, $pc, $tp);
                                }
                        ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php
    #INCLUI OS ARQUIVOS MODAIS
    include "../template/modal.php";
    ?>
</body>

</html>