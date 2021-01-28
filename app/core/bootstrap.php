<?php

//namespsaces will replace this need for requires shortly
require_once '../app/models/App.php';
require_once '../app/models/QueryBuilder.php';
require_once '../app/core/database/DatabaseConnection.php';

$database_config = parse_ini_file(__DIR__ . "/../config/database.ini", true);

App::bind('config', $database_config);

//create a new database instance to get things kicking
App::bind('database', new QueryBuilder(Connection::create(App::get('config')['database'])));
