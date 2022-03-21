<?php
#INSERE O ARQUIVO HEADER
include "../template/geral.php";
#VERIFICA SE O USUÁRIO POSSUI ACESSO
verificaAcesso();
#INCLUI OS ARQUIVOS MODAIS
include "../template/modal.php";
?>
<title>Usuários</title>

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
                                <h1 class="h2 mb-0 ls-tight">Usuários</h1>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs overflow-x border-0">
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">Perguntas Realizadas</a>
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
                            $comandoperguntas = "SELECT * FROM perguntas ORDER BY idperguntas DESC";
                            $executaRegistros = mysqli_query($conexao, $comandoperguntas);
                            $numRows = mysqli_num_rows($executaRegistros);

                            if ($numRows == 0) {
                                echo "<div class='alert alert-primary' role='alert'>
                                    Nenhuma pergunta realizada.
                                </div>";
                            } else {
                            ?>
                                <table class="table table-hover table-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="d-none d-md-table-cell" scope="col">Id</th>
                                            <th scope="col">Pergunta</th>
                                            <th class="d-none d-md-table-cell" scope="col">Comentário</th>
                                            <th class="d-none d-md-table-cell" scope="col">Usuário</th>
                                            <th class="d-none d-md-table-cell" scope="col">Status</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    #TROCAR VARIAVEL PARA VARÍAVEL LIMITE
                                    while ($perguntas = mysqli_fetch_assoc($executaRegistros)) {
                                        if ($perguntas['status'] == 0) {
                                            $status = "Em Análise";
                                            $badge = "warning";
                                        } else {
                                            $status = "Concluida";
                                            $badge = "success";
                                        }
                                    ?>
                                        <tbody>
                                            <tr>
                                                <th class="d-none d-md-table-cell" scope="row"><?php echo $perguntas['idperguntas'] ?></th>
                                                <th scope="row"><?php echo $perguntas['titulo'] ?></th>
                                                <td class="d-none d-md-table-cell"><?php echo  $perguntas['descricao'] ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo $perguntas['usuario'] ?></td>
                                                <td class="d-none d-md-table-cell"><span class="badge rounded-pill bg-<?php echo $badge ?>"><?php echo $status ?></span></td>
                                                <td>
                                                    <!-- BOTÃO DE RESPONDER A PERGUNTA -->
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_responder<?php echo $perguntas['idperguntas'] ?>">
                                                        <i class="fa-solid fa-comment btn-info p-2 rounded"></i>
                                                    </a>
                                                    <!-- BOTÃO DE APAGAR PRODUTO -->
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_apagar<?php echo $perguntas['idperguntas'] ?>">
                                                        <i class="fas fa-trash btn-danger p-2 rounded"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!-- MODAL DE APAGAR -->
                                        <div class="modal fade" id="modal_apagar<?php echo $perguntas['idperguntas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollablea">
                                                <div class="modal-content">
                                                    <div class="modal-header text-light apagarModal">
                                                        <h5 class="modal-title" id="exampleModalLabel">Perguntas de: <?php echo $perguntas['usuario'] ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Você tem certeza que deseja apagar a pergunta de <?php echo $perguntas['usuario'] ?>?<br> <b>"<?php echo $perguntas['titulo'] ?>"</b><br>
                                                        Essa ação é irreversivel.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                        <a class="btn btn-danger" href="../usuario/processa/apaga_perguntas.php?id=<?php echo $perguntas['idperguntas'] ?>">Apagar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- MODAL DE RESPOSTA-->
                                        <div class="modal fade" id="modal_responder<?php echo $perguntas['idperguntas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollablea">
                                                <div class="modal-content">
                                                    <div class="modal-header text-light apagarModal">
                                                        <h5 class="modal-title" id="exampleModalLabel">Responder: <?php echo $perguntas['usuario'] ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="../usuario/processa/processa_perguntas.php?id=<?php echo $perguntas['idperguntas'] ?>" method="post">
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Pergunta:</label>
                                                                <input type="text" class="form-control" value="<?php echo $perguntas['titulo'] ?>" name="titulo" id="recipient-name">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="recipient-name" class="col-form-label">Tags (SEPARE POR VIRGULA):</label>
                                                                <input type="text" class="form-control" value="<?php echo $perguntas['tag'] ?>" name="tag" id="recipient-name">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="message-text" class="col-form-label">Resposta:</label>
                                                                <textarea class="form-control" name="descricao" rows="12" id="message-text"><?php echo $perguntas['resposta'] ?></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                                        </form>
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
                                        //paginacao($anterior, $proximo, $pc, $tp);
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