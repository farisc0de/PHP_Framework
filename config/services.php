<?php

$container = new DI\Container();

// Database example
$container->set(App\Database::class, function () {
    return new App\Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
});

$container->set(Twig\Environment::class, function () {
    $loader = new \Twig\Loader\FilesystemLoader(ROOT_PATH . "/views");
    $twig = new \Twig\Environment($loader, [
        "auto_reload" => true
    ]);
    return $twig;
});

$container->set(Whoops\Run::class, function () {
    $whoops = new Whoops\Run;
    $whoops->pushHandler(new Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    return $whoops;
});

$container->set(App\Services\Settings::class, function ($container) {
    return new App\Services\Settings($container->get(App\Database::class));
});

return $container;
