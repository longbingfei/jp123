<?php
require '../bootstrap.php';
$app = (new App\Kernel\Container($config = require CONFIG_PATH . DS . 'config.php', new App\Kernel\Request))->dispatch();