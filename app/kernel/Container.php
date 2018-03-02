<?php

namespace App\Kernel;

use App\Kernel\Route;
use App\Kernel\File;

class Container
{
    public $config = [];
    protected $route;

    public function __construct($config, Request $request)
    {
        $this->boot();
        $this->route = new Route($request);
    }

    protected function boot()
    {
        $this->loadConfig();
    }

    public function route($request)
    {

    }

    public function dispatch()
    {
      //
    }

    private function loadConfig()
    {
        $arr = glob(CONFIG_PATH . DS . '*.{php,env}', GLOB_BRACE);
        $rootEnv = BASE_PATH . DS . '.env';
        file_exists($rootEnv) && array_unshift($arr, $rootEnv);
        !empty($arr) && $this->config = array_merge($this->config, File::loadConfig($arr));
    }
}