<?php
//Display errors on page
ini_set('display_errors', 0);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Core\App;

require_once "../vendor/autoload.php";

require_once '../app/init.php';

$app = new App;

