<?php

namespace App\Controllers;

use Brick\PhoneNumber\PhoneNumber;
use Brick\PhoneNumber\PhoneNumberFormat;
use CodeIgniter\API\ResponseTrait;
use Illuminate\Support\Carbon;

class Home extends BaseController
{
    use ResponseTrait;

    public function index(): string
    {
        // dd(service('settings')->get('App.adminNumber'));
        return view('pages/landing/home');
    }
    public function form(): string
    {
        return view('pages/landing/form');
    }
    public function webhook()
    {
        $data = $this->request->getVar();
        // write $data to file
        file_put_contents(WRITEPATH . 'logs/webhook-' . Carbon::now()->format('YmdHis') . '.log', print_r($data, true) . PHP_EOL, FILE_APPEND);
    }
    public function adminwa()
    {
        $number = PhoneNumber::parse($this->request->getVar('phone'), "ID");
        service('settings')->set('App.adminNumber', $number->format(PhoneNumberFormat::E164));

        return $this->respond([
            'success' => true,
            'phone' => service('settings')->get('App.adminNumber'),
        ]);
    }
}