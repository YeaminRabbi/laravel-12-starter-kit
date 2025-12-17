<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RemovePublicSegment;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Http\Request;
use App\Http\Middleware\Cors;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Custom CORS Middleware
        $middleware->append(Cors::class);

        // Laravel CORS Middleware
        // $middleware->append(HandleCors::class);


        $middleware->prependToGroup('web', RemovePublicSegment::class);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
         $exceptions->render(function (Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return response()->json(['status' => false, 'message' => 'Data not found.'], 404);
            }
        });
    })->create();
