<!-- temp until autoloader is implemented -->
<?php

require __DIR__ . '/../app/core/bootstrap.php';

require __DIR__ . '/../vendor/autoload.php';


//load routes files to determine post or get request
Router::load(__DIR__ . '/../app/core/routes.php')
	->direct(Router::uri(), Router::method());
