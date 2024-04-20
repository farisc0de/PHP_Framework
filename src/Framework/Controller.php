<?php

declare(strict_types=1);

namespace Framework;

use DI\Container;
use Twig\Environment;

abstract class Controller
{
    protected Request $request;

    protected Response $response;

    protected Environment $viewer;

    protected Container $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function setResponse(Response $response): void
    {
        $this->response = $response;
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }

    public function setViewer(Environment $viewer): void
    {
        $this->viewer = $viewer;
    }

    protected function view(string $template, array $data = []): Response
    {
        $this->response->setBody($this->viewer->render($template, $data));

        return $this->response;
    }

    protected function redirect(string $url): Response
    {
        $this->response->redirect($url);

        return $this->response;
    }
}
