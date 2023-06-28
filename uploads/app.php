<?php

    require "../vendor/autoload.php";

    $router = new \Bramus\Router\Router();

    $dotenv = Dotenv\Dotenv::createImmutable("../");
    $dotenv->load();

    

    $router->run();

?>