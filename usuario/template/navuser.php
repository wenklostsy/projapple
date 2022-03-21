<br>
<div class="col-md-12 p-3">
    <div class="alert alert-dark" role="alert">
        <h4 class="alert-heading">Olá <?php echo $nomeUsuario ?>!</h4>
        <p>Você é cliente DashTech.</p>
    </div>
</div>
<div class="col-md-12 p-3">
    <a href="../usuario/configuracao.php">
        <div class="alert
                                <?php if (basename($_SERVER['PHP_SELF']) == "configuracao.php") {
                                    echo "alert-primary";
                                } else {
                                    echo "alert-dark";
                                } ?>" role="alert">
            <h4 class="alert-heading">Cadastro</h4>
            <p>Ver e alterar seus dados, endereço e senha</p>
        </div>
    </a>
</div>
<div class="col-md-12 p-3">
    <a href="../usuario/pedidos.php">
        <div class="alert
                                <?php if (basename($_SERVER['PHP_SELF']) == "pedidos.php") {
                                    echo "alert-primary";
                                } else {
                                    echo "alert-dark";
                                } ?>" role="alert">
            <h4 class="alert-heading">Pedidos</h4>
            <p>Acompanhar envio, status do pedido.</p>
        </div>
    </a>
</div>
<div class="col-md-12 p-3">
    <a href="../usuario/perguntas.php">
        <div class="alert
                                <?php if (basename($_SERVER['PHP_SELF']) == "perguntas.php") {
                                    echo "alert-primary";
                                } else {
                                    echo "alert-dark";
                                } ?>" role="alert">
            <h4 class="alert-heading">Perguntas Frequentes</h4>
            <p>Consultar perguntas e respostas frequentes</p>
        </div>
    </a>
</div>