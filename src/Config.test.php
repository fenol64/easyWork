<?php

    define('SITE', [
        "name" => "easyWork",
        "desc" => "Melhor plataforma de serviços online",
        "locale" => "pt_BR",
        "base_url" => "https://localhost/Projects/easyWork"
    ]);

    define("PAGARME_API_KEY", ""); // coloque sei token da api do pagar.me

    define("DATA_LAYER_CONFIG", [
        "driver" => "mysql",
        "host" => "localhost",
        "port" => "3306",
        "dbname" => "easywork",
        "username" => "root",
        "passwd" => "",
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);


    define('SOCIAL', [
        "facebook_page" => "",
        "facebook_author"=> "",
        "facebook_appId" => "",
        "twitter_creator" => "",
        "twitter_site" => ""
    ]);


    /*
    *   MAIL CONNECT
    */

    define('MAIL', [
        "host" => "",
        "port" => "",
        "user" => "",
        "passwd" => "",
        "from_name" => "",
        "from_email" => ""
    ]);

    /*
    *   FACEBOOK OAUTH | social login
    */

    define('FACEBOOK_LOGIN', [
        "clientId" => "",
        "clientSecret" => "",
        "redirectUri" => "",
        "graphApiVersion" => ""
    ]);

    /*
    *   GOOGLE OAUTH | social login
    */

    define('GOOGLE_LOGIN', [
        "clientId" => "",
        "clientSecret" => "",
        "redirectUri" => ""
    ]);
    