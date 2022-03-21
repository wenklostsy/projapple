<!-- Vertical Navbar -->
<nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg" id="navbarVertical">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand => EDITAR LOGO DA EMPRESA -->
        <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
            <img src="COLOCAR FOTO" alt="COLOCAR FOTO">
        </a>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidebarCollapse">
            <!-- Navegação MOBILE -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (basename($_SERVER['PHP_SELF']) == "dashboard.php") {
                        echo "active";
                    } ?>" href="../adm/dashboard.php">
                        <i class="fas fa-tachometer"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (basename($_SERVER['PHP_SELF']) == "analises.php") {
                        echo "active";
                    } ?>" href="../analitycs/analises.php">
                        <i class="fas fa-chart-line"></i> Analitycs
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                    <?php if (basename($_SERVER['PHP_SELF']) == "pedidos.php") {
                        echo "active";
                    } ?>" href="../adm/pedidos.php">
                        <i class="fas fa-user-tag"></i> Pedidos
                        <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-auto">6</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                        <?php if (basename($_SERVER['PHP_SELF']) == "usuarios.php") {
                        echo "active";
                    } ?>" href="../adm/usuarios.php">
                        
                        <i class="fas fa-users"></i> Usuários
                    </a>
                    
                </li>
            </ul>
            <!-- Divider -->
            <hr class="navbar-divider my-5 opacity-20">
            <!-- Navigation => CONTATOS -->
            <ul class="navbar-nav mb-md-4">
                <li>
                    <div class="nav-link text-xs font-semibold text-uppercase text-muted ls-wide" href="#">
                        Configurações
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (basename($_SERVER['PHP_SELF']) == "instagram.php") {
                        echo "active";
                    } ?>" href="../cadastros/instagram.php">
                        <i class="fa-brands fa-instagram"></i> Instagram
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (basename($_SERVER['PHP_SELF']) == "cad_produto.php") {
                        echo "active";
                    } ?>" href="../cadastros/cad_produto.php">
                        <i class="fas fa-check-square"></i> Produtos
                        <!--EXIBE A QUANTIDADE DE PRODUTOS COM ESTOQUE A BAIXO DO ESPECIFICADO-->
                        <?php
                        include "../process/conexao.php";
                        $comandoEstoqueMinimo = "SELECT * FROM produtos WHERE ativo = 'sim' AND estoque <=$estoqueMinimo";
                        $executaEstoqueMinimo = mysqli_query($conexao, $comandoEstoqueMinimo);
                        $numRows = mysqli_num_rows($executaEstoqueMinimo);
                        if ($numRows == 0) {
                            echo "";
                        } else {
                            echo "<span class='badge bg-soft-danger text-primary rounded-pill d-inline-flex align-items-center ms-auto'>$numRows</span>";
                        }
                        ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (basename($_SERVER['PHP_SELF']) == "entrada-material.php") {
                        echo "active";
                    } ?>" href="../estoque/entrada-material.php">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i> Entradas & Saidas
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link 
                    <?php if (basename($_SERVER['PHP_SELF']) == "fornecedores.php") {
                        echo "active";
                    } ?>" href="../estoque/fornecedores.php">
                        <i class="fa-solid fa-address-card"></i> Fornecedores
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="navbar-divider my-1 opacity-20">
            <!-- Navigation => CONTATOS -->
            <ul class="navbar-nav mb-md-4">
                <li>
                    <div class="nav-link text-xs font-semibold text-uppercase text-muted ls-wide" href="#">
                        Contatos
                        <span class="badge bg-soft-primary text-primary rounded-pill d-inline-flex align-items-center ms-4">13</span>
                    </div>
                </li>
                <li>
                    <a href="#" class="nav-link d-flex align-items-center">
                        <div class="me-4">
                            <div class="position-relative d-inline-block text-white">
                                <img alt="Image Placeholder" src="https://images.unsplash.com/photo-1548142813-c348350df52b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar rounded-circle">
                                <span class="position-absolute bottom-2 end-2 transform translate-x-1/2 translate-y-1/2 border-2 border-solid border-current w-3 h-3 bg-success rounded-circle"></span>
                            </div>
                        </div>
                        <div>
                            <span class="d-block text-sm font-semibold">
                                Marie Claire
                            </span>
                            <span class="d-block text-xs text-muted font-regular">
                                Paris, FR
                            </span>
                        </div>
                        <div class="ms-auto">
                            <i class="bi bi-chat"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>