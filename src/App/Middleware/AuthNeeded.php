<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Request;
use Framework\Response;
use Framework\RequestHandlerInterface;
use Framework\MiddlewareInterface;

class AuthNeeded implements MiddlewareInterface
{
    public function __construct(private Response $response)
    {
    }

    public function process(Request $request, RequestHandlerInterface $next): Response
    {
        if (!isset($_SESSION["user"])) {
            $this->response->redirect("/login");
            return $this->response;
        }

        $this->response->redirect("/products/index");

        return $this->response;
    }
}
