<?php

namespace App\Core;

use ReflectionClass;

class Singleton {
    private static array $instances = [];

    public static function getInstance(...$args): static {
        $class = static::class;

        if (!isset(self::$instances[$class])) {
            $reflector = new ReflectionClass($class);

            $instance = $reflector->newInstanceWithoutConstructor();

            $constructor = $reflector->getConstructor();
            if ($constructor) {
                $constructor->setAccessible(true);
                $constructor->invokeArgs($instance, $args);
            }

            self::$instances[$class] = $instance;
        }

        return self::$instances[$class];
    }

    protected static function removeInstance(): void {        $class = static::class;
        if (isset(self::$instances[$class])) {
            unset(self::$instances[$class]);
        }
    }
}
