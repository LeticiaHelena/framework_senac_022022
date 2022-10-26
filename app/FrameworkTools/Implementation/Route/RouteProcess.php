<?php

namespace App\FrameworkTools\Implementation\Route;

use App\FrameworkTools\ProcessServerElements;
use App\FrameworkTools\Implementation\Route\Get;
use App\FrameworkTools\Implementation\Route\Post;
use App\FrameworkTools\Implementation\Route\Put;

class RouteProcess {

    use Get;
    use Post;
    use Put;

    private static $processServerElements;

    public static function execute() {
        self::$processServerElements = ProcessServerElements::start();
        $routeArray = [];

        switch(self::$processServerElements->getVerb()){
            case 'GET':
                return self::get();
            case 'POST':
                return self::post();
            case 'PUT':
                return self::put();
            case 'DELETE':
                return self::delete();
        }
    }
}