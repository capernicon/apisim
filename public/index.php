<?php

require '../vendor/autoload.php';

require '../app/core/bootstrap.php';

use App\core\Router;

Router::load(__DIR__ . '/../app/core/routes.php')
        ->direct(Router::uri(), Router::method());
