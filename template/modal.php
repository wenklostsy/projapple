<!-- MODAL DE FATURAMENTO-->
<div class="modal" id="Modal_Faturamento" tabindex="-1" aria-labelledby="Modal_Sair" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Faturamento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-right">
          <i class="fa fa-close close" data-dismiss="modal"></i>
        </div>
        <div class="px-4 py-5">
          <!--DIA ATUAL-->
          <h5 class="text-uppercase">Faturamento de hoje dia
            <?php
            echo $diaAtual;
            ?>
          </h5>
          <div class="d-flex justify-content-between mt-3">
            <span class="font-weight-bold">Total</span>
            <span class="font-weight-bold theme-color">$2125.00</span>
          </div>
          <div class="mb-3">
            <hr class="new1">
          </div>
          <!--ULTIMO MÊS ATUAL-->
          <h5 class="text-uppercase">Faturamento do ultimo mês <?php echo $ultimoMes ?></h5>
          <div class="d-flex justify-content-between mt-3">
            <span class="font-weight-bold">Total</span>
            <span class="font-weight-bold theme-color">$2125.00</span>
          </div>
          <div class="mb-3">
            <hr class="new1">
          </div>
          <!--ULTIMO ANO-->
          <h5 class="text-uppercase">Faturamento do ultimo ano <?php echo $ultimoAno ?></h5>
          <div class="d-flex justify-content-between mt-3">
            <span class="font-weight-bold">Total</span>
            <span class="font-weight-bold theme-color">$2125.00</span>
          </div>
          <div class="mb-3">
            <hr class="new1">
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
<!-- MODAL DE DESPESAS-->
<div class="modal fade" id="Modal_Despesas" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Despesas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="px-4 py-5">
          <!--DIA ATUAL-->
          <h5 class="text-uppercase">Despesas do dia de hoje
            <?php
            echo $diaAtual;
            ?>
          </h5>
          <div class="d-flex justify-content-between mt-3">
            <span class="font-weight-bold">Total</span>
            <span class="font-weight-bold theme-color">$2125.00</span>
          </div>
          <div class="mb-3">
            <hr class="new1">
          </div>
          <!--ULTIMO MÊS ATUAL-->
          <h5 class="text-uppercase">Despesas do ultimo mês <?php echo $ultimoMes ?></h5>
          <div class="d-flex justify-content-between mt-3">
            <span class="font-weight-bold">Total</span>
            <span class="font-weight-bold theme-color">$2125.00</span>
          </div>
          <div class="mb-3">
            <hr class="new1">
          </div>
          <!--ULTIMO ANO-->
          <h5 class="text-uppercase">Despesas do ultimo ano <?php echo $ultimoAno ?></h5>
          <div class="d-flex justify-content-between mt-3">
            <span class="font-weight-bold">Total</span>
            <span class="font-weight-bold theme-color">$2125.00</span>
          </div>
          <div class="mb-3">
            <hr class="new1">
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
<!-- MODAL DOS LUCROS-->
<div class="modal fade" id="Modal_Lucro" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Lucro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        LUCRO
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#Modal_Faturamento" data-bs-toggle="modal">Faturamento</button>
        <button class="btn btn-primary" data-bs-target="#Modal_Despesas" data-bs-toggle="modal">Despesas</button>
      </div>
    </div>
  </div>
</div>