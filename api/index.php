<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Setup writable directories in /tmp for Vercel serverless environment
$tmpDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/logs',
    '/tmp/storage/app/public',
    '/tmp/bootstrap/cache',
];

foreach ($tmpDirs as $dir) {
    if (! is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Redirect storage path to /tmp/storage before Laravel boots
putenv('LARAVEL_STORAGE_PATH=/tmp/storage');
$_ENV['LARAVEL_STORAGE_PATH'] = '/tmp/storage';
$_SERVER['LARAVEL_STORAGE_PATH'] = '/tmp/storage';

// Prepare SQLite database in /tmp if sqlite connection is used
$dbConnection = getenv('DB_CONNECTION') ?: 'sqlite';
$dbFile = getenv('DB_DATABASE') ?: '/tmp/database.sqlite';

if ($dbConnection === 'sqlite' && $dbFile === '/tmp/database.sqlite') {
    if (! file_exists($dbFile)) {
        $sourceDb = dirname(__DIR__).'/database/database.sqlite';
        if (file_exists($sourceDb) && filesize($sourceDb) > 0) {
            copy($sourceDb, $dbFile);
        } else {
            touch($dbFile);
        }
    }
}

// Maintenance mode check
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register Composer autoloader
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel Application
$app = require_once __DIR__.'/../bootstrap/app.php';
$app->useStoragePath('/tmp/storage');

// Handle request
$app->handleRequest(Request::capture());
