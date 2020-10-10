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
        "facebook_page" => "nox-0202",
        "facebook_author"=> "nox0102",
        "facebook_appId" => "923770348061346",
        "twitter_creator" => "@feferdinando03",
        "twitter_site" => "@feferdinando03",
    ]);


    /*
    *   MAIL CONNECT
    */

    define('MAIL', [
        "host" => "smtp.sendgrid.net",
        "port" => "587",
        "user" => "apikey",
        "passwd" => "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",
        "from_name" => "EasyWork",
        "from_email" => "thebrotherspf@gmail.com"
    ]);

    /*
    *   FACEBOOK OAUTH | social login
    */

    define('FACEBOOK_LOGIN', [
        "clientId" => "2098284290304529",
        "clientSecret" => "c4cb16cefe99d5f8bd8cfd2979c8da87",
        "redirectUri" => SITE["base_url"] . "/facebook",
        "graphApiVersion" => "v6.0"
    ]);

    /*
    *   GOOGLE OAUTH | social login
    */

    define('GOOGLE_LOGIN', [
        "clientId" => "689804817498-pfpjlgecsv756qm4l0tma6pl9cf81l8s.apps.googleusercontent.com",
        "clientSecret" => "3ddef7b4hmZNAb7uuR6zoB0W",
        "redirectUri" => SITE["base_url"] . "/google"
    ]);
    