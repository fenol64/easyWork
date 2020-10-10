<?php $v->layout("themes/template_auth"); ?>
<?php $v->start("css"); ?>
    <link rel="stylesheet" href="<?= asset("css/login.css"); ?>">
<?php $v->end(); ?>
<div class="main">
    <div class="form-figure">
        <a href="<?= $router->route('web.index') ?>" class="logo">
            <img src="<?= asset('img/logo.png') ?>" width="65">
        </a>
        <img src="<?= asset('img/login_main.png') ?>" class="image_login">
    </div>
    <div class="login_container text-center">
        <h1 class="mb-4 blue-bg">Faça o login</h1>
        <form action="<?=site().'/login'?>" method="post" id="login_form">
            <input type="email" name="email" id="email"  name="email" class="w-100 my-input" placeholder="Digite seu email">
            <input type="password" name="passwd" id="passwd" name="passwd" class="w-100 my-input mb-2" placeholder="Digite sua senha">
            <a href="<?= site() .'/recuperar' ?>" class="w-100 pt-3 pb-3"> esqueceu a senha? </a>
            <button id="send" class="btn-lg btn-primary w-100 mt-2">entrar</button>
        </form>
        <div class="midias mt-4">
            <div class=" mb-4 midia-box">
                <a href="<?=$router->route('auth.google') ?>">
                    <img src="<?= asset('img/icons/google-logo.png') ?>" width="30">
                    login com o google
                </a>
            </div>
            <div class="midia-box facebook">
                <a href="<?=$router->route('auth.facebook') ?>">
                    <img src="<?= asset('img/icons/facebook-logo.png') ?>" width="30">
                    login com o facebook
                </a>
            </div>
        </div>
    </div>
</div>
