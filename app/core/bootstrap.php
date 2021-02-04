<?php

//namespsaces will replace this need for requires shortly
require_once '../app/models/DIContainer.php';
require_once '../app/models/QueryBuilder.php';
require_once '../app/database/DatabaseConnection.php';
require_once '../app/core/Helper.php';

$database_config = parse_ini_file(__DIR__ . "/../config/database.ini", true);

DIContainer::bind('config', $database_config);

//create a new database instance to get things kicking
DIContainer::bind('database', new QueryBuilder(Connection::create(DIContainer::get('config')['database'])));
