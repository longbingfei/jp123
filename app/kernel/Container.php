<?php

namespace App\Kernel;
use App\Kernel\Route;
class Container
{
    public function __construct($config)
    {
        //
    }

    public function route($request){
        return new Route($request);
    }
}