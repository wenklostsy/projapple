<?php
include "../template/modal_login.php";
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="../public/index.php">MStudio Creation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (basename($_SERVER['PHP_SELF']) == "index.php") {
                        echo "active";
                    } ?>" aria-current="page" href="../public/index.php">Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#!">Ajuda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produtos</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="../public/todos_produtos.php">Todos os produtos</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="../public/todos_produtos.php?categoria=Celular">Celulares</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../public/todos_produtos.php?categoria=Computador">MacBooks</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../public/todos_produtos.php?categoria=Fones">AirPods</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../public/todos_produtos.php?categoria=AppleWatch">Apple Watchs</a>
                        </li>
                    </ul>
                </li>
                <!--BOTÃO DE DASHBOARD-->
                <?php areaAdm(); ?>
            </ul>
            <?php
            if (!isset($_SESSION['logado'])) {
                echo "<a class='btn btn-outline-dark' data-bs-toggle='modal'
                 href='#exampleModalToggle' role='button'>Login / Cadastre-se</a>";
            } else {
                echo "
            <div class='btn-group p-1 dropend'>
            <button type='button' class='btn btn-outline-dark dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
            $nomeUsuario
            </button>
            <ul class='dropdown-menu'>
                <li><a class='dropdown-item' href='#'>Configurações</a></li>
                <li><a class='dropdown-item' href='#'>Another action</a></li>
                <li><a class='dropdown-item' href='#'>Something else here</a></li>
                <li><hr class='dropdown-divider'></li>
                <li><a class='dropdown-item' data-bs-toggle='modal' data-bs-target='#Modal_Sair' href='#'>Sair</a></li>
            </ul>
            </div>";
            }
            ?>

            <!-- Cart -->
            <?php
            if (isset($_SESSION['carrinho'])) {
                $link = key($_SESSION['carrinho']);
            } else {
                $link = "";
            }
            ?>

            <a class=" p-1 d-flex" href="../cadastros/carrinho.php?id=<?php echo $link ?>">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Carrinho
                    <span class="badge bg-dark text-white ms-1 rounded-pill">
                        <?php if (isset($_SESSION['carrinho'])) {
                            echo count($_SESSION['carrinho']);
                        } else {
                            echo 0;
                        } ?>
                    </span>
                </button>
            </a>
        </div>
    </div>
</nav>