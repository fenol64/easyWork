<?php $v->layout("themes/template_web"); ?>

<?php $v->start("css"); ?>
    <link rel="stylesheet" href="<?= asset("css/partners.css"); ?>">
<?php $v->end(); ?>

    <header>
        <a href="<?= $router->route('web.index') ?>" class="logo_header mt-3 ml-4">
            <img src="<?= asset('img/logo.png') ?>" width="64">
        </a>

        <div class="flex-container-header">
            <div class="text h1 ml-5 font-weight-bold margin-top-header">
                Consiga <span class="blue-bg">mais clientes</span> direto <br> do seu celular.
                <p>
                <a href="<?= $router->route('web.cadastrar' , ['type' => "P"]) ?>" class="btn btn-lg btn-outline-primary mt-5"> 
                    Cadastrar seus serviços
                </a>
            </div>
            <div class="text-right">
                <img src="<?= asset('img/partners-image-top.png') ?>" class="float-right image-top-header">
                <svg width="752" height="622" viewBox="0 0 752 622" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M252.859 169.773C821.792 -246.827 752.324 234.376 752.324 234.376V622H252.859C252.859 622 -316.074 586.372 252.859 169.773Z" fill="#68A3F1"/>
                </svg>
            </div>
            </div>
        </div>
    </header>
    <section class="how-works">
        <div class="container mt-5 mb-5 flex-container-how-work">
            <div class="left-container mt-5">
                <span class="h1"> Como funciona?</span>
                <p>
                <p class="desc-how-work">Todos os clientes que pedem por serviço na sua região aparecem <br> no seu aplicativo</p>
            </div>
            <img src="<?=asset('img/box-servico.png')?>">
        </div>
    </section>
    <section class="text-center plans pt-5 pb-5">
        <div class="text-plans-content">
            <h1>O que nos torna incrível</h1>
            <p> São profissionais que transformaram sua carreira em um sucesso, que tornaram o EasyWork a melhor <br> plataforma de serviços.</p>
        </div>
        <article class="container text-center mt-5 pt-5">
            <h1 class="mb-5">Planos</h1>
            <div class="box-plans">
                <div class="box-plan">
                    <h2 class="mb-3">Freemium</h2>
                    <img src="<?= asset('img/icons/card.png') ?>">
                    <span class="font-weight-bold">GRÁTIS</span>
                    <a href="<?= site().'/login' ?>" class="btn btn-primary"> assine </a>
                </div>
                <div class="box-plan">
                    <h2 class="mb-3">Premium</h2>
                    <img src="<?= asset('img/icons/crown.png') ?>">
                    <span class="font-weight-bold mt-2 mb-3">R$ 5,99</span>
                    <a href="<?= site().'/login' ?>" class="btn btn-primary"> assine </a>
                </div>
            </div>
        </article>
    </section>