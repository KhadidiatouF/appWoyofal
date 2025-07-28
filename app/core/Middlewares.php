<?php

namespace App\Core;

use App\Core\Middlewares\Auth;

class Middlewares {
    private static array $middlewares = [
        'auth' => Auth::class,
    ];
    
    public static function execute(string $middlewareName): void {
        if (isset(self::$middlewares[$middlewareName])) {
            $middlewareClass = self::$middlewares[$middlewareName];
            $middleware = new $middlewareClass();
            $middleware();
        }
    }
}