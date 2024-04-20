<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\Response;
use Framework\Controller;

class Home extends Controller
{

    public function index(): Response
    {
        return $this->view("Home/index.mvc.php", [
            "siteName" => $this->container->get(
                \App\Services\Settings::class
            )->get("site_name")
        ]);
    }
}
