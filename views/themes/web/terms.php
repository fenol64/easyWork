<?php $v->layout("themes/template_web"); ?>

<?php $v->start("css"); ?>
    <link rel="stylesheet" href="<?= asset("css/services.css"); ?>">
<?php $v->end(); ?>

<header  class="flex-terms">
    <a href="<?= $router->route('web.index') ?>" class="mt-3 ml-5">
        <img src="<?= asset('img/logo.png') ?>" width="64">
    </a>
    <div class="mr-5">
        <a href="<?= $router->route('web.partners') ?>" class="btn btn-lg btn-outline-primary">
            Cadastrar profissional
        </a>
    </div>
</header>
<section class="terms mt-5">
    <h1 class="text-center blue-bg"> Termos de uso </h1>

</section>