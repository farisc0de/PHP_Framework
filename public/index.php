<?php

declare(strict_types=1);

define("ROOT_PATH", dirname(__DIR__));

require ROOT_PATH . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH);

$dotenv->load();

set_error_handler("Framework\ErrorHandler::handleError");

set_exception_handler("Framework\ErrorHandler::handleException");

$router = require ROOT_PATH . "/config/routes.php";

$container = require ROOT_PATH . "/config/services.php";

$middleware = require ROOT_PATH . "/config/middleware.php";

$dispatcher = new Framework\Dispatcher($router, $container, $middleware);

$request = Framework\Request::createFromGlobals();

$response = $dispatcher->handle($request);

$response->send();
