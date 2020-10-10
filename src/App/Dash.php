<?php
namespace Source\App;

class Dash extends Controller {

    public function __construct($router)
    {
        parent::__construct($router);
    }


    public function index()
    {
        echo 'DASH';
    }
}