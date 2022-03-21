<?php
include "../template/geral.php";
include "../process/conexao.php";

$id = $_GET['id'];
verificaAtivo($conexao, $id);

$comandoUltimosRegistros = "SELECT * FROM produtos WHERE idprodutos = $id";
$executaRegistros = mysqli_query($conexao, $comandoUltimosRegistros);
$prodAssoc = mysqli_fetch_assoc($executaRegistros);
$numRows = mysqli_num_rows($executaRegistros);

#VERIFICA SE O ESTOQUE DO PRODUTO ESTA ZERADO
if ($prodAssoc['estoque'] < 1) {
    header('Location: ../public/index.php');
    exit();
}

?>
<title><?php echo $prodAssoc['nome'] ?></title>

<body>
    <?php
    include_once "../template/navbar.php";
    ?>
    <!-- Seção-->
    <!-- Seção do Produto -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <!-- CARROUSEL QUE EXIBE A IMAGEM DO PRODUTO -->
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../arquivos/fotos_produtos/<?php echo $prodAssoc['principal'] ?>" class="d-block w-100 imgprod rounded" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../arquivos/fotos_produtos/<?php echo $prodAssoc['img2'] ?>" class="d-block w-100 imgprod rounded" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="../arquivos/fotos_produtos/<?php echo $prodAssoc['img3'] ?>" class="d-block w-100 imgprod rounded" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <!--<div class="small mb-1">SKU: BST-498</div>-->
                    <h1 class="display-5 fw-bolder"><?php echo $prodAssoc['nome'] ?></h1>
                    <div class="fs-5 mb-5">
                        <?php
                        $valorDesconto = ($prodAssoc['valor_desconto'] / 100);
                        $valorInicial = ($prodAssoc['valor'] / 100);
                        $porcentagem = $valorDesconto / $valorInicial * 100;
                        $valorInicial1 = number_format(($prodAssoc['valor'] / 100), 2, ",", ".");
                        $valorFinal = number_format(($valorInicial - $valorDesconto), 2, ",", ".");
                        if (!empty($prodAssoc['valor_desconto'])) {
                            echo
                            "<span class='text-decoration-line-through'><del>De R$: $valorInicial1</del></span>
                        <h3>Por apenas: R$: $valorFinal </h3>";
                        } else {
                            echo "<h4 class='p-3'>R$: $valorInicial1 </h4>";
                        }
                        ?>
                    </div>
                    <h5>Especificações Técnicas:</h5>
                    <p class="lead">
                        <?php echo nl2br($prodAssoc['especificacao']) ?>
                        <hr>
                    </p>
                    <h5>Estoque: <?php echo $prodAssoc['estoque'] . " Produtos em estoque"; ?></h5>
                    <hr>
                    <div class="d-flex">
                        <a href="../cadastros/carrinho.php?id=<?php echo $id ?>">
                            <button class="btn btn-outline-dark p-3 flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Adicionar ao carrinho
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Produtos Relacionados</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content">
                <!--INICIO CARD-->
                <?php
                $categoria = $prodAssoc['categoria'];
                $comandoRelacionados = "SELECT * FROM produtos WHERE categoria = '$categoria' ORDER BY RAND() LIMIT 4";
                $executaRelacionados = mysqli_query($conexao, $comandoRelacionados);
                while ($relacionados = mysqli_fetch_assoc($executaRelacionados)) {
                ?>
                    <div class="col card-group mb-5">
                        <div class="card h-100">
                            <!-- Product image 450X350-->
                            <a href="../public/produto.php?id=<?php echo $relacionados['idprodutos'] ?>">
                                <img class="card-img-top" src="../arquivos/fotos_produtos/<?php echo $relacionados['principal'] ?>" style="width: 450px; height: 210px" alt="FOTO DO PRODUTO" />
                            </a><!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $relacionados['nome'] ?></h5>
                                    <!-- Product price-->
                                    $40.00 - $80.00
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" href="../public/produto.php?id=<?php echo $relacionados['idprodutos'] ?>">Veja Mais!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!--FIM DO CARD-->
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