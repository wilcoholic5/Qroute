<?php
@include_once realpath(__DIR__ . '/vendor') . '/' . 'autoload.php';

error_reporting(-1);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

$loader = function($class) {
    $path = realpath(__DIR__ . '/lib');

    @include_once $path.'/'.str_replace("\\", "/", $class).'.php';
};

spl_autoload_register($loader);

// Load config
require "config/app.config.php";
$config["publicRoot"] = __DIR__."/views";

// Load TWIG
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem($config["publicRoot"]);
$twig = new Twig_Environment($loader);
