<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseDashboard;
use App\Models\Bookings;
use App\Models\Pasien;
use App\Models\PenggunaModel;
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

    public function master()
    {
        $this->view->setData([
            'page' => 'master-data',
            'pageTitle' => 'Master Data',
            'user' => PenggunaModel::find(auth()->user()->id),
            'pasien' => Pasien::where('user_id',auth()->user()->id)->get()->first(),
        ]);
        return $this->view->render('pages/panel/master');
    }
    public function laporan()
    {
        $this->view->setData([
            'page' => 'laporan-booking',
            'pageTitle' => 'Laporan',
            'items' => Bookings::all(),
        ]);
        return $this->view->render('pages/panel/laporan');
    }

    public function cetak()
    {
        $this->view->setData([
            'page' => 'cetak-invoice',
            'pageTitle' => 'Cetak Invoice Booking',
        ]);
        return $this->view->render('pages/panel/cetak');
    }

    public function invoice(int $id)
    {
        $data = Bookings::where('id', $id)->where('status', 1)->get()->first();
        if (!$data) {
            return redirect()->to(base_url());
        }
        $this->view->setData([
            'invoice' => $data,
        ]);
        return $this->view->render('pages/panel/invoice');
    }
}
