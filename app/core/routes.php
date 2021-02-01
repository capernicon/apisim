<?php

$router->get('', 'PageController/index');
$router->post('car', 'PostController/store');
$router->get('car', 'GetController/retrieve');
