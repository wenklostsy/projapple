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
<title>Relatórios</title>

<body>
    <!-- Navbar-->
    <?php
    include_once "../template/navbar.php";
    ?>
    <!--DIV DO CONTEUDO PRINCIPAL DO Relatórios-->
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
                                <!-- TITULO DA ABA ATUAL DO Relatórios -->
                                <h1 class="h2 mb-0 ls-tight">Relatórios</h1>
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
                    <form action="../relatorio/relatorio.php" target="_blank" method="POST" class="row g-3 needs-validation">
                        <div class="col-md-2">
                            <label for="validationCustom04" class="form-label">Tipo de Relatório</label>
                            <select class="form-select" name="relatorio" required>
                                <option selected></option>
                                <option value="entradas">Relatório de Despesas</option>
                                <option value="saidas">Relatório de Vendas</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom01" class="form-label">Data inicial</label>
                            <input name="dataini" type="date" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom01" class="form-label">Data Final</label>
                            <input name="datafim" type="date" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" targ type="submit">Gerar Relatório</button>
                        </div>
                    </form>
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