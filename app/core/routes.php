<?php

$router->get('', 'App\controllers\PageController/index');
$router->post('car', 'App\controllers\PostController/store');
$router->get('car', 'App\controllers\GetController/retrieve');
