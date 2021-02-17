<?php

//namespsaces will replace this need for requires shortly
use App\database\Connect;

use App\core\DIContainer;

use App\models\QueryBuilder;

/*
require '../app/exceptionHandler/GeneralHandler.php';
require '../app/exceptionHandler/DatabaseConnection.php';
require '../app/exceptionHandler/QueryFailure.php';
*/

$database_config = parse_ini_file(__DIR__ . "/../config/database.ini", true);

DIContainer::bind('config', $database_config);

DIContainer::bind('database', new QueryBuilder(Connect::create(DIContainer::retrieve('config')['database'])));
