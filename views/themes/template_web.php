<!doctype html>
<html lang="<?=site('locale')?>">
  <head>
    <title><?=$title?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="<?=asset('img/logo.png')?>" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=asset('css/libs/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=asset('css/web_style.css')?>">
    <?php if ($v->section("css")): ?>
      <?= $v->section("css"); ?>
    <?php endif; ?>
  </head>
  <body>
    <?= $v->section("content"); ?>
    <footer>
        <div class="main_professional">
            <div class="container pt-5 pb-5">
                <div class="row">
                    <div class="col">
                        <ul class="footer_list">
                            <li class="footer_head">SERVIÇOS</li>
                            <li class="m-20"></li>
                            <li class="m-20"> 
                                <a href="<?= $router->route('web.services', ['service' => 'Assistencia-Técnica']) ?>" style="color:#000;">Assistencia Técnica</a>
                            </li>
                            <li class="m-20"> 
                                <a href="<?= $router->route('web.services', ['service' => 'Aulas']) ?>" style="color:#000;">Aulas</a>
                            </li>
                            <li class="m-20"> 
                                <a href="<?= $router->route('web.services', ['service' => 'Autos']) ?>" style="color:#000;">Autos</a>
                            </li>
                            <li class="m-20"> 
                                <a href="<?= $router->route('web.services', ['service' => 'Consultoria']) ?>" style="color:#000;">Consultoria</a>
                            </li>
                            <li class="m-20"> 
                                <a href="<?= $router->route('web.services', ['service' => 'Design-e-Tecnologia']) ?>" style="color:#000;">Design e Tecnologia</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="footer_list">
                            <li class="footer_head">EVENTOS</li>
                            <li class="m-20"></li>
                            <li class="m-20"> 
                                <a href="<?= $router->route('web.services', ['service' => 'Moda-e-Beleza']) ?>" style="color:#000;">Moda e Beleza</a>
                            </li>
                            <li class="m-20"> 
                                <a href="<?= $router->route('web.services', ['service' => 'Reformas']) ?>" style="color:#000;">Reformas</a>
                            </li>
                            <li class="m-20"> 
                                <a href="<?= $router->route('web.services', ['service' => 'Saúde']) ?>" style="color:#000;">Saúde</a>
                            </li>
                            <li class="m-20"> 
                                <a href="<?= $router->route('web.services', ['service' => 'Serviços-Domésticos']) ?>" style="color:#000;">Serviços Domésticos</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="footer_list">
                            <li class="footer_head">INSTITUCIONAL</li>
                            <li class="m-20"></li>
                            <li class="m-20"> 
                                <a href="<?= $router->route('web.partners') ?>" style="color:#000;" > Trabalhe Conosco </a> 
                            </li>
                            <li class="m-20"> 
                                <a href="<?= $router->route('web.terms') ?>" style="color:#000;" > Termos de Uso </a> 
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="footer_list">
                            <li class="footer_head">REDES SOCIAIS</li>
                            <li><img src="<?=asset('img/icons/midias.png')?>"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?=asset('js/libs/jquery.js')?>"></script>
    <script src="<?=asset('js/libs/popper.js')?>"></script>
    <script src="<?=asset('js/libs/bootstrap.min.js')?>"></script>
    <?php if ($v->section("scripts")): ?>
      <?= $v->section("scripts"); ?>
    <?php endif; ?>
  </body>
</html>