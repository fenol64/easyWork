<h1 class="blue-bg ml-2"> Suporte </h1>
<hr>
<button class="btn btn-success ml-4" data-toggle="modal" data-target="#exampleModal"> Fazer uma pergunta </button>
<div class="d-flex flex-wrap justify-content-center">
    <?php if ($questions): ?>
        <?php foreach ($questions as $question): ?>
            <div class="card m-2" style="width: 28rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $question->question ?></h5>
                    <?php if ($question->anwser != ''): ?>
                        <p class="card-text"><?= $question->anwser ?></p>
                    <?php else:  ?>
                        <div class="card-text" id="<?= $question->id_support ?>"></div>
                        <div class="msg">
                            Aguardando a resposta    
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h2>Não há posts cadastrados</h2>
    <?php endif;?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar uma pergunta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" placeholder="Digite a sua pergunta" class="w-100 p-2" id="question">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Perguntar!</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">fechar</button>
      </div>
    </div>
  </div>
</div>