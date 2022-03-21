<?php
include "../template/geral.php";
include "../process/conexao.php";
#INCLUI A API DE CEP
include_once "../template/cep.php";
?>
<title>Perfil</title>

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
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <span class="font-weight-bold"><?php echo $prodAleatorio['nome'] ?></span>
                        <span class="text-black-50"><?php echo $prodAleatorio['email'] ?></span>
                        <span> </span>
                    </div>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <!--CONTEUDO PRINCIPAL-->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Configurações de Conta</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Nome</label>
                                <input type="text" value="<?php echo $prodAleatorio['nome'] ?>" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Telefone</label>
                                <input type="text" value="<?php echo $prodAleatorio['telefone'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Email</label>
                                <input type="text" value="<?php echo $prodAleatorio['email'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Cep</label>
                                <input name="cep" type="text" id="cep" size="10" maxlength="8" value="<?php echo $prodAleatorio['cep'] ?>" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Cidade</label>
                                <input name="cidade" type="text" id="cidade" value="<?php echo $prodAleatorio['cidade'] ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Estado</label>
                                <input name="uf" type="text" id="uf" value="<?php echo $prodAleatorio['estado'] ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Rua</label>
                                <input name="rua" type="text" id="rua" value="<?php echo $prodAleatorio['rua'] ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Bairro</label>
                                <input name="bairro" type="text" id="bairro" value="<?php echo $prodAleatorio['bairro'] ?>" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Numero</label>
                                <input type="text" class="form-control" value="<?php echo $prodAleatorio['numero'] ?>">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="button">Salvar Perfil</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3">
                        <div class="d-flex justify-content-between align-items-center experience">
                            <span>Editar Senha</span>
                            <span class="border px-3 p-1 add-experience">
                                <i class="fa fa-plus"></i>&nbsp;Experience</span>
                        </div>
                        <?php
                        include "../usuario/template/navuser.php";
                        ?>
                    </div>
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