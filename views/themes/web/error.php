<?php $v->layout("themes/template_web"); ?>

<div style="position:absolute; top:5px;left:20px;">
    <img src="<?= asset('img/logo.png') ?>" width="65">
</div>

<div class="main_container_error">
    <div class="text-center mt-5">
        <img src="<?= asset('img/img_error.jpg') ?>">
    </div>
    <div class="text-center">
        <h1 class="blue-bg font-weight-bold ">OOOOOOPS, ERRO <?= $errcode ?></h1>
        <a href="<?= site() ?>" class="btn btn-primary  mt-4 mb-4">Voltar a index</a>
    </div>
</div>