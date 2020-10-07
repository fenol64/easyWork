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

    public function cadatrar()
    {
        echo $this->view->render("themes/auth/cadastro", [
            'title' => site('name'). ' | Cadastre-se!'
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
        # code...
    }
}