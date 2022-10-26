<?php

namespace App\FrameworkTools\Implementation\Route;

use App\Controllers\InsertDataController;
use App\Controllers\LeticiaController;

trait Post{
    public static function post(){
        switch(self::$processServerElements->getRoute()){
            case '/insert-data':
                return (new InsertDataController)->exec();
            break;
            case '/Helena2':
                return (new LeticiaController)->Helena2();
            break;
        }
    }
}