<?php
#INSERE O ARQUIVO HEADER
include "../template/geral.php";
#VERIFICA SE O USUÁRIO POSSUI ACESSO
verificaAcesso();
#INCLUI OS ARQUIVOS MODAIS
include "../template/modal.php";
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
                                <h1 class="h2 mb-0 ls-tight">Configurações Basicas do Instagram</h1>
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
            <!--Main-->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <label for="validationDefault01" class="form-label">Token de acesso</label>
                            <input type="text" class="form-control" id="validationDefault01" value="Mark" required>
                        </div>
                        <div class="col-md-2">
                            <label for="validationDefault02" class="form-label">Quantidade de post's a serem exibidos</label>
                            <input type="text" class="form-control" id="validationDefault02" value="Otto" required>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </main>
        </div>
    </div>
</body>