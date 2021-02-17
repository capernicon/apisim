<?php

namespace App\exceptionHandler;

use Exception;

class DatabaseConnection extends Exception {

	protected $message = "An error occured when trying to connect with database.";

}
