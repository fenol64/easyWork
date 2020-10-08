<?php

namespace Source\App;

use Source\Models\Categories;

class Web extends Controller
{

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function index()
    {
        echo $this->view->render("themes/web/index", [
            'title' => site('name'). ' | jeito mais facil de encontrar um serviço!'
        ]);
    }

    public function partners()
    {
        echo $this->view->render("themes/web/partners", [
            'title' => site('name'). ' | seja um pestador de serviço!'
        ]);
    }

    public function services($data)
    {

        $service = filter_var($data['service'], FILTER_SANITIZE_STRIPPED);

        $search = (new Categories())->find("type_category = :c", "c={$service}")->fetch(true);

        $name = str_replace('-', ' ', $service);

        if (!$search) {
            $search = 'Não existe serviços cadastrados com esse nome!';
        }

        echo $this->view->render("themes/web/services", [
            'title' => site('name'). ' | termos de uso da plataforma!',
            'search' => $search,
            'name'=> $name
        ]);
    }

    public function cadastrar()
    {

        $form_user = new \stdClass();
        $form_user->photo = null;
        $form_user->nome = null;
        $form_user->Snome = null;
        $form_user->email = null;

        if (!empty($_SESSION["facebook_auth"])) {
            $social_user = unserialize($_SESSION["facebook_auth"]);
            $form_user->photo = $social_user->getPictureUrl();
        } else if (!empty($_SESSION["google_auth"])) {
            $social_user = unserialize($_SESSION["google_auth"]);
            $form_user->photo = $social_user->getAvatar();
        } else {
            $social_user = false;
            $form_user->photo = asset('img/icons/avatar.png');
        }

        if ($social_user) {
            $form_user->nome = $social_user->getFirstName();
            $form_user->Snome = $social_user->getLastName();
            $form_user->email = $social_user->getEmail();
        }

        echo $this->view->render("themes/auth/cadastro", [
            'title' => site('name'). ' | Cadastre-se!',
            'data' => $form_user
        ]);
    }

    public function login()
    {

        echo $this->view->render("themes/auth/login", [
            'title' => site('name'). ' | Faça o login!'
        ]);
    }

    
    public function terms()
    {
        echo $this->view->render("themes/web/terms", [
            'title' => site('name'). ' | termos de uso da plataforma!'
        ]);
    }

    public function error($data)
    {

        $errcode = filter_var($data['errcode'], FILTER_SANITIZE_STRIPPED);

        echo $this->view->render("themes/web/error", [
            'title' => site('name'). " | ooops erro {$errcode}",
            'errcode' => $errcode
        ]);
    }
}