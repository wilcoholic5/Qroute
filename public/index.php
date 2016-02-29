<?php
require_once "../bootstrap.php";

use SimpleWrapper\SimpleWrapper;
$klein = new \Klein\Klein();
$wrapper = new SimpleWrapper($_SERVER["REQUEST_URI"], $twig, $klein, $config);
$wrapper->routeOrPrepare();
