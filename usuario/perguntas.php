<?php
include "../template/geral.php";
include "../process/conexao.php";
#CRIA O COMANDO DE PAGINAÇÃO PARA A FUNÇÃO SER REALIZADA COM A TABELA ESPECIFICA
$comandoPaginacao = "SELECT * FROM perguntas WHERE status = 1 ORDER BY idperguntas DESC";
#SELECIONA A QUANTIDADE DE REGISTROS A SEREM EXIBIDOS
$totalDePaginas = 10;
#INCLUI A PAGINAÇÃO
include "../template/paginacao.php";
?>
<title>Perguntas Frequentes</title>

<body>
    <?php
    include_once "../template/navbar.php";
    $comandoProdutoAleatorio = "SELECT * FROM users WHERE email = '$emailUsuario'";
    $executaAleatorio = mysqli_query($conexao, $comandoProdutoAleatorio);
    $prodAleatorio = mysqli_fetch_assoc($executaAleatorio);
    $numLinhasAleatorio = mysqli_num_rows($executaAleatorio);
    ?>
    <!--Informativo-->
    <div class="container px-4 py-5" id="hanging-icons">
        <!--EXIBE MENSAGEM AS MENSAGENS-->
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        #MISSÃO, INCLUIR AQUI CASO SOLICITADO
        ?>
    </div>
    <!-- Section-->
    <section>
        <div class="container ">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col-md-8 p-4 border-right">
                    <div class="p-3">
                        <!--CONTEUDO PRINCIPAL-->
                        <div class="container-fluid mt-100">
                            <div class="d-flex flex-wrap justify-content-between">
                                <div class="col-6 col-md-3 p-0 mb-3">
                                    <button type="button" class="btn btn-primary p-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Nova Pergunta
                                    </button>
                                </div>
                                <div class="col-6 col-md-3 p-0 mb-3">
                                    <input type="text" class="form-control p-3" placeholder="Procurar...">
                                </div>
                            </div>
                            <div class="card mb-3">
                                <?php
                                $selecionaPerguntas = "SELECT * FROM perguntas WHERE status = 1 ORDER BY idperguntas DESC";
                                $comandoExecuta = mysqli_query($conexao, $selecionaPerguntas);
                                $numerodeLinhas = mysqli_num_rows($comandoExecuta);
                                if ($numerodeLinhas >= 1) {
                                ?>
                                    <div class="card-header pl-0 pr-0">
                                        <div class="row no-gutters w-100 align-items-center">
                                            <div class="col ml-3">Topicos</div>
                                            <div class="col-4 text-muted">
                                                <div class="row align-items-center">
                                                    <div class="col-12 d-none d-md-block col-4">Ultima Atualização</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--INICIO DAS PERGUNTAS-->
                                    <?php
                                    while ($perguntas = mysqli_fetch_assoc($limite)) {
                                    ?>
                                        <div class="card-body py-3">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col">
                                                    <a class="text-big" href="../public/perguntas-post.php?id=<?php echo $perguntas['idperguntas']?>" data-abc="true"><?php echo $perguntas['titulo'] ?></a>
                                                    <div class="text-muted small mt-1">
                                                        <a class="text-muted" data-abc="true"><?php echo $perguntas['usuario'] ?></a>
                                                    </div>
                                                </div>
                                                <div class="d-none d-md-block col-4">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="media col-8 align-items-center">
                                                            <div class="media-body flex-truncate ml-2">
                                                                <div class="line-height-1 text-truncate">
                                                                    <?php echo date("d/m/Y", strtotime($perguntas['data_cad'])) ?>
                                                                </div>
                                                                <a href="javascript:void(0)" class="text-muted small text-truncate" data-abc="true">by <?php echo $perguntas['usuario'] ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="m-0">
                                <?php
                                    }
                                } else {
                                    echo "<div class='alert alert-warning' role='alert'>
                                    Nenhuma pergunta realizada.
                                  </div>";
                                }
                                ?>
                                <!--FIM DA PERGUNTA-->
                            </div>
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
                <div class="col-md-4">
                    <?php
                    include "../usuario/template/navuser.php";
                    ?>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nova Pergunta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="./processa/processa_perguntas.php" method="post">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Titulo:</label>
                                <input type="text" class="form-control" name="titulo" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Mensagem:</label>
                                <textarea class="form-control" name="descricao" rows="5" id="message-text"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- Footer-->
    <?php 
    include "../template/footer.php";
    mysqli_close($conexao);
    ?>
</body>

</html>