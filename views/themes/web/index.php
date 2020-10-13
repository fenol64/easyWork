<?php $v->layout("themes/template_web"); ?>

<?php $v->start("css"); ?>
<link rel="stylesheet" href="<?= asset("css/libs/glide.core.min.css"); ?>">
<link rel="stylesheet" href="<?= asset("css/libs/glide.theme.min.css"); ?>">
    <link rel="stylesheet" href="<?= asset("css/index.css"); ?>">
<?php $v->end(); ?>

    <header class="header_content">
        <nav class="mynav pt-4">
            <ul class="nav-list">
                <li class="nav-list-item">
                    <a href="<?= $router->route('web.partners') ?>">Parceiros</a>
                </li>
                <li class="nav-list-item">
                    <a href="<?= $router->route('web.services', ['service' => 'serviços-gerais']) ?>">Serviços</a>
                </li>
                <li class="nav-list-item">
                    <a href="#sobrenos">Sobre</a>
                </li>
                <li class="nav-list-item">
                    <a href="<?= $router->route('web.cadastrar') ?>">cadastrar</a>
                </li>
                <li class="nav-list-item mr-5">
                    <a href="<?= $router->route('web.login') ?>">
                        <button type="button" class="nav-btn">Login</button>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="row text-center mr-1" style="padding-top: 40px;">
            <div class="col text-left">
                <svg width="270" height="350" viewBox="0 0 287 350" fill="none" xmlns="http://www.w3.org/2000/svg" class="pt-4">
                    <path d="M0.5 54.9587C0.5 54.9587 184.02 -68.6984 233.762 54.9587C283.505 178.616 317.127 282.748 247.119 329.307C177.111 375.866 0.5 329.307 0.5 329.307V54.9587Z" fill="#1A73EA"/>
                </svg>
                <div class="image-header">
                    <img src="<?=asset('img/img-left.png')?>">
                </div>
            </div>
            <div class="col-6 text-center mt-3 ">
                <img src="<?=asset('img/logo.png')?>" width="119">
                <h1 class="mt-5">Nunca foi tão fácil contratar <span class="blue-bg">um serviço</span></h1>
                <p>Encontre profissionais e prestadores de serviço mais perto de você</p>
                <div class="box-search mt-5">
                    <span class="searchbox">
                        <img src="<?=asset('img/icons/glass.png')?>" alt="">
                    </span>
                    <input type="text" class="input-header" size="65" placeholder="Busque por um serviço" id="service_box">
                    <button type="button" class="btn-header-center ml-3" id="btn-form-submit">
                        Buscar
                    </button>
                </div>
            </div>
            <div class="col text-right">                
                <div style="margin-right: -15px;">
                    <svg width="295" height="284" viewBox="0 0 298 284" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M64.9463 21.1111C178.287 -26.3889 298 21.1111 298 21.1111V261.111C298 261.111 120.023 312.611 64.9461 261.111C9.86896 209.611 -48.3944 68.6111 64.9463 21.1111Z" fill="#1A73EA"/>
                    </svg>
                </div>
                <div class="image-header-right">
                    <img src="<?=asset('img/img-right.png')?>">
                </div>
            </div>
        </div>
        <div class="pb-5 mt-5" ></div>
    </header>
    <section class="container-fluid mb-5">
        <h2 class="mt-3">Melhores profissionais</h2>
        <div class="professionals mt-5">
            <div class="glide">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <li class="glide__slide">
                            <div class="box border">
                                <div class="row">
                                    <div class="col-3"> <div class="ml-2"><img src="<?=asset('img/icons/avatar.png')?>"> </div> </div>
                                    <div class="col text-left">
                                        <div class="mt-4 description overflow-hidden">
                                            <span class="font-weight-bold"> Fernando Oliveira </span>
                                            <div class="stars">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                            </div>
                                            <p class="mr-3">Full stack developer focused on PHP aaaaaaaaaaaaaaaaaaaaa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="glide__slide">
                            <div class="box border">
                                <div class="row">
                                    <div class="col-3"> <div class="ml-2"><img src="<?=asset('img/icons/avatar.png')?>"> </div> </div>
                                    <div class="col text-left">
                                        <div class="mt-4 description overflow-hidden">
                                            <span class="font-weight-bold"> Fernando Oliveira </span>
                                            <div class="stars">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                            </div>
                                            <p class="mr-3">Full stack developer focused on PHP aaaaaaaaaaaaaaaaaaaaa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="glide__slide">
                            <div class="box border">
                                <div class="row">
                                    <div class="col-3"> <div class="ml-2"><img src="<?=asset('img/icons/avatar.png')?>"> </div> </div>
                                    <div class="col text-left">
                                        <div class="mt-4 description overflow-hidden">
                                            <span class="font-weight-bold"> Fernando Oliveira </span>
                                            <div class="stars">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                            </div>
                                            <p class="mr-3">Full stack developer focused on PHP aaaaaaaaaaaaaaaaaaaaa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="glide__slide">
                            <div class="box border">
                                <div class="row">
                                    <div class="col-3"> <div class="ml-2"><img src="<?=asset('img/icons/avatar.png')?>"> </div> </div>
                                    <div class="col text-left">
                                        <div class="mt-4 description overflow-hidden">
                                            <span class="font-weight-bold"> Fernando Oliveira </span>
                                            <div class="stars">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                            </div>
                                            <p class="mr-3">Full stack developer focused on PHP aaaaaaaaaaaaaaaaaaaaa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="glide__slide">
                            <div class="box border">
                                <div class="row">
                                    <div class="col-3"> <div class="ml-2"><img src="<?=asset('img/icons/avatar.png')?>"> </div> </div>
                                    <div class="col text-left">
                                        <div class="mt-4 description overflow-hidden">
                                            <span class="font-weight-bold"> Fernando Oliveira </span>
                                            <div class="stars">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                                <img src="<?=asset('img/icons/star.png')?>">
                                            </div>
                                            <p class="mr-3">Full stack developer focused on PHP aaaaaaaaaaaaaaaaaaaaa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="glide__arrows" data-glide-el="controls">
                    <button class="glide__arrow glide__arrow--left black"  data-glide-dir="<">prev</button>
                    <button class="glide__arrow glide__arrow--right black" data-glide-dir=">">next</button>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center pt-4  pb-3 main_professional">
        <div class="container">
            <article>
                <header>
                    <h3>Porque o easy<span class="blue-bg">Work</span>?</h3>
                    <p class="desc-about">
                        EasyWork é a plataforma de contratação de serviços. Conectamos Profissionais de todo o Brasil com pessoas solicitando serviço, atendendo com qualidade, facilidade e rapidez para todos os tipos de necessidade. 
                    </p>
                </header>
                <div class="row justify-content-center mt-5 mb-5">
                    <div class="col">
                        <img src="<?=asset('img/icons/click.png')?>">
                        <p class="desc-about-list mt-3">
                            <span class="h3">Faça o seu pedido</span><br>Fale o que você precisa. É rápido e de graça!
                        </p>
                    </div>
                    <div class="col">
                        <img src="<?=asset('img/icons/glass-money.png')?>">
                        <p class="desc-about-list mt-3">
                            <span class="h3">Escolha o melhor</span><br>Negocie direto com eles. Fácil como nunca foi antes!
                        </p>
                    </div>
                    <div class="col">
                        <img src="<?=asset('img/icons/lock.png')?>">
                        <p class="desc-about-list mt-3">
                            <span class="h3">Seguro</span><br>Qualquer pedido em nossa plataforma é 100% seguro
                        </p>
                    </div>
                </div>
            </div>
        </article>
    </section>
    <section class="main_employee container mt-5 mb-5">
        <div class="row">
            <div class="col">
                <h1 class="mb-5">Você é um profissional?</h1>

                <p class="mr-5">O EasyWork recebe muitos pedidos todos os meses de clientes procurando profissionais como você.</p>
                <P>Cadastre seus serviços e receba solicitações direto do seu celular.</P>
                
                <a href="<?= $router->route('web.partners') ?>" class="btn btn-primary mt-5">
                    Cadastre seu serviços já!
                </a>
            </div>
            <div class="col">
                <img src="<?=asset('img/people.png')?>" alt="">
            </div>
        </div>
    </section>
    <aside class="text-center main_professional pb-5 line-bottom">
        <a name="sobrenos"></a>
        <div class="container pb-5">
            <h1 class="pt-5 blue-bg">Sobre nós</h1>
            <div class="row mt-5">
                <div class="col">
                    <p class="about-us-text">O <span class="blue-bg">EasyWork</span>, que você já deve conhecer, decidiu revolucionar o mundo corporativo, impactando a vida de milhões de pessoas com soluções simples, ágeis e criativas. Sem burocracias, nos tornamos referência em desenvolvimento tecnológico e em diversas formas de inovar o mundo.</p>
                </div>
                <div class="col">
                    <img src="<?=asset('img/logo-rounded.png')?>" width="300">
                </div>
            </div>
        </div>
    </aside>
<?php $v->start("scripts"); ?>
    <script src="<?= asset("js/libs/glide.min.js"); ?>"></script>
    <script src="<?= asset("js/index.js"); ?>"></script>
<?php $v->end(); ?>