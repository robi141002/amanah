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
        if (auth()->user()->inGroup('user')) {
            return $this->view->render('pages/panel/dashboard-user');
        } else {
            return $this->view->render('pages/panel/dashboard');
        }
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
        if (auth()->user()->inGroup('user')) {
            return $this->view->render('pages/panel/booking-user');
        } else {
            return $this->view->render('pages/panel/booking');
        }
    }

    public function pasien()
    {
        $this->view->setData([
            'page' => 'data-pasien',
            'pageTitle' => 'Data Pasien',
            'items' => Bookings::all(),
        ]);
        return $this->view->render('pages/panel/pasien');
    }
}
