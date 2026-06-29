<?php

namespace Aplikasi\Controller;

class HomeController
{
    public function index(): void
    {
        require dirname(__DIR__) . '/View/home.php';
    }
}
