<?php

include "Router.php";
require_once "Autoload.php";
Autoload::register();

$router = new Router();
$router->process();
