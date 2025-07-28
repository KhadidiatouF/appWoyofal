<?php

require_once __DIR__ . '/../core/App.php';
require_once __DIR__ . '/../core/Router.php';
require_once '../app/config/env.php';
require_once __DIR__ . '/../../route/route.web.php';

// use App\Core\App;
use App\Core\Router;

// App::run();
Router::resolveRoute($routes);
