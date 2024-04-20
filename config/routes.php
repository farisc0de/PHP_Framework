<?php

$router = new Framework\Router;

// Homepage example
$router->add("/", ["controller" => "home", "action" => "index"]);

// Catch-all example
$router->add("/{controller}/{action}");

// Example with namespace
$router->add("/admin/{controller}/{action}", ["namespace" => "Admin"]);

// Example with HTTP method
$router->add("/{controller}/{id:\d+}/destroy", ["action" => "destroy", "method" => "post"]);

// Example with middleware
$router->add("/{controller}/{id:\d+}/show", ["action" => "show", "middleware" => "authneeded"]);

return $router;
