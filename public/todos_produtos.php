<?php include "../template/geral.php";
#CRIA O COMANDO DE PAGINAÇÃO PARA A FUNÇÃO SER REALIZADA COM A TABELA ESPECIFICA
$comandoPaginacao = "SELECT * FROM produtos";
#SELECIONA A QUANTIDADE DE REGISTROS A SEREM EXIBIDOS
$totalDePaginas = 12;
?>
<title>Produtos</title>

<body>
    <?php
    include_once "../template/navbar.php";
    ?>
    <div class="album py-4 bg-light">
        <div class="container">
            <!--TODOS OS PRODUTOS-->
            <section class="py-5 text-center container">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Descubra um mundo de experiências incríveis.</h1>
                        <p class="lead text-muted">
                            Viva as melhores experiências que você pode ter nos aparelhos que adora. Veja programas e filmes premiados,
                            ouça suas músicas favoritas com Áudio Espacial.
                        </p>
                    </div>
                </div>
                <nav class="navbar rounded-3">
                    <div class="container-fluid">
                        <a class="navbar-brand text-center text-light"></a>
                        <form action="" method="GET" class="d-flex">
                            <input class="form-control me-2" name="procura" type="text" placeholder="Pesquisar..." aria-label="Search">
                            <button class="btn btn-outline-dark" type="submit">Procurar</button>
                        </form>
                    </div>
                </nav>
            </section>

            <main>
                <div class="row px-11 px-sm-1 row-cols-1 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 g-4">
                    <!--TIRAR A CLASS CARD E COLOCAR CARD-GROUP PARA RESOLVER O PROBLEMA DA ALTURA-->
                    <?php
                    if (isset($_GET['procura'])) {
                        $varPesquisa = $_GET['procura'];
                        $comandoPaginacao = "SELECT * FROM produtos WHERE ativo = 'sim' AND estoque >=1  AND nome LIKE '%$varPesquisa%' ORDER BY idprodutos DESC";
                    } elseif (isset($_GET['categoria'])) {
                        $varPesquisa = $_GET['categoria'];
                        $comandoPaginacao = "SELECT * FROM produtos WHERE ativo = 'sim' AND estoque >=1 AND categoria LIKE '%$varPesquisa%' ORDER BY idprodutos DESC";
                    } else {
                        $comandoPaginacao = "SELECT * FROM produtos WHERE ativo = 'sim' AND estoque >=1 ORDER BY idprodutos DESC";
                    }

                    #INCLUI A PAGINAÇÃO
                    include "../template/paginacao.php";

                    if ($numRows == 0) {
                        echo "<div class='alert alert-warning' role='alert'>
                        Ainda não há nenhum produto cadastrado.
                      </div>";
                    } else {
                        while ($ultimosRegistros = mysqli_fetch_assoc($limite)) {
                            $valorInicial = $ultimosRegistros['valor'];
                            $valorDesconto = $ultimosRegistros['valor_desconto'];
                            $ValorFinal = number_format(($valorInicial - $valorDesconto) / 100, 2, ",", ".");
                            $valorDesconto = number_format($valorDesconto / 100, 2, ",", ".");
                            $valorInicial = number_format($valorInicial / 100, 2, ",", ".");
                    ?>
                            <div class="col card-group">
                                <div class="card">
                                    <img src="../arquivos/fotos_produtos/<?php echo $ultimosRegistros['principal'] ?>"  class="card-img-top imgprod" alt="...">
                                    <div class="card-body text-center">
                                        <h5 class="card-title "><?php echo $ultimosRegistros['nome'] ?></h5>
                                        <?php
                                        if (!empty($ultimosRegistros['valor_desconto'])) {
                                            echo "<del>R$: $valorInicial</del><br>
                                            <h4>R$: $ValorFinal<h4>";
                                        } else {
                                            echo "<h4 class='p-3'>R$: $valorInicial </h4>";
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-outline-dark mt-auto" href="../cadastros/carrinho.php?id=<?php echo $ultimosRegistros['idprodutos'] ?>">Adicionar ao carrrinho</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    mysqli_close($conexao);
                    ?>
                </div>
                <div class="card-footer border-0 py-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php
                            if (isset($_GET['procura'])) {
                                $voltar = "<li class='page-item'>
                                        <a class='page-link' href='?procura=$varPesquisa&pagina=$anterior'>Anterior</a>
                                    </li>";
                                $proximo = "<li class='page-item'>
                                       <a class='page-link' href='?procura=$varPesquisa&pagina=$proximo'>Proximo</a>
                                   </li>";
                            } elseif (isset($_GET['categoria'])) {
                                $voltar = "<li class='page-item'>
                                        <a class='page-link' href='?categoria=$varPesquisa&pagina=$anterior'>Anterior</a>
                                    </li>";
                                $proximo = "<li class='page-item'>
                                       <a class='page-link' href='?categoria=$varPesquisa&pagina=$proximo'>Proximo</a>
                                   </li>";
                            } else {
                                $voltar = "<li class='page-item'>
                                        <a class='page-link' href='?pagina=$anterior'>Anterior</a>
                                    </li>";
                                $proximo = "<li class='page-item'>
                                       <a class='page-link' href='?pagina=$proximo'>Proximo</a>
                                   </li>";
                            }
                            if ($pc > 1) {
                                echo $voltar;
                            }
                            if ($pc < $tp) {
                                echo $proximo;
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
        </div>
    </div>
    </main>

    <!-- Footer-->
    <?php
    include "../template/footer.php";
    ?>
</body>

</html>