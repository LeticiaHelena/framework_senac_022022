<?php

$mainPosition = __DIR__;

error_reporting(E_ERROR | E_PARSE);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

require_once("{$mainPosition}\helper\help.php");
require_once("{$mainPosition}\\vendor\autoload.php");

use Bootstrap\Env;
use App\FrameworkTools\ProcessServerElements;
use App\FrameworkTools\Implementation\FactoryMethods\FactoryProcessServerElement;
use App\FrameworkTools\Implementation\Route\RouteProcess;

Env::execute();

$factoryProcessServerElement = new FactoryProcessServerElement();
$factoryProcessServerElement->operation();

RouteProcess::execute();