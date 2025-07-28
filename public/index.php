<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/config/bootstrap.php';

echo "Bonjour";
$routes->resolveRoute($routes);
