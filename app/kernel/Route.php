<?php
namespace App\Kernel;
use App\Kernel\Request;
class Route{
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function dispatch(){
       echo 123;
    }
}