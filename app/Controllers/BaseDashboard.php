<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\View\View;
use Config\Services;
use Psr\Log\LoggerInterface;

abstract class BaseDashboard extends BaseController
{
    public View $view;
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        service("eloquent");
        $this->view = Services::renderer();
        $user = auth()->user();

        $this->view->setData([
            'page' => "dashboard",
            'user' => $user,
        ]);
        $this->view->setData([
            'menu' => [
                'Dashboard' => [
                    'id' => 'dashboard',
                    'icon' => 'house',
                    'url' => base_url('/panel'),
                ],
                'Manajemen Kamar' => [
                    'id' => 'manajemen-kamar',
                    'icon' => 'door-open',
                    'url' => base_url('/panel/kamar'),
                ],
                'Data Booking' => [
                    'id' => 'data-booking',
                    'icon' => 'hourglass-half',
                    'url' => base_url('/panel/booking'),
                ],
            ],
        ]);
    }
}
