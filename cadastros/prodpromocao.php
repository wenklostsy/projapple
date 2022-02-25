<?php
#INSERE O ARQUIVO HEADER
include "../template/geral.php";
#VERIFICA SE O USUÁRIO POSSUI ACESSO
verificaAcesso();
#INCLUI OS ARQUIVOS MODAIS
include "../template/modal.php";
#INCLUI O ARQUIVO DE CONEXAO
include "../process/conexao.php";
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
                                <a href="../cadastros/cad_produto.php" class="nav-link font-regular">Principal</a>
                            </li>
                            <li class="nav-item">
                                <a href="../cadastros/prodpromocao.php" class="nav-link active">Produtos em Desconto</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>
            <!--Main-->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!--CONTEUDO PRINCIPAL-->
                    <!--EXIBE MENSAGEM AS MENSAGENS-->
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>
                    <div class="card shadow border-0 mb-7">
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="d-none d-md-table-cell" scope="col">Id</th>
                                        <th scope="col">Nome</th>
                                        <th class="d-none d-md-table-cell" scope="col">Valor</th>
                                        <th class="d-none d-md-table-cell" scope="col">Valor do Desconto</th>
                                        <th class="d-none d-md-table-cell" scope="col">% De desconto</th>
                                        <th class="d-none d-md-table-cell" scope="col">Valor final</th>
                                        <th class="d-none d-md-table-cell" scope="col">Estoque</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <?php
                                $comandoUltimosRegistros = "SELECT * FROM produtos WHERE valor_desconto > 1 ORDER BY idprodutos DESC";
                                $executaRegistros = mysqli_query($conexao, $comandoUltimosRegistros);
                                $numRows = mysqli_num_rows($executaRegistros);

                                if ($numRows == 0) {
                                    echo "<div class='alert alert-primary' role='alert'>
                                    Estamos desenvolvendo novos produtos, aguarde! :)
                                </div>";
                                } else {
                                    while ($ultimosRegistros = mysqli_fetch_assoc($executaRegistros)) {
                                        $valorDesconto = ($ultimosRegistros['valor_desconto'] / 100);
                                        $valorInicial = ($ultimosRegistros['valor'] / 100);
                                        $porcentagem = $valorDesconto / $valorInicial * 100;
                                ?>
                                        <tbody>
                                            <tr>
                                                <th class="d-none d-md-table-cell" scope="row"><?php echo $ultimosRegistros['idprodutos'] ?></th>
                                                <th scope="row"><?php echo $ultimosRegistros['nome'] ?></th>
                                                <td class="d-none d-md-table-cell"><?php echo  number_format($ultimosRegistros['valor'] / 100, 2, ',', '.') ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo  number_format($ultimosRegistros['valor_desconto'] / 100, 2, ',', '.') ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo ceil($porcentagem). "%" ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo  number_format(($ultimosRegistros['valor'] - $ultimosRegistros['valor_desconto']) / 100, 2, ',', '.') ?></td>
                                                <td class="d-none d-md-table-cell"><?php echo $ultimosRegistros['estoque'] ?></td>
                                                <td>
                                                    <!-- BOTÃO DE EDITAR PRODUTO -->
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_editar<?php echo $ultimosRegistros['idprodutos'] ?>">
                                                        <i class=" fas fa-edit btn-primary p-2 rounded"></i>
                                                    </a>
                                                    <!-- BOTÃO DE APAGAR PRODUTO -->
                                                    <a type="button" data-bs-toggle="modal" data-bs-target="#modal_apagar<?php echo $ultimosRegistros['idprodutos'] ?>">
                                                        <i class="fas fa-trash btn-danger p-2 rounded"></i>
                                                    </a>
                                                    <a type="button">
                                                        <i class="fas fa-coins btn-info p-2 rounded"></i>
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
                                        <!-- MODAL DE EDITAR -->
                                        <div class="modal fade" id="modal_editar<?php echo $ultimosRegistros['idprodutos'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header text-light apagarModal">
                                                        <h5 class="modal-title" id="exampleModalLabel">Apagar: <?php echo $ultimosRegistros['nome'] ?></h5>
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
                                                                <label for="validationServer05" class="form-label">Especificações Técnicas (500 caracteres)</label>
                                                                <textarea name="descricao" class="form-control" id="message-text"></textarea>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="validationServer01" class="form-label">Estoque</label>
                                                                <input name="estoque" type="text" class="form-control">
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
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                                        <a class="btn btn-danger" href="../process/apagar_prod.php?id=<?php echo $ultimosRegistros['idprodutos'] ?>">Apagar</a>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                    }
                                }
                                    ?>
                            </table>
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
                                    <label for="validationServer05" class="form-label">Especificações Técnicas (500 caracteres)</label>
                                    <textarea name="descricao" class="form-control" id="message-text"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="validationServer01" class="form-label">Estoque</label>
                                    <input name="estoque" type="text" class="form-control">
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