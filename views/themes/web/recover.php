<?php $v->layout("themes/template_auth"); ?>

<?php $v->start("css"); ?>
    <link rel="stylesheet" href="<?= asset("css/recover.css"); ?>">
<?php $v->end(); ?>


<a href="<?= $router->route('web.index') ?>" class="logo_header  ml-4 position-absolute">
    <img src="<?= asset('img/logo.png') ?>" width="64">
</a>


<div class="main_container">
    <p class="h4 mb-3 blue-bg"> Digite seu email para recuperar sua senha </p>
    <?= flash() ?>
    <form action="<?= site() .'/forget' ?>">
        <input type="email" name="email_recover" class="myinput" placeholder="digite seu email">
        <button class="btn btn-primary mt-2"> Enviar </button>
    </form>
</div>