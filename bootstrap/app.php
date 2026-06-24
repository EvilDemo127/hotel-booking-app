<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

if (env('APP_ENV') === 'production') {
    $app = Application::configure(basePath: $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__))
        ->create();
        
    $app->useStoragePath('/tmp');
    return $app;
}

return Application::configure(basePath: dirname(__DIR__))
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
