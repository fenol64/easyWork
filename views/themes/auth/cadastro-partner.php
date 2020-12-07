<?php $v->layout("themes/template_auth"); ?>

<?php $v->start("css"); ?>
    <link rel="stylesheet" href="<?= asset("css/sign-up-partner.css"); ?>">
<?php $v->end(); ?>

<div class="ml-4 mt-2 position-absolute">
    <a href="<?= $router->route('web.index') ?>" class="logo">
        <img src="<?= asset('img/logo.png') ?>" width="65">
    </a>
</div>

<div class="main text-center w-100">
    <form action="<?= site().'/register-partner' ?>" method="post" enctype="multipart/form-data">
        <label for="profilepic" class="d-block text-center">
            <div class="image_preview">
                <img src="<?= asset('/img/icons/avatar.png') ?>" id="img_preview" width="60">
                <input type="file" id="profilepic" accept="image/png, image/jpeg" class="d-none" required>
                
            </div>
        </label>
        Foto de perfil
        <input type="text" name="mei" id="mei" placeholder="Digite seu MEI" class="w-100">
        <ul class="todos-body">
            <li>Aqui vai aparecer suas capacitações</li>
        </ul>
        <input type="text" name="capable" class="todo-name" placeholder="Digite suas capacitações">
        <button type="button" id="button" class="btn btn-primary"> adicionar </button>
        <button class="btn btn-success w-100" type="submit" > Cadastrar! </button>
    </form>
</div>
<?php $v->start("scripts"); ?>
    <script src="<?= asset("js/todo.js"); ?>"></script>
    <script src="<?= asset("js/reqs.js"); ?>"></script>
<?php $v->end(); ?>
