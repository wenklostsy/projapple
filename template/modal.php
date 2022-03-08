<!-- MODAL DE FATURAMENTO -->
<div class="modal fade" id="Modal_Faturamento" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header text-light apagarModal">
        <h5 class="modal-title" id="exampleModalLabel">Faturamento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row g-3">
        <div class="col-md-6">
          <label for="validationServer04" class="form-label">Faturamento de hoje</label>
          <div class="alert alert-dark" role="alert">

          </div>
        </div>
        <div class="col-md-6">
          <label for="validationServer04" class="form-label">Faturamento do ultimo mês <?php echo $ultimoMes ?></label>
          <div class="alert alert-dark" role="alert">

          </div>
        </div>
        <div class="col-md-6">
          <label for="validationServer04" class="form-label">Faturamento do ultimo ano <?php echo $ultimoAno ?></label>
          <div class="alert alert-dark" role="alert">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#Modal_Despesas" data-bs-toggle="modal">Despesas</button>
        <button class="btn btn-primary" data-bs-target="#Modal_Lucro" data-bs-toggle="modal">Lucro</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL DE DESPESAS -->
<div class="modal fade" id="Modal_Despesas" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header text-light apagarModal">
        <h5 class="modal-title" id="exampleModalLabel">Despesas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row g-3">
        <div class="col-md-6">
          <label for="validationServer04" class="form-label">Despesas desse mês</label>
          <div class="alert alert-dark" role="alert">
            R$: <?php echo number_format($verificaGasto['total'] / 100, 2, ",", ".") ?>
          </div>
        </div>
        <div class="col-md-6">
          <label for="validationServer04" class="form-label">Despesas do ultimo mês <?php echo $ultimoMes ?></label>
          <div class="alert alert-dark" role="alert">
            R$: <?php echo number_format($verificaGastoMesAnterior['total'] / 100, 2, ",", ".") ?>
          </div>
        </div>
        <div class="col-md-6">
          <label for="validationServer04" class="form-label">Despesas do ultimo ano <?php echo $ultimoAno ?></label>
          <div class="alert alert-dark" role="alert">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#Modal_Faturamento" data-bs-toggle="modal">Faturamento</button>
        <button class="btn btn-primary" data-bs-target="#Modal_Lucro" data-bs-toggle="modal">Lucro</button>
      </div>
    </div>
  </div>
</div>
<!-- MODAL DE LUCRO -->
<div class="modal fade" id="Modal_Lucro" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header text-light apagarModal">
        <h5 class="modal-title" id="exampleModalLabel">Lucro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row g-3">
        <div class="col-md-6">
          <label for="validationServer04" class="form-label">Lucro</label>
          <div class="alert alert-dark" role="alert">

          </div>
        </div>
        <div class="col-md-6">
          <label for="validationServer04" class="form-label">Faturamento do ultimo mês <?php echo $ultimoMes ?></label>
          <div class="alert alert-dark" role="alert">

          </div>
        </div>
        <div class="col-md-6">
          <label for="validationServer04" class="form-label">Faturamento do ultimo ano <?php echo $ultimoAno ?></label>
          <div class="alert alert-dark" role="alert">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#Modal_Faturamento" data-bs-toggle="modal">Faturamento</button>
        <button class="btn btn-primary" data-bs-target="#Modal_Despesas" data-bs-toggle="modal">Despesas</button>
      </div>
    </div>
  </div>
</div>