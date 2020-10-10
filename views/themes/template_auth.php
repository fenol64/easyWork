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
    <style>
      .message {
        width: 250px;
        padding: 15px;
        position: absolute;
        top: 5%;
        left: 80%;
        border-radius: 10px;
        font-weight: bold;
        color: #fff;
      }

          /*DEFAULT LOAD*/
    .ajax_load {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9;
    }

    .ajax_load_box {
        margin: auto;
        text-align: center;
        color: #ffffff;
        font-weight: bold;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
    }

    .ajax_load_box_circle {
        border: 16px solid #e3e3e3;
        border-top: 16px solid #1A73EA;
        border-radius: 50%;
        margin: auto;
        width: 80px;
        height: 80px;

        -webkit-animation: spin 1.2s linear infinite;
        -o-animation: spin 1.2s linear infinite;
        animation: spin 1.2s linear infinite;
    }

    .ajax_load_box_title {
        margin-top: 15px;
        font-weight: bold;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

@keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}
    </style>
    <?php if ($v->section("css")): ?>
      <?= $v->section("css"); ?>
    <?php endif; ?>
  </head>
  <body>
  <div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <div class="ajax_load_box_title">Aguarde, carrengando...</div>
    </div>
</div>
  <div class="call_back">
    <?= flash() ?>
</div>
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