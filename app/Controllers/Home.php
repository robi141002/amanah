<?php

namespace App\Controllers;

use Illuminate\Support\Carbon;

class Home extends BaseController
{
    public function index(): string
    {
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
}
