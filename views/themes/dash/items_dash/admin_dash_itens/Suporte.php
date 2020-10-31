<h1 class="blue-bg ml-2"> Suporte </h1>
<hr>
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
                        <div class="msg"></div>
                        <textarea class="d-block w-100" rows="4" id="<?= $question->id_support ?>" placeholder="Responder"></textarea>
                        <button class="btn-sm btn-success mt-3" id="<?= $question->id_support ?>"  onclick="awnser(<?= $question->id_support ?>)"> Responder </button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <h2>Não há posts cadastrados</h2>
    <?php endif;?>
</div>