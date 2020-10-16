<?php $v->layout("themes/template_dash") ?>

<nav class="flex-container ">
    <div class="left">
    <div class="center ">
        <a id="agendado" class="itens">Agendado</a>
        <a id="andamento" class="itens">Em andamento</a>
        <a id="finalizado" class="itens">Finalizado</a>
    </div> 
    </div>
    <div class="right user_drop dropdown">
        <div class="dropdown-toggle mt-1 pr-4" id="drop_user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?=$photo?>" width="32" class="radius">
        </div>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="drop_user">
            <a class="dropdown-item disabled" href="#">Perfil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= $router->route('dash.logoff') ?>">Sair</a>
        </div>
    </div>
</nav>
<main class="flex_main_services">
    <div class="service_container">
        <a href="<?= $router->route('dash.newService') ?>" class="btn btn-success mt-4" style="width:100%;"> Solicitar serviço </a>
        <div class="root"></div>
    </div>
</main>

<?php $v->start("scripts"); ?>
    <script src="<?= asset("js/dash_reqs.js"); ?>"></script>
<?php $v->end(); ?>