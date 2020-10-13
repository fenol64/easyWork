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
    <link rel="stylesheet" href="<?=asset('css/dash_style.css')?>">
    <?php if ($v->section("css")): ?>
      <?= $v->section("css"); ?>
    <?php endif; ?>
  </head>
  <body>
    <div class="call_back">
        <?= flash() ?>
    </div>
    <div class="main">
      <?php if ($user->tipo != 'U'): ?>
        <nav class="sidebar">
          <ul id="listnav">
            <li class="photo pt-5 pb-4">
              <div class="round-avatar" style="background-image: url(<?= $photo ?>) ">
              </div>
            </li>
            <li class="font-weight-bold">
              Olá, <?= $user->nome ?>
            </li>
            <li class="item active">
              Inicio
            </li>
            <?php if ($user->tipo == 'A'): ?>
              <li class="item">
                Categorias
              </li>
              <li class="item">
                Usuários
              </li>
              <li class="item">
                Posts
              </li>
              <li class="item">
                Financeiro
              </li>
              <li class="item">
                Destaques
              </li>
              <div class="dropdown-divider"></div>
              <li class="item">
                Suporte
              </li>
            <?php endif ?>
            <?php if ($user->tipo == 'P'): ?>
                <li class="item ">
                  Avaliações
                </li>
                <li class="item">
                  Financeiro
                </li>
                <li class="item">
                  Serviços
                </li>
                <li class="item">
                  Horários
                </li>
                <li class="item">
                  Formas de Pagamento
                </li>
                <div class="dropdown-divider"></div>
                <li class="item">
                  Perfil
                </li>
                <li class="item">
                  Suporte
                </li>
            <?php endif ?>
            <a href="<?= $router->route("dash.logoff"); ?>" class="btn btn-danger"> Sair </a>
          </ul>    
        </nav>
      <?php endif ?> 
      <div class="right-container"><?= $v->section("content"); ?></div>
    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?=asset('js/libs/jquery.js')?>"></script>
    <script src="<?=asset('js/libs/popper.js')?>"></script>
    <script src="<?=asset('js/libs/bootstrap.min.js')?>"></script>
    <script src="<?=asset('js/reqs.js')?>"></script>
    <?php if ($v->section("scripts")): ?>
      <?= $v->section("scripts"); ?>
    <?php endif; ?>
    <script>
        var header = document.getElementById("listnav");
        var btns = header.getElementsByClassName("item");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {

          var current = document.getElementsByClassName("active");
          if (current.length > 0) { 
            current[0].className = current[0].className.replace(" active", "");
          }
          this.className += " active";
          });
        }
    </script>
  </body>
</html>