<?php

require dirname(__DIR__) . '/autoload.php';

use Aplikasi\Config\AppConfig;
use Aplikasi\Controller\ApiController;
use Aplikasi\Controller\HomeController;
use Aplikasi\Repository\ReservationRepository;
use Aplikasi\Service\ReservationService;

$repository = new ReservationRepository(AppConfig::storagePath());
$service = new ReservationService($repository);
$route = $_GET['route'] ?? 'home';

if ($route === 'api') {
    (new ApiController($service))->handle();
    exit;
}

(new HomeController())->index();
