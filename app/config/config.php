<?php
/**
 * Configuration for error reporting
 * ***ONLY TO USE DURING DEVELOPMENT***
 */
define('ENVIRONMENT', 'development');
if (ENVIRONMENT == 'development' || ENVIRONMENT == 'dev') {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}
