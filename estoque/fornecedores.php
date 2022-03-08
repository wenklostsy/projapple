<?php
#INSERE O ARQUIVO HEADER
include "../template/geral.php";
#VERIFICA SE O USUÁRIO POSSUI ACESSO
verificaAcesso();
#INCLUI A API DE CEP
include_once "../template/cep.php";
?>
<title>Fornecedores</title>

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
                                <h1 class="h2 mb-0 ls-tight">Fornecedores</h1>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs overflow-x border-0">
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">Cadastro de Fornecedores</a>
                            </li>
                            <li class="nav-item">
                                <a href="lista-fornecedor.php" class="nav-link font-regular">Lista de Fornecedores</a>
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
                    <div class="card shadow border-0 p-4 mb-7">
                        <form method="POST" action="processa-fornecedor.php" class="row g-3 needs-validation">
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">Nome do Fornecedor</label>
                                <input type="text" name="nome" class="form-control" id="validationCustom02" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom02" class="form-label">CNPJ</label>
                                <input type="text" name="cnpj" class="form-control" id="validationCustom02" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">CEP (SEM HÍFEN)</label>
                                <input name="cep" type="text" id="cep" size="10" maxlength="8" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Cidade</label>
                                <input name="cidade" type="text" id="cidade" class="form-control" readonly required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Estado</label>
                                <input name="uf" type="text" id="uf" class="form-control" readonly required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Rua</label>
                                <input name="rua" type="text" id="rua" class="form-control" readonly required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Bairro</label>
                                <input name="bairro" type="text" id="bairro" class="form-control" readonly required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Numero</label>
                                <input type="text" name="numero" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Complemento</label>
                                <input type="text" name="complemento" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Telefone</label>
                                <input type="text" name="telefone" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="validationCustom01" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" required>
                            </div>
                            <div class="col-md-12">
                                <label for="validationServer05" class="form-label">Observações (255 Caracteres)</label>
                                <textarea name="obs" rows="5" class="form-control" id="message-text"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Cadastrar Fornecedor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>