<?php include "../template/geral.php" ?>
<title>Produtos</title>

<body>
    <?php
    include_once "../template/navbar.php";
    ?>
    <main>
        <div class="album py-5 bg-light">
            <div class="container">
                <!--TODOS OS PRODUTOS-->
                <section class="py-5 text-center container">
                    <div class="row py-lg-5">
                        <div class="col-lg-6 col-md-8 mx-auto">
                            <h1 class="fw-light">Album example</h1>
                            <p class="lead text-muted">Confira nossa variedade de produtos disponíveis para você.</p>
                        </div>
                    </div>
                    <nav class="navbar rounded-3">
                        <div class="container-fluid">
                            <a class="navbar-brand text-center text-light"></a>
                            <form action="" method="GET" class="d-flex">
                                <input class="form-control me-2" name="procura" type="text" aria-label="Search">
                                <button class="btn btn-outline-dark" type="submit">Procurar</button>
                            </form>
                        </div>
                    </nav>
                </section>
                <div class="row row-cols-1 row-cols-sm-3 row-cols-md-3 g-3">
                    <!--TIRAR A CLASS CARD E COLOCAR CARD-GROUP PARA RESOLVER O PROBLEMA DA ALTURA-->
                    <?php
                    if (isset($_GET['procura'])) {
                        $varPesquisa = $_GET['procura'];
                        $comando = "SELECT * FROM produtos WHERE ativo = 'sim' AND nome LIKE '%$varPesquisa%' ORDER BY idprodutos";
                    } elseif (isset($_GET['categoria'])) {
                        $varCategoria = $_GET['categoria'];
                        $comando = "SELECT * FROM produtos WHERE ativo = 'sim' AND categoria LIKE '%$varCategoria%' ORDER BY idprodutos";
                    } else {
                        $comando = "SELECT * FROM produtos WHERE ativo = 'sim' ORDER BY idprodutos";
                    }

                    include "../process/conexao.php";
                    $comandoUltimosRegistros = $comando;
                    $executaRegistros = mysqli_query($conexao, $comandoUltimosRegistros);
                    $numRows = mysqli_num_rows($executaRegistros);

                    if ($numRows == 0) {
                        echo "<div class='alert alert-warning' role='alert'>
                        Ainda não há nenhum produto cadastrado.
                      </div>";
                    } else {
                        while ($ultimosRegistros = mysqli_fetch_assoc($executaRegistros)) {
                    ?>
                            <div class='card-group'>
                                <div class='card h-100'>
                                    <img class="card-img-top" src="../arquivos/fotos_produtos/<?php echo $ultimosRegistros['principal'] ?>" style="width: 450px; height: 300px" alt="Imagem do Produto" />
                                    <div class='card-body'>
                                        <h5 class='card-title'><?php echo $ultimosRegistros['nome'] ?></h5>
                                        <p class='card-text'><?php echo $ultimosRegistros['descricao'] ?></p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="../public/produto.php?id=<?php echo $ultimosRegistros['idprodutos'] ?>">Ver Mais!</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    mysqli_close($conexao);
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>