<?php $v->start("scripts"); ?>
    <script src="<?= asset("js/dash_reqs.js"); ?>"></script>
<?php $v->end(); ?>

<nav class="flex-container-partner">

    <a id="agendado" class="navbar_link">Agendado</a>
    <a id="andamento" class="navbar_link">Em andamento</a>
    <a id="finalizado" class="navbar_link">Finalizado</a>
    
</nav>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalhes do serviço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pl-4">
        <div class="titulo">
            <h4> Titulo: </h4>
            <p id="titulo" class="ml-4"></p>
        </div>
        <div class="desc">
            <h4> Descrição: </h4>
            <p id="Desc" class="ml-4 w-100"></p>
        </div>
        <div class="tags">
            <h4> Tags: </h4>
            <p id="tags" class="mt-4 ml-4"></p>
        </div>
        <div class="partner">
            <h4>Parceiro:</h4>
            <div class="row mt-2">
                <div class="col-4 text-right">
                    <img id="pic">
                </div>
                <div class="col">
                    <h5>Nome:</h5>
                    <div id="nome_partner" class="ml-4"></div>
                    <h5>Descrição:</h5>
                    <div id="desc_partner" class="ml-4"></div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script src="<?= asset("js/dash_reqs.js"); ?>"></script>
