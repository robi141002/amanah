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
        if (auth()->user()->inGroup('admin')) {
            $this->view->setData([
                'menu' => [
                    'Dashboard' => [
                        'id' => 'dashboard',
                        'icon' => 'house',
                        'url' => base_url('/panel'),
                    ],
                    'Data Booking' => [
                        'id' => 'data-booking',
                        'icon' => 'book-bookmark',
                        'url' => base_url('/panel/booking'),
                    ],
                    'Manajemen Kamar' => [
                        'id' => 'manajemen-kamar',
                        'icon' => 'door-open',
                        'url' => base_url('/panel/kamar'),
                    ],
                    'Data Pasien' => [
                        'id' => 'data-pasien',
                        'icon' => 'circle-user',
                        'url' => base_url('/panel/pasien'),
                    ],
                ],
            ]);
        } elseif (auth()->user()->inGroup('owner')) {
            $this->view->setData([
                'menu' => [
                    'Dashboard' => [
                        'id' => 'dashboard',
                        'icon' => 'house',
                        'url' => base_url('/panel'),
                    ],
                    'Laporan Booking' => [
                        'id' => 'laporan-booking',
                        'icon' => 'book-bookmark',
                        'url' => base_url('/panel/laporan'),
                    ],
                ],
            ]);
        } else {
            $this->view->setData([
                'menu' => [
                    'Dashboard' => [
                        'id' => 'dashboard',
                        'icon' => 'house',
                        'url' => base_url('/panel'),
                    ],
                    'Booking' => [
                        'id' => 'data-booking',
                        'icon' => 'book-bookmark',
                        'url' => base_url('/panel/booking'),
                    ],
                    'Cetak Invoice Booking' => [
                        'id' => 'cetak-invoice',
                        'icon' => 'receipt',
                        'url' => base_url('/panel/cetak'),
                    ],
                    'Master Data' => [
                        'id' => 'master-data',
                        'icon' => 'circle-user',
                        'url' => base_url('/panel/master'),
                    ],
                ],
            ]);
        }
    }
}
