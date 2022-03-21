<?php
include "../template/geral.php";
include "../process/conexao.php";
#INCLUI A API DE CEP
include_once "../template/cep.php";
?>
<title>Pedidos</title>

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
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Accordion Item #1
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <!--CONTEUDO DO PEDIDO-->
                                        <article class="card">
                                            <header class="card-header"> Meus Pedidos / Rastreamento </header>
                                            <div class="card-body">
                                                <h6>Order ID: OD45345345435</h6>
                                                <article class="card">
                                                    <div class="card-body row">
                                                        <div class="col">
                                                            <strong>Tempo de entrega estimado:</strong><br>
                                                            29 nov 2019
                                                        </div>
                                                        <div class="col">
                                                            <strong>Envio POR:</strong><br>
                                                            BLUEDART, | <i class="fa fa-phone"></i> +1598675986
                                                        </div>
                                                        <div class="col">
                                                            <strong>Status:</strong><br>
                                                            Picked by the courier
                                                        </div>
                                                        <div class="col">
                                                            <strong>Tracking #:</strong><br>
                                                            BD045903594059
                                                        </div>
                                                    </div>
                                                </article>
                                                <div class="track">
                                                    <div class="step active">
                                                        <span class="icon">
                                                            <i class="fa fa-check"></i>
                                                        </span>
                                                        <span class="text">Pedido Confirmado</span>
                                                    </div>
                                                    <div class="step active">
                                                        <span class="icon">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <span class="text"> Picked by courier</span>
                                                    </div>
                                                    <div class="step active">
                                                        <span class="icon">
                                                            <i class="fa fa-truck"></i>
                                                        </span>
                                                        <span class="text"> A caminho </span>
                                                    </div>
                                                    <div class="step">
                                                        <span class="icon">
                                                            <i class="fa fa-box"></i>
                                                        </span>
                                                        <span class="text">Pronto para pegar</span>
                                                    </div>
                                                </div>
                                                <hr>
                                                <ul class="row">
                                                    <li class="col-md-4">
                                                        <figure class="itemside mb-3">
                                                            <div class="aside">
                                                                <img src="../arquivos/fotos_produtos/Ft_produto_6226c123668ac.jpg" class="img-sm border">
                                                            </div>
                                                            <figcaption class="info align-self-center">
                                                                <p class="title">Dell Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$950 </span>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li class="col-md-4">
                                                        <figure class="itemside mb-3">
                                                            <div class="aside"><img src="https://i.imgur.com/tVBy5Q0.png" class="img-sm border"></div>
                                                            <figcaption class="info align-self-center">
                                                                <p class="title">HP Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$850 </span>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                    <li class="col-md-4">
                                                        <figure class="itemside mb-3">
                                                            <div class="aside"><img src="https://i.imgur.com/Bd56jKH.png" class="img-sm border"></div>
                                                            <figcaption class="info align-self-center">
                                                                <p class="title">ACER Laptop with 500GB HDD <br> 8GB RAM</p> <span class="text-muted">$650 </span>
                                                            </figcaption>
                                                        </figure>
                                                    </li>
                                                </ul>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Accordion Item #2
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Accordion Item #3
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                    </div>
                                </div>
                            </div>
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
    </section>
    <!-- Footer-->
    <?php 
    include "../template/footer.php";
    mysqli_close($conexao);
    ?>
</body>

</html>