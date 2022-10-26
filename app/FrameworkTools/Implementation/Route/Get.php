<?php

namespace App\FrameworkTools\Implementation\Route;

use App\Controllers\HelloWorldController;
use App\Controllers\TrainQueryController;
use App\Controllers\LeticiaController;

trait Get{
    private static function get(){
        switch(self::$processServerElements->getRoute()){

            case '/hello-world':
                return (new HelloWorldController)->execute();
            break;

            case '/train-query':
                return (new TrainQueryController)->execute();
            break;

            case '/Helena1':
                return (new LeticiaController)->Helena1();
            break;

        }
    }
}