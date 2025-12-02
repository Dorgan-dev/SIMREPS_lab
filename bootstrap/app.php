<?php

use App\Http\Middleware\CheckGuest;
use App\Http\Middleware\CheckIsLogin;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\SavePreviousUrl;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'checkislogin' => CheckIsLogin::class,
            'checkrole' => CheckRole::class,
            'checkguest' => CheckGuest::class,
            'savepreviousurl' => SavePreviousUrl::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, $request) {

            // Hindari infinite redirect loop
            if (!$request->is('404')) {
                return redirect()->route('404');
            }

            return response()->view('guest.404', [], 404);
        });
    })->create();
