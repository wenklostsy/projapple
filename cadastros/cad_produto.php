<?php
#INSERE O ARQUIVO HEADER
include "../template/geral.php";
#VERIFICA SE O USUÁRIO POSSUI ACESSO
verificaAcesso();
#INCLUI O ARQUIVO DE CONEXAO
include "../process/conexao.php";
#CRIA O COMANDO DE PAGINAÇÃO PARA A FUNÇÃO SER REALIZADA COM A TABELA ESPECIFICA
$comandoPaginacao = "SELECT * FROM produtos ORDER BY idprodutos DESC";
#SELECIONA A QUANTIDADE DE REGISTROS A SEREM EXIBIDOS
$totalDePaginas = 10;
#INCLUI A PAGINAÇÃO
include "../template/paginacao.php";
?>
<title>Dashboard</title>

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
                                <h1 class="h2 mb-0 ls-tight">Cadastro de Produtos</h1>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs overflow-x border-0">
                            <li class="nav-item ">
                                <a href="../cadastros/cad_produto.php" class="nav-link active">Principal</a>
                            </li>
                            <li class="nav-item">
                                <a href="../cadastros/prodpromocao.php" class="nav-link font-regular">Produtos em Desconto</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!--Main-->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!--EXIBE MENSAGEM AS MENSAGENS-->
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <!--CONTEUDO PRINCIPAL-->
                    <!-- BOTÃO DE CADASTRO DE PRODUTO -->
                    <button type="button" class="btn btn-primary p-3 m-3" data-bs-toggle="modal" data-bs-target="#novo_registro">
                        Novo Produto
                    </button>
                    <div class="card shadow border-0 mb-7">
                        <div class="table-responsive">
                            <?php
                            $comandoUltimosRegistros = "SELECT * FROM produtos ORDER BY idprodutos DESC";
                            $executaRegistros = mysqli_query($conexao, $comandoUltimosRegistros);
                            $numRows = mysqli_num_rows($executaRegistros);

                            if ($numRows == 0) {
                                echo "<div class='alert alert-primary' role='alert'>
                                    Nenhum produto cadastrado, insira seu produto clicando no botão <b>Novo Produto</b>.
                                </div>";
                            } else {
                            ?>
                                <table class="table table-hover table-nowrap">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="d-none d-md-table-cell" scope="col">Id</th>
                                            <th scope="col">Nome</th>
                                            <th class="d-none d-md-table-cell" scope="col">Valor</th>
                                            <th class="d-none d-md-table-cell" scope="col">Estoque</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    while ($ultimosRegistros = mysqli_fetch_assoc($limite)) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <th class="d-none d-md-table-cell" scope="row"><?php echo $ultimosRegistros['idprodutos'] ?></th>
                                                <th scope="row"><?php echo $ultimosRegistros['nome'] ?></th>
                                                <td class="d-none d-md-table-cell"><?php echo  number_format($ultimosRegistros['valor'] / 100, 2, ',', '.') ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo $ultimosRegistros['estoque'] ?></td>
                                                <td>
                                                    <!-- BOTÃO DE VISUALIZAR PRODUTO -->
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_editar<?php echo $ultimosRegistros['idprodutos'] ?>">
                                                        <i class="fa-solid fa-eye btn-info p-2 rounded"></i>
                                                    </a>
                                                    <!-- BOTÃO DE EDITAR PRODUTO -->
                                                    <a type="button" data-bs-toggle="modal" href="../adm/edita_prod.php?id=<?php echo $ultimosRegistros['idprodutos'] ?>">
                                                        <i class=" fas fa-edit btn-primary p-2 rounded"></i>
                                                    </a>
                                                    <!-- BOTÃO DE APAGAR PRODUTO -->
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_apagar<?php echo $ultimosRegistros['idprodutos'] ?>">
                                                        <i class="fas fa-trash btn-danger p-2 rounded"></i>
                                                    </a>
                                                    <!--BOTÃO DE PROMOÇÃO DE PRODUTO-->
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_Promo<?php echo $ultimosRegistros['idprodutos'] ?>">
                                                        <i class="fas fa-coins btn-warning p-2 rounded"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!-- MODAL DE APAGAR -->
                                        <div class="modal fade" id="modal_apagar<?php echo $ultimosRegistros['idprodutos'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollablea">
                                                <div class="modal-content">
                                                    <div class="modal-header text-light apagarModal">
                                                        <h5 class="modal-title" id="exampleModalLabel">Apagar: <?php echo $ultimosRegistros['nome'] ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Você tem certeza que deseja apagar <b><?php echo $ultimosRegistros['nome'] ?></b>? Todos os dados vinculados a esse produto serão apagados.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                        <a class="btn btn-danger" href="../process/apagar_prod.php?id=<?php echo $ultimosRegistros['idprodutos'] ?>">Apagar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- MODAL DE PROMOÇÃO-->
                                        <div class="modal fade" id="modal_Promo<?php echo $ultimosRegistros['idprodutos'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollablea">
                                                <div class="modal-content">
                                                    <div class="modal-header text-light apagarModal">
                                                        <h5 class="modal-title" id="exampleModalLabel">Promoção: <?php echo $ultimosRegistros['nome'] ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="../produto/desconto.php?id=<?php echo $ultimosRegistros['idprodutos'] ?>" method="POST" class="d-flex">
                                                            <label for="formFile" class="form-label">Inicio da Promoção</label>
                                                            <input class="form-control" type="date" value="<?php echo date("$diaInput[2]-$diaInput[1]-$diaInput[0]") ?>" name="promoini" id="formFile">
                                                            <label for="formFile" class="form-label">Fim da Promoção</label>
                                                            <input class="form-control" type="date" name="promofim" id="formFile">
                                                            <label for="formFile" class="form-label">Total de Desconto</label>
                                                            <input class="form-control" type="text" name="valordesconto" id="formFile">
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                                <button class="btn btn-outline-success" type="submit" name="acaoprincipal" id="button-addon2">Iniciar Promoção</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- MODAL DE VISUALIZAR -->
                                        <div class="modal fade" id="modal_editar<?php echo $ultimosRegistros['idprodutos'] ?>" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header text-light apagarModal">
                                                        <h5 class="modal-title" id="exampleModalLabel">Dados: <?php echo $ultimosRegistros['nome'] ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body row g-3">
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Categoria</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo $ultimosRegistros['categoria'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Situação, produto esta ativo?</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo $ultimosRegistros['ativo'] ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Quantidade em estoque</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo $ultimosRegistros['estoque'] . " Itens em estoque." ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Preço Original</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                R$: <?php echo number_format($ultimosRegistros['valor'] / 100, 2, ",", ".") ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Inicio do ultimo desconto</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo date("d/m/Y", strtotime($ultimosRegistros['promo_ini'])) ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Término do ultimo desconto</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo date("d/m/Y", strtotime($ultimosRegistros['promo_fim'])) ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Data de Cadastro</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo date("d/m/Y", strtotime($ultimosRegistros['data_cad'])) ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="validationServer04" class="form-label">Dada da ultima modificação</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo date("d/m/Y", strtotime($ultimosRegistros['data_edit'])) ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="validationServer04" class="form-label">Descrição</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo nl2br($ultimosRegistros['descricao']) ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="validationServer04" class="form-label">Especificações Técnicas</label>
                                                            <div class="alert alert-dark" role="alert">
                                                                <?php echo nl2br($ultimosRegistros['especificacao']) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }
                                ?>
                                </table>
                                <?php
                                if ($numRows > 0) {
                                ?>
                                    <div class="card-footer border-0 py-5">
                                        <?php
                                        paginacao($anterior, $proximo, $pc, $tp);
                                        ?>
                                    </div>
                                <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
            </main>
            <!-- MODAL DE CADASTRO -->
            <div class="modal fade" id="novo_registro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Novo Registro</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../process/cad_produto.php" method="POST" enctype="multipart/form-data" class="row g-3">
                                <div class="col-md-4">
                                    <label for="validationServer01" class="form-label">Nome</label>
                                    <input name="nome" type="text" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label for="validationServer04" class="form-label">Categoria</label>
                                    <select name="categoria" class="form-select">
                                        <option selected disabled value="">Selecione uma Categoria</option>
                                        <option value="Celular">Celular</option>
                                        <option value="AppleWatch">AppleWatch</option>
                                        <option value="Fones">Fones</option>
                                        <option value="Computador">Computador</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationServer01" class="form-label">Ativo</label>
                                    <select name="ativo" class="form-select">
                                        <option selected disabled value="">Selecione uma Categoria</option>
                                        <option value="sim">Sim</option>
                                        <option value="nao">Não</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationServer05" class="form-label">Descrição Curta (255 Caracteres)</label>
                                    <textarea name="descricao" class="form-control" id="message-text"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="validationServer05" class="form-label">Especificações Técnicas (550 Caracteres)</label>
                                    <textarea name="especificacao" class="form-control" id="message-text"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationCustomUsername" class="form-label">Valor</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">R$:</span>
                                        <input type="text" class="form-control" name="valor" aria-describedby="inputGroupPrepend" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="formFile" class="form-label">Imagem Principal</label>
                                    <input class="form-control" type="file" name="principal" id="formFile">
                                </div>
                                <div class="col-md-4">
                                    <label for="formFile" class="form-label">Imagem 2</label>
                                    <input class="form-control" type="file" name="img_dois" id="formFile">
                                </div>
                                <div class="col-md-4">
                                    <label for="formFile" class="form-label">Imagem 3</label>
                                    <input class="form-control" type="file" name="img_tres" id="formFile">
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary" name="acao" type="submit">Cadastrar</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>