<?php $v->layout("themes/template_web"); ?>

<?php $v->start("css"); ?>
    <link rel="stylesheet" href="<?= asset("css/services.css"); ?>">
<?php $v->end(); ?>
<div class="main">
    <header class="flex-terms pb-5">
        <a href="<?= $router->route('web.index') ?>" class="mt-3 ml-5">
            <img src="<?= asset('img/logo.png') ?>" width="64">
        </a>
        <div class="mr-5">
            <a href="<?= $router->route('web.partners') ?>" class="btn btn-lg btn-outline-primary">
                Cadastrar profissional
            </a>
        </div>
    </header>
    <div class="main">
        <div class="main_margin">
            <h1 class="h1 blue-bg">Precisando de Profissionais em <br> <?= $name ?>? </h1>
        </div>
        <div class="services pb-5 mb-5 text-center">
            <h2 class="h2 mt-4 mb-3">Qual serviço de <?= $name ?> está precisando?</h2>
            <?php if (!is_string($search)):
                foreach ($search as $service): ?>
                    <div class="service">
                        <div class="service_left font-weight-bold">
                            <?= $service->name_category ?>
                        </div>
                        <div class="service_right">
                            <a href="<?= $router->route('web.login') ?>">
                                <img src="<?= asset('img/icons/arrow-service.png') ?>" alt="">
                            </a>
                        </div>
                    </div>
                <?php endforeach;
            else:?>
                <div class="mt-4 h4">
                    <?= $search; ?>
                </div>
            <?php endif;?>
        </div>
    </div>
</div>