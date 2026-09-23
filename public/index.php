<?php

use Illuminate\Foundation\Application; // Application class.
use Illuminate\Http\Request; // Request class.

define('LARAVEL_START', microtime(true)); // Start timestamp.

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) { // Check maintenance mode.
    require $maintenance; // Load maintenance page.
}

// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php'; // Load Composer.

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php'; // Load application.

$app->handleRequest(Request::capture()); // Handle request.
