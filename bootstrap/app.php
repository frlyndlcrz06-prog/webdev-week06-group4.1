<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__)) // Set application path.
    ->withRouting(
        web: __DIR__ . '/../routes/web.php', // Web routes.
        commands: __DIR__ . '/../routes/console.php', // Console routes.
        health: '/up', // Health endpoint.
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Configure middleware.
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen( // Configure JSON errors.
            fn(Request $request) => $request->is('api/*') || $request->expectsJson(), // Check request type.
        );
    })->create(); // Create application.
