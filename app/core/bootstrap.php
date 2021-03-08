<?php

use App\database\Connect;

use App\core\DIContainer;

use App\models\QueryBuilder;

$database_config = parse_ini_file(__DIR__ . "/../config/database.ini", true);

DIContainer::bind('config', $database_config);

DIContainer::bind('database', new QueryBuilder(Connect::create(DIContainer::retrieve('config')['database'])));
