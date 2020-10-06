<?php

namespace Source\App;

class Web extends Controller
{

    public function __construct($router)
    {
        parent::__construct($router);
    }

    public function index()
    {
        echo $this->view->render("themes/index", [
            'title' => site('name'). ' | jeito mais facil de encontrar um serviço!'
        ]);
    }

    public function partners()
    {
        echo $this->view->render("themes/partners", [
            'title' => site('name'). ' | seja um pestador de serviço!'
        ]);
    }
}