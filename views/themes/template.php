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
                            <li class="m-20">Assistencia Técnica</li>
                            <li class="m-20">Aulas</li>
                            <li class="m-20">Autos</li>
                            <li class="m-20">Consultoria</li>
                            <li class="m-20">Design e Tecnologia</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="footer_list">
                            <li class="footer_head">EVENTOS</li>
                            <li class="m-20"></li>
                            <li class="m-20">Moda e Beleza</li>
                            <li class="m-20">Reformas</li>
                            <li class="m-20">Saúde</li>
                            <li class="m-20">Serviços Domésticos</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="footer_list">
                            <li class="footer_head">INSTITUCIONAL</li>
                            <li class="m-20"></li>
                            <li class="m-20">Trabalhe Conosco</li>
                            <li class="m-20">Termos de Uso</li>
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