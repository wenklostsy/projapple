<?php
if (!isset($_SESSION['logado'])) {
?>
  <!--MODAL DE LOGIN-->
  <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!--FORMULARIO DE LOGIN-->
          <form action="../process/login.php" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Senha</label>
              <input name="senha" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
          </form>
        </div>
        <div class="modal-footer">
          <p>Não possui uma conta? Cadastre-se já!</p>
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Cadastre-se</button>
        </div>
      </div>
    </div>
  </div>
  <!--MODAL DE CADASTRO-->
  <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel2">Cadastre-se</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!---FORMULARIO DE CADASTRO-->
          <form action="../process/cad_user.php" method="post">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Nome</label>
              <input name="nome" type="text" class="form-control" aria-describedby="name">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Telefone</label>
              <input name="telefone" type="text" class="form-control" aria-describedby="telefone">
            </div>
            <div class="">
              <label for="validationCustom01" class="form-label">CEP (SEM HÍFEN)</label>
              <input name="cep" type="text" id="cep" size="10" maxlength="8" class="form-control">
            </div>
            <div class="">
              <label for="validationCustom01" class="form-label">Cidade</label>
              <input name="cidade" type="text" id="cidade" class="form-control" readonly required>
            </div>
            <div class="">
              <label for="validationCustom01" class="form-label">Estado</label>
              <input name="uf" type="text" id="uf" class="form-control" readonly required>
            </div>
            <div class="">
              <label for="validationCustom01" class="form-label">Rua</label>
              <input name="rua" type="text" id="rua" class="form-control" readonly required>
            </div>
            <div class="">
              <label for="validationCustom01" class="form-label">Bairro</label>
              <input name="bairro" type="text" id="bairro" class="form-control" readonly required>
            </div>
            <div class="">
              <label for="validationCustom01" class="form-label">Numero</label>
              <input type="text" name="numero" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email</label>
              <input name="email" type="email" class="form-control" aria-describedby="email">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Senha</label>
              <input name="senha" type="password" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit">Cadastrar</button>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Login</button>
        </div>
      </div>
    </div>
  </div>
<?php
} else {
?>
  <!-- MODAL DE SAIR-->
  <div class="modal" id="Modal_Sair" tabindex="-1" aria-labelledby="Modal_Sair" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!--EXIBE O NOME DO USUÁRIO-->
          Olá <?php echo $nomeUsuario ?>, você tem certeza que deseja sair?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a href="../process/sair.php">
            <button type="button" class="btn btn-primary"> Sim </button>
          </a>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>