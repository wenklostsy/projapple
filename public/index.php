<?php
include "../template/geral.php";
include "../process/conexao.php";
?>
<title>Produtos</title>

<body>
    <?php
    include_once "../template/navbar.php";
    ?>
    <!-- BANNER DA PAGINA-->
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <h1 class="display-4 fw-normal">IPass</h1>
            <p class="lead fw-normal p-3"><i>Se cheguei até aqui foi porque me apoiei no ombro dos gigantes.</i><br><b>-Isaac Newton</b></p>
            <a class="btn btn-outline-dark p-3" href="#">Coming soon</a>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>
    <!--Informativo-->
    <div class="container px-4 py-5" id="hanging-icons">
        <!--EXIBE MENSAGEM AS MENSAGENS-->
        <?php
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <div class="card-group row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col d-flex align-items-start">
                <div class="h-100">
                    <div>
                        <h2>Qualidade</h2>
                        <p>Prezamos a qualidade e satisfação do cliente, garantindo sempre produtos com excelência.</p>
                    </div>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div>
                    <h2>Missão</h2>
                    <p>Buscando sempre a inovação tecnológica proporcionando conforto para nossos clientes</p>
                </div>
            </div>
            <div class="col d-flex align-items-start">
                <div>
                    <h2>Visão</h2>
                    <p>Ser uma referência em artigos esportivos mantendo assim um vínculo com qualidade de vida e de pessoas</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <!--INICIO DOS CARDS EM DESTAQUE-->
                <?php
                $comandoUltimosRegistros = "SELECT * FROM produtos WHERE ativo = 'sim' ORDER BY idprodutos DESC LIMIT 4";
                $executaRegistros = mysqli_query($conexao, $comandoUltimosRegistros);
                $numRows = mysqli_num_rows($executaRegistros);

                if ($numRows > 0) {
                    while ($ultimosRegistros = mysqli_fetch_assoc($executaRegistros)) {
                ?>
                        <div class="col mb-5">

                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div class="badge bg-primary text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Produto em Destaque</div>
                                <!-- Product image-->
                                <a href="../public/produto.php?id=<?php echo $ultimosRegistros['idprodutos'] ?>">
                                    <img class="card-img-top" src="../arquivos/fotos_produtos/<?php echo $ultimosRegistros['principal'] ?>" style="width: 350px; height: 200px" alt="Imagem do Produto" />
                                </a>
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $ultimosRegistros['nome'] ?></h5>
                                        <!-- Product price-->
                                        <span class="text-muted text-decoration-line-through">
                                            R$: <?php echo number_format($ultimosRegistros['valor'] / 100, 2, ',', '.') ?>
                                        </span>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" href="../public/produto.php?id=<?php echo $ultimosRegistros['idprodutos'] ?>">Ver Mais!</a>
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
        </div>
    </section>
    <!-- Footer-->
    <?php include "../template/footer.php" ?>
</body>

</html>