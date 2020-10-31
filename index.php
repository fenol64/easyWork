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
$router->group(null);
$router->get("/", "Web:index", "web.index");
$router->get("/parceiros", "Web:partners", "web.partners");
$router->get("/servicos/{service}", "Web:services", "web.services");
$router->get("/termos", "Web:terms", "web.terms");
$router->get("/login", "Web:login", "web.login");
$router->get("/recuperar", "Web:forget", "web.forget");
$router->get("/senha/{email}/{forget}", "Web:reset", "web.reset");
$router->get("/cadastro", "Web:cadastrar", "web.cadastrar");
$router->get("/cadastro-parceiros", "Web:cadastrarPartner", "web.cadastrarPartner");

/*
 * WEB POST ROUTES
 */
$router->group(null);
$router->post("/login", "Auth:login", "auth.login");
$router->post("/register", "Auth:register", "auth.register");
$router->post("/register-partner", "Auth:registerPartner", "auth.registerPartner");
$router->post("/forget", "Auth:forget", "auth.forget");
$router->post("/reset", "Auth:reset", "auth.reset");

/*
 * dashboards
 */
$router->group('dash');
$router->get("/", "Dash:index", "dash.index");
$router->get('/new-service', "Dash:newService", "dash.newService");
$router->get('/logout', "Dash:logoff", "dash.logoff");

/*
 * dashboards POST routes
 */
$router->post('/getService', "Dash:getService", "dash.getservice");
$router->post('/addService', "Dash:addService", "dash.addservice");
$router->post('/detailService', "Dash:detailService", "dash.detailService");

/*
 *  Admin get routes frames
 */

$router->group('admin');
$router->get('/getView', 'Admin:getView', 'Admin.getview');
$router->get('/getChart', 'Admin:createChart', 'Admin.createChart');



$router->post('/AddCategory', "Admin:AddCategory", "admin.addcategory");
$router->post('/delCategory', "Admin:delCategory", "admin.delCategory");
$router->post('/BanUser', "Admin:BanUser", "admin.BanUser");
$router->post('/BanPost', "Admin:BanPost", "admin.BanPost");
$router->post('/awnserQuestion', "Admin:awnserQuestion", "admin.awnserQuestion");
/*
 * SOCIAL
 */
$router->group(null);
$router->get("/facebook", "Auth:facebook", "auth.facebook");
$router->get("/google", "Auth:google", "auth.google");



/*
 * FOR ERRORS
 */
$router->group('ooops');
$router->get("/{errcode}", "Web:error", "web.error");

// executins routes
$router->dispatch();

if ($router->error()){
    $router->redirect("web.error", ["errcode" => $router->error()]);
} 

ob_end_flush();