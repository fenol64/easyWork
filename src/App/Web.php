<?php

namespace Source\App;
use Source\Models\User;
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
        $form_user->nome = null;
        $form_user->Snome = null;
        $form_user->email = null;

        $social_user = (!empty($_SESSION["facebook_auth"]) ? unserialize($_SESSION["facebook_auth"]) : 
        (!empty($_SESSION["google_auth"]) ? unserialize($_SESSION["google_auth"]) : null));

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

    public function forget()
    {
        echo $this->view->render("themes/web/recover", [
            'title' => site('name'). " | recuperar a senha",

        ]); 
    }

    public function reset($data)
    {

        $email = filter_var($data["email"], FILTER_VALIDATE_EMAIL);
        $forget = filter_var($data["forget_id"], FILTER_DEFAULT);

        if (!$email || !$forget) {
            flash("bg-error", "Não foi possível recuperar, tente novamente");
            $this->router->redirect("web.forget");
        }

        $user = (new User())->find("email = :e AND forget = :f", "e={$email}&f={$forget}")->fetch();
        
        if (!$user) {
            flash("bg-error", "Não foi possível recuperar, tente novamente");
            $this->router->redirect("web.forget");
        }

        echo $this->view->render("themes/web/reset", [
            'title' => site('name'). " | recuperar a senha",
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