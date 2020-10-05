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
        echo $this->view->render("themes/template");
    }
}