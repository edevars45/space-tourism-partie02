<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Exceptions;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Ajoute ton middleware SetLocale au groupe "web"
        $middleware->appendToGroup('web', [
            \App\Http\Middleware\SetLocale::class,
        ]);

        // (optionnel) créer un alias si tu veux l’utiliser par nom sur des routes :
        // $middleware->alias(['setlocale' => \App\Http\Middleware\SetLocale::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
