<?php

use App\Controllers\Api\Booking;
use App\Controllers\Api\Kamar;
use App\Controllers\Api\Pasien;
use App\Controllers\Home;
use App\Controllers\Migrate;
use App\Controllers\Panel\Dashboard;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class, 'index']);
$routes->get('/form', [Home::class, 'form']);

service('auth')->routes($routes);

$routes->environment('development', static function ($routes) {
    $routes->get('migrate', [Migrate::class, 'index']);
});

$routes->environment('production', static function ($routes) {
    $routes->get('migrate', function () {
        return 'Nothing to see here';
    });
});

$routes->group('api', static function (RouteCollection $routes) {
    $routes->resource('kamar', ['namespace' => '', 'controller' => Kamar::class, 'websafe' => 1]);
    $routes->get('booking/check', [Booking::class, 'check']);
    $routes->resource('booking', ['namespace' => '', 'controller' => Booking::class, 'websafe' => 1]);
    $routes->resource('pasien', ['namespace' => '', 'controller' => Pasien::class, 'websafe' => 1]);
});

$routes->group('panel', static function (RouteCollection $routes) {
    $routes->get('/', [Dashboard::class, 'index']);
    $routes->get('kamar', [Dashboard::class, 'kamar']);
    $routes->get('booking', [Dashboard::class, 'booking']);
    $routes->get('pasien', [Dashboard::class, 'pasien']);
});

$routes->get('webhook', [Home::class, 'webhook']);
$routes->post('webhook', [Home::class, 'webhook']);