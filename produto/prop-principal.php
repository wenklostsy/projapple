<header class="bg-dark py-5">
    <div class="container px-5">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-white mb-2"><?php echo $prodAleatorio['nome'] ?></h1>
                    <p class="lead fw-normal text-white-50 mb-4"><?php echo $prodAleatorio['descricao'] ?></p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a href="../cadastros/carrinho.php?id=<?php echo $prodAleatorio['idprodutos'] ?>">
                            <button class="btn btn-outline-primary p-3 flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Adicionar ao carrinho
                            </button>
                        </a>
                        <div>
                            <a class="btn btn-outline-light p-3 flex-shrink-0" href="../public/produto.php?id=<?php echo $prodAleatorio['idprodutos'] ?>">Ver mais</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                <a href="../public/produto.php?id=<?php echo $prodAleatorio['idprodutos'] ?>">
                    <img class="img-fluid rounded-3 my-5" src="../arquivos/fotos_produtos/<?php echo $prodAleatorio['principal'] ?>" alt="Propaganda Principal" />
                </a>
            </div>
        </div>
    </div>
</header>