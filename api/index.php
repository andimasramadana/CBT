<?php

use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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

// Prepare SQLite database in /tmp if sqlite connection is used
$shouldMigrate = false;
$dbConnection = getenv('DB_CONNECTION') ?: 'sqlite';
$dbFile = getenv('DB_DATABASE') ?: '/tmp/database.sqlite';

if ($dbConnection === 'sqlite' && $dbFile === '/tmp/database.sqlite') {
    if (! file_exists($dbFile)) {
        touch($dbFile);
        $shouldMigrate = true;
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

// Run migrations and seeders once if fresh SQLite database
if ($shouldMigrate) {
    try {
        $kernel = $app->make(ConsoleKernel::class);
        $kernel->bootstrap();
        Artisan::call('migrate', ['--force' => true, '--seed' => true]);
    } catch (Throwable $e) {
        // Silently continue so requests don't fail if migration encounters an issue
    }
}

// Handle request
$app->handleRequest(Request::capture());
