<?php

ob_start();
session_start();

require_once __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(site());
$router->namespace('Source\App');

/*
 * WEB
 */

$router->get("/", "Web:index", "web.index");
$router->get("/parceiros", "Web:partners", "web.partners");
$router->get("/servicos/{service}", "Web:services", "web.services");
$router->get("/termos", "Web:terms", "web.terms");
$router->get("/login", "Web:login", "web.login");
$router->get("/cadastro", "Web:cadatrar", "web.cadastrar");

/*
 * FOR ERRORS
 */
$router->group('ooops');
$router->get("/{errcode}", "Web:error", "web.error");




/*
 * SOCIAL
 */
$router->group(null);
$router->get("/facebook", "Auth:facebook", "auth.facebook");
$router->get("/google", "Auth:google", "auth.google");

// executins routes
$router->dispatch();

if ($router->error()){
    $router->redirect("web.error", ["errcode" => $router->error()]);
} 

ob_end_flush();