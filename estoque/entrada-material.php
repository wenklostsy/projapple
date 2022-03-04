<?php
#INSERE O ARQUIVO HEADER
include "../template/geral.php";
#VERIFICA SE O USUÁRIO POSSUI ACESSO
verificaAcesso();
#INCLUI OS ARQUIVOS MODAIS
include "../template/modal.php";
?>
<title>Entrada de Material</title>

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
                                <a href="#" class="nav-link active">Entradas</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular">Saidas</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link font-regular">Movimentações</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- CONTEUDO PRINCIPAL -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <div class="card shadow border-0 p-4 mb-7">
                        <form class="row g-3 needs-validation" novalidate>
                            <div class="col-md-4">
                                <label for="validationCustom04" class="form-label">Produto</label>
                                <select class="form-select" id="validationCustom04" required>
                                    <option selected disabled value="">Escolha...</option>
                                    <?php
                                    while ($produtosNome = mysqli_fetch_assoc($ProdutoGeral)) {
                                    ?>
                                    <option value="<?php echo $produtosNome['nome'] ?>"><?php echo $produtosNome['nome'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Quantidade</label>
                                <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Nota Fiscal</label>
                                <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom04" class="form-label">Fornecedor</label>
                                <select class="form-select" id="validationCustom04" required>
                                    <option selected disabled value="">Escolha...</option>
                                    <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Valor Gasto</label>
                                <input type="text" class="form-control" id="validationCustom01" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Data de Entrada</label>
                                <input type="date" class="form-control" id="validationCustom01" required>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Nova Entrada</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

</body>

</html>