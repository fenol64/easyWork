<?php $v->layout("themes/template_auth") ?>
<?php $v->start("css"); ?>
    <style>

        body {
            background-color: #F1F3F4;
        }

        form {
            background-color: #FFF;
            padding: 25px;
            margin-right: 150px;
            box-shadow: 1px 1px 2px;
            border-radius: 10px;
            border: 1px solid #888;
        }

        input, textarea {
            padding: 5px;
            font-size: 14px;
            margin: 3px;
        }

        ul{
            list-style: none;
        }

        .blue-bg {
            color: #1A73EA;
        }


    </style>
<?php $v->end(); ?>
<div class="main container-fluid">
    <div class="row">
        <div class="col d-flex justify-content-between align-items-center">
            <img src="<?= asset('img/logo.png') ?>" width="64">

            <div class="text-right mr-4">
                <a href="<?= $router->route('dash.index') ?>">
                    Voltar à dashboard >
                </a>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col text-center">
            <img src="<?= asset('img/new_service.png') ?>">
        </div>
        <div class="col">
            <form action="<?= $router->route('dash.addservice') ?>" method="post">
                <h2 class="text-center blue-bg"> Solicitar serviço </h2>
                <div class="d-flex flex-column">
                    <input type="text" name="title" id="title" placeholder="Digite o título da postagem">
                    <textarea name="description" id="description" rows="10" placeholder="Descrição. Digite detalhadamente oque você precisa"></textarea>
                </div>
                <ul class="todos-body d-flex mt-4">
                    <li>Aqui vai aparecer as tags para encontrar um profissional</li>
                </ul>
                <input type="text" name="capable" class="todo-name" size="80" placeholder="Digite as tags">
                <button type="button" id="button" class="btn btn-primary w-100 mb-4"> adicionar </button>
                <button type="submit" class="btn btn-success w-100"> Solicitar! </button>
            </form>
        </div>
    </div>
</div>

<?php $v->start("scripts"); ?>
    <script src="<?= asset("js/todo.js"); ?>"></script>
<?php $v->end(); ?>
