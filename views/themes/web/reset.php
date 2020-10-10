<?php /** @var TYPE_NAME $v */
$v->layout("themes/template_auth"); ?>

<?php $v->start("css"); ?>
    <link rel="stylesheet" href="<?= asset("css/recover.css"); ?>">
<?php $v->end(); ?>

<a href="<?= $router->route('web.index') ?>" class="logo_header  ml-4 position-absolute">
    <img src="<?= asset('img/logo.png') ?>" width="64">
</a>

<div class="main_container">
    <?= flash() ?>
    <p class="h4 mb-3 blue-bg"> Digite seu email para recuperar sua senha </p>
    <form action="<?= $router->route('auth.reset') ?>">
        <input type="password" name="password" class="myinput" placeholder="digite sua senha">
        <input type="password" name="password_re" class="myinput" placeholder="redigite sua senha">
        <button class="btn btn-primary mt-2"> Enviar </button>
    </form>
</div>