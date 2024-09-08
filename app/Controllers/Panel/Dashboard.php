<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseDashboard;
use App\Models\Bookings;
use App\Models\Rooms;

class Dashboard extends BaseDashboard
{
    public function index()
    {
        $this->view->setData([
            'pageTitle' => 'Dashboard',
        ]);
        return $this->view->render('pages/panel/dashboard');
    }

    public function kamar()
    {
        $this->view->setData([
            'page' => 'manajemen-kamar',
            'pageTitle' => 'Manajemen Kamar',
            'items' => Rooms::all(),
        ]);
        return $this->view->render('pages/panel/kamar');
    }
    public function booking()
    {
        $this->view->setData([
            'page' => 'data-booking',
            'pageTitle' => 'Data Booking',
            'items' => Bookings::all(),
        ]);
        return $this->view->render('pages/panel/booking');
    }
}
