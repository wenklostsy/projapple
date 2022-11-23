<?php
include "../template/geral.php";
include "../process/conexao.php";
?>
<title>Produtos</title>

<body class="corBranco">
    <?php
    include_once "../template/navbar.php";
    $comandoProdutoAleatorio = "SELECT * FROM produtos WHERE ativo = 'sim' AND estoque >=1 ORDER BY RAND() LIMIT 1";
    $executaAleatorio = mysqli_query($conexao, $comandoProdutoAleatorio);
    $prodAleatorio = mysqli_fetch_assoc($executaAleatorio);
    $numLinhasAleatorio = mysqli_num_rows($executaAleatorio);
    if ($numLinhasAleatorio > 0) {
        #INCLUI O BANNER DA PAGINA
        include_once "../produto/prop-principal.php";
    }
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
    <div class="container">
        <section class="py-4">
            <h2 class="text-center">Produtos em Destaque</h2>
            <div class=" px-4 px-lg-5 mt-5">
                <div class="row px-11 px-sm-1 row-cols-1 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 g-4">
                    <!--INICIO DOS CARDS EM DESTAQUE-->
                    <?php
                    $comandoUltimosRegistros = "SELECT * FROM produtos WHERE ativo = 'sim' AND estoque >=1 ORDER BY idprodutos DESC LIMIT 4";
                    $executaRegistros = mysqli_query($conexao, $comandoUltimosRegistros);
                    $numRows = mysqli_num_rows($executaRegistros);
                    if ($numRows > 0) {
                        while ($ultimosRegistros = mysqli_fetch_assoc($executaRegistros)) {
                            $valorInicial = $ultimosRegistros['valor'];
                            $valorDesconto = $ultimosRegistros['valor_desconto'];
                            $porcentagem = $valorDesconto / $valorInicial * 100;
                            $ValorFinal = number_format(($valorInicial - $valorDesconto) / 100, 2, ",", ".");
                            $valorDesconto = number_format($valorDesconto / 100, 2, ",", ".");
                            $valorInicial = number_format($valorInicial / 100, 2, ",", ".");
                    ?>
                            <div class="col card-group">
                                <div class="card ">
                                    <!--MEDALHA DE DESCONTO/DESTAQUE-->
                                    <?php
                                    if (!empty($ultimosRegistros['valor_desconto'])) {
                                    ?>
                                        <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo ceil($porcentagem) . "% de Desconto" ?></div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="badge bg-primary text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Produto em Destaque</div>
                                    <?php
                                    }
                                    ?>
                                    <div style="height: 100%">
                                        <a href="produto.php?id=<?php echo $ultimosRegistros['idprodutos'] ?>">
                                            <img src="../arquivos/fotos_produtos/<?php echo $ultimosRegistros['principal'] ?>" class="card-img-top imgprod h-100" alt="...">
                                        </a>
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title "><?php echo $ultimosRegistros['nome'] ?></h5>
                                        <?php
                                        if (!empty($ultimosRegistros['valor_desconto'])) {
                                            echo "<del>R$: $valorInicial</del><br>
                                            <h4>R$: $ValorFinal<h4>";
                                        } else {
                                            echo "<h4 class='p-3'>R$: $valorInicial</h4>";
                                        }
                                        ?>
                                    </div>
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <div class="text-center">
                                            <a class="btn btn-outline-dark mt-auto" href="../cadastros/carrinho.php?id=<?php echo $ultimosRegistros['idprodutos'] ?>">Adicionar ao carrinho</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                    <!--FIM DOS CARDS EM DESTAQUE-->
                </div>
                <!-- PROPAGANDA-->
                <?php #INCUIR PROPAGANDA 
                ?>
            </div>
        </section>
    </div>
    
    <h2 class="text-center">Confira nossos produtos</h2>
    <!-- Footer-->
    <?php
    include "../produto/propaganda.php";
    include "../template/footer.php";
    mysqli_close($conexao);
    ?>
</body>

</html>