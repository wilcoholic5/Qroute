<?php
require_once "../bootstrap.php";
use SimpleWrapper\SimpleWrapper;

$router = new SimpleWrapper($twig, $config);

$request = $router->routeOrPrepare($_SERVER);