<!-- temp until autoloader is implemented -->
<?php

require '../vendor/autoload.php';

require '../app/core/bootstrap.php';

use App\core\Router;

//load routes files to determine post or get request
Router::load(__DIR__ . '/../app/core/routes.php')
	->direct(Router::uri(), Router::method());
