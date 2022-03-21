<?php
include "../template/geral.php";
include "../process/conexao.php";

@$id = $_GET['id'];

if (empty($id)) {
    #CRIA O COMANDO DE PAGINAÇÃO PARA A FUNÇÃO SER REALIZADA COM A TABELA ESPECIFICA
    $comandoPaginacao = "SELECT * FROM perguntas WHERE status = 1 ORDER BY idperguntas DESC";
    #SELECIONA A QUANTIDADE DE REGISTROS A SEREM EXIBIDOS
    $totalDePaginas = 10;
    #INCLUI A PAGINAÇÃO
    include "../template/paginacao.php";
} else {
    #SELECIONA AS PERGUNTAS QUE ESTÃO APROVADAS
    $comando = "SELECT * FROM perguntas WHERE idperguntas = $id AND status = 1 ";
    $executaPergunta = mysqli_query($conexao, $comando);
    $associaDados = mysqli_fetch_assoc($executaPergunta);
}

?>
<title>Produtos</title>

<body class="d-flex flex-column h-100">
    <?php
    include_once "../template/navbar.php";
    ?>
    <main class="flex-shrink-0">
        <!-- Page Content-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <?php
                    if (empty($id)) {
                    ?>
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
                                                <a class="text-big" href="../public/perguntas-post.php?id=<?php echo $perguntas['idperguntas'] ?>" data-abc="true"><?php echo $perguntas['titulo'] ?></a>
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
                    } else {
                        ?>
                        <div class="col-lg-3">
                            <div class="d-flex align-items-center mt-lg-5 mb-4">
                                <img class="img-fluid rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />
                                <div class="ms-3">
                                    <div class="fw-bold"><?php echo $associaDados['usuario']; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <!-- Post content-->
                            <article>
                                <!-- Post header-->
                                <header class="mb-4">
                                    <!-- Post title-->
                                    <h1 class="fw-bolder mb-1"><?php echo $associaDados['titulo']; ?></h1>
                                    <!-- Post meta content-->
                                    <div class="text-muted fst-italic mb-2">
                                        <?php echo date("d/m/Y", strtotime($associaDados['data_cad'])); ?>
                                    </div>
                                    <!-- Post categories-->
                                    <?php

                                    $categoria = explode(",", $associaDados['tag']);
                                    foreach ($categoria as $key => $value) {
                                    ?>
                                        <a class="badge bg-primary text-decoration-none link-light" href="#!"><?php echo $value ?></a>
                                    <?php
                                    }
                                    ?>
                                </header>
                                <!-- Post content-->
                                <section class="mb-5">
                                    <p class="fs-5 mb-4">
                                        <?php echo $associaDados['descricao']; ?>
                                    </p>
                                    <h2 class="fw-bolder mb-4 mt-5">Resposta</h2>
                                    <p class="fs-5 mb-4">
                                        <?php echo nl2br($associaDados['resposta']); ?>
                                    </p>
                                </section>
                            </article>
                            <!-- Comments section-->
                            <section>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <!--EXIBE MENSAGEM AS MENSAGENS-->
                                        <?php
                                        if (isset($_SESSION['msg'])) {
                                            echo $_SESSION['msg'];
                                            unset($_SESSION['msg']);
                                        }
                                        ?>
                                        <!-- Comment form-->
                                        <?php
                                        if (isset($_SESSION['logado'])) {
                                        ?>
                                            <form action="../usuario/processa/processa-comentario.php?id=<?php echo $id ?>" method="POST" class="mb-4">
                                                <div class="col-12 col-md-12 p-1 ">
                                                    <textarea class="form-control" rows="3" name="comentario" placeholder="Participe da discussão e deixe um comentário!"></textarea>
                                                </div>
                                                <div class="col-6 col-md-3 p-1 ">
                                                    <button type="submit" class="btn btn-primary">
                                                        Comentar
                                                    </button>
                                                </div>
                                            </form>
                                        <?php
                                        }
                                        ?>
                                        <!-- Comment with nested comments-->
                                        <!-- Single comment-->
                                        <?php
                                        #SELECIONA AS PERGUNTAS QUE ESTÃO APROVADAS
                                        $comandoComentario = "SELECT * FROM comentarios WHERE idpergunta = $id ORDER BY idcomentarios DESC";
                                        $executaComentario = mysqli_query($conexao, $comandoComentario);
                                        while ($comentarios = mysqli_fetch_assoc($executaComentario)) {
                                        ?>
                                            <div class="d-flex mb-4">
                                                <div class="ms-3">
                                                    <div class="fw-bold">
                                                        <?php echo $comentarios['usuario']." , ". date("d/m/Y H:i", strtotime($comentarios['data_comentario'])) ?> 
                                                    </div>
                                                    <?php echo $comentarios['comentario'] ?>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </section>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <?php 
    include "../template/footer.php";
    mysqli_close($conexao);
    ?>
</body>

</html>