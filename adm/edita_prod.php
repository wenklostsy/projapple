<?php
#INSERE O ARQUIVO HEADER
include "../template/geral.php";
#VERIFICA SE O USUÁRIO POSSUI ACESSO
verificaAcesso();
#INCLUI A CONEXAO
include "../process/conexao.php";

$id = $_GET['id'];
#VERIFICA SE EXISTE A ID
verificaId($id);

#COMANDO DA TABELA DE PRODUTO
$selecionaProdutoComando = "SELECT * FROM produtos WHERE idprodutos = $id";
#EXECUTA A QUERY
$ProdutoGeral = mysqli_query($conexao, $selecionaProdutoComando);
#EXECUTA A QUERY
$Produto = mysqli_fetch_assoc($ProdutoGeral);
#VERIFICA A QUANTIDADE DE LINHAS QUE POSSUI
$numlinhasProdutos = mysqli_num_rows($ProdutoGeral);

?>
<title>Edição: <?php echo $Produto['nome']; ?></title>

<body>
    <!-- Navbar-->
    <?php
    include_once "../template/navbar.php";
    ?>
    <!--DIV DO CONTEUDO PRINCIPAL DO DASHBOARD-->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!--MENU LATERAL ADM-->
        <?php include "../template/adm_dash.php" ?>
        <!-- CONTEUDO PRINCIPAL -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- TITULO DA ABA ATUAL DO DASHBOARD -->
                                <h1 class="h2 mb-0 ls-tight">Editar: <?php echo $Produto['nome']; ?></h1>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs overflow-x border-0">
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">Edição de Produto</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-4 bg-surface-secondary">
                <div class="container-fluid">
                    <!--EXIBE MENSAGEM AS MENSAGENS-->
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <form action="../process/proc_edita_produto.php?id=<?php echo $id ?>" method="POST" class="row g-3 needs-validation" novalidate>
                        <div class="col-md-3">
                            <label for="validationCustom01" class="form-label">Nome</label>
                            <input name="nome" type="text" class="form-control" value="<?php echo $Produto['nome']; ?>" required>
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom04" class="form-label">Categoria</label>
                            <select class="form-select" name="categoria" required>
                                <option selected value="<?php echo $Produto['categoria']; ?>"><?php echo $Produto['categoria']; ?></option>
                                <option value="Celular">Celular</option>
                                <option value="AppleWatch">AppleWatch</option>
                                <option value="Fones">Fones</option>
                                <option value="Computador">Computador</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom04" class="form-label">Ativo</label>
                            <select name="ativo" class="form-select" required>
                                <option selected value="<?php echo $Produto['ativo']; ?>"><?php echo $Produto['ativo']; ?></option>
                                <option value="sim">Sim</option>
                                <option value="nao">Não</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom01" class="form-label">Estoque</label>
                            <input type="text" class="form-control" name="estoque" value="<?php echo $Produto['estoque']; ?>" required>
                        </div>
                        <div class="col-md-2">
                            <label for="validationCustom01" class="form-label">Valor</label>
                            <input type="text" class="form-control" name="valor" value="<?php echo number_format($Produto['valor'] / 100, 2, ",", "."); ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="validationServer05" class="form-label">Descrição Curta (255 Caracteres)</label>
                            <textarea name="descricao" rows="6" value="<?php echo $Produto['descricao']; ?>" class="form-control" id="message-text"><?php echo $Produto['descricao']; ?></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="validationServer05" class="form-label">Especificações Técnicas (550 Caracteres)</label>
                            <textarea name="especificacao" rows="6" class="form-control" id="message-text"><?php echo $Produto['especificacao']; ?></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Editar Produto</button>
                        </div>
                    </form>
                    <!--FOTO PRINCIPAL-->
                    <div class="row g-3 container">
                        <div class="col-xxl-6 col-xl-5 col-md-6 col-lg-6 col-md-6">
                            <label for="validationCustom01" class="form-label">Foto Principal</label>
                            <div class="card">
                                <div class="px-2 pt-2 position-relative">
                                    <img alt="..." src="../arquivos/fotos_produtos/<?php echo $Produto['principal']; ?>" class="card-img imgcard">
                                </div>
                                <div class="card-body">
                                    <form action="../process/proc_edita_imagem.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                        <div class="input-group mb-3">
                                            <input type="file" name="principal" class="form-control" placeholder="" aria-label="Example text with two button addons">
                                            <button class="btn btn-outline-success" type="submit" name="acaoprincipal" id="button-addon2">Trocar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--SEGUNDA FOTO-->
                        <div class="col-xxl-6 col-xl-5 col-md-6 col-lg-6 col-md-6">
                            <label for="validationCustom01" class="form-label">Foto Secundaria</label>
                            <div class="card">
                                <div class="px-2 pt-2 position-relative">
                                    <?php
                                    if ($Produto['img2'] == "") {
                                        echo "NENHUMA IMAGEM SELECIONADA";
                                    } else {
                                    ?>
                                        <img alt="..." src="../arquivos/fotos_produtos/<?php echo $Produto['img2']; ?>" class="card-img imgcard">
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                        <?php
                                        if ($Produto['img2'] == "") {
                                        ?>
                                            <form action="../process/proc_edita_imagem.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                                <input type="file" name="dois" class="form-control" placeholder="" aria-label="Example text with two button addons">
                                                <button class="btn btn-outline-success" type="submit" name="segundacao" id="button-addon2">Nova Foto</button>
                                            </form>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="../process/proc_apaga_imagem.php?secundaria=<?php echo $id ?>">
                                                <button class="btn btn-outline-danger mt-auto" type="button" id="button-addon2">Apagar</button>
                                            </a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--TERCEIRA FOTO-->
                        <div class="col-xxl-6 col-xl-5 col-md-6 col-lg-6 col-md-6">
                            <label for="validationCustom01" class="form-label">Terceira Foto</label>
                            <div class="card">
                                <div class="px-2 pt-2 position-relative">
                                    <?php
                                    if ($Produto['img3'] == "") {
                                        echo "NENHUMA IMAGEM SELECIONADA";
                                    } else {
                                    ?>
                                        <img alt="..." src="../arquivos/fotos_produtos/<?php echo $Produto['img3']; ?>" class="card-img imgcard">
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="card-body">
                                    <?php
                                    if ($Produto['img3'] == "") {
                                    ?>
                                        <div class="input-group mb-3">
                                            <form action="../process/proc_edita_imagem.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                                                <input type="file" name="tres" class="form-control" placeholder="" aria-label="Example text with two button addons">
                                                <button class="btn btn-outline-success" type="submit" name="terceiraacao" id="button-addon2">Nova Foto</button>
                                            </form>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="../process/proc_apaga_imagem.php?terceira=<?php echo $id ?>">
                                            <button class="btn btn-outline-danger mt-auto" type="button" id="button-addon2">Apagar</button>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>

<?php
mysqli_close($conexao);
?>