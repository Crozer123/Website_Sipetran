<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

// Bind config repository
$config = new Illuminate\Config\Repository([
    'app' => require __DIR__.'/../config/app.php',
    'view' => require __DIR__.'/../config/view.php',
    'session' => require __DIR__.'/../config/session.php',
    'database' => require __DIR__.'/../config/database.php',
]);
$app->instance('config', $config);

// Register essential service providers
$app->register(Illuminate\Events\EventServiceProvider::class);
$app->register(Illuminate\Filesystem\FilesystemServiceProvider::class);
$app->register(Illuminate\Routing\RoutingServiceProvider::class);
$app->register(Illuminate\Cookie\CookieServiceProvider::class);
$app->register(Illuminate\Session\SessionServiceProvider::class);
$app->register(Illuminate\View\ViewServiceProvider::class);
$app->register(Illuminate\Database\DatabaseServiceProvider::class);

return $app;
