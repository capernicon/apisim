<?php

require_once '../app/App.php';
require_once '../app/core/database/QueryBuilder.php';
require_once '../app/core/database/Link.php';

$database_config = parse_ini_file(__DIR__ . "/../config/database.ini", true);

//pass in the database config
App::bind('config', $database_config);

//create a new database query
App::bind('database', new QueryBuilder(
	Connection::create(App::get('config')['database'])
));
