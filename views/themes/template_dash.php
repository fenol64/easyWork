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
    <div class="call_back">
        <?= flash() ?>
    </div>
    <nav class="sidebar">
        <img src="<?= $user[2] ?>">

        <?= $user[0] ?>
    </nav>
    <?= $v->section("content"); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?=asset('js/libs/jquery.js')?>"></script>
    <script src="<?=asset('js/libs/popper.js')?>"></script>
    <script src="<?=asset('js/libs/bootstrap.min.js')?>"></script>
    <script src="<?=asset('js/reqs.js')?>"></script>
    <?php if ($v->section("scripts")): ?>
      <?= $v->section("scripts"); ?>
    <?php endif; ?>
  </body>
</html>