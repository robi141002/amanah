<?php

namespace App\Controllers\Api;

use App\Controllers\BaseApi;
use App\Models\Bookings as DataModel;
use App\Models\Pasien;
use App\Models\PenggunaModel;

class Booking extends BaseApi
{
    protected $modelName = DataModel::class;

    public function index()
    {
        if (auth()->user()->inGroup('user')) {
            $pasien = Pasien::where('user_id', auth()->user()->id)->first();
            return $this->request->getVar('wrap') ? $this->respond([$this->request->getVar('wrap') => $this->modelName::where('pasien_id', $pasien->id)->with("kamar")->get()]) : $this->respond($this->modelName::where('pasien_id', $pasien->id)->with("kamar")->get());
        }
        return $this->request->getVar('wrap') ? $this->respond([$this->request->getVar('wrap') => $this->modelName::with("kamar")->get()]) : $this->respond($this->modelName::with("kamar")->get());
    }

    public function beforeCreate(&$data)
    {
        $this->validate([
            'kk' => [
                'uploaded[kk]',
                'mime_in[kk,image/png,image/jpg,image/gif]',
                'ext_in[image,png,jpg,gif]',
            ],
            'ktp' => [
                'uploaded[ktp]',
                'mime_in[ktp,image/png,image/jpg,image/gif]',
                'ext_in[image,png,jpg,gif]',
            ],
            'rujukan' => [
                'uploaded[rujukan]',
                'mime_in[rujukan,image/png,image/jpg,image/gif]',
                'ext_in[image,png,jpg,gif]',
            ],
            'bpjs' => [
                'uploaded[bpjs]',
                'mime_in[bpjs,image/png,image/jpg,image/gif]',
                'ext_in[image,png,jpg,gif]',
            ],
            'pasfoto' => [
                'uploaded[pasfoto]',
                'mime_in[pasfoto,image/png,image/jpg,image/gif]',
                'ext_in[image,png,jpg,gif]',
            ],
            'sktm' => [
                'mime_in[pasfoto,image/png,image/jpg,image/gif]',
                'ext_in[image,png,jpg,gif]',
            ],
        ]);

        $user = PenggunaModel::find(auth()->user()->id);
        $pasien = Pasien::where('user_id', auth()->user()->id)->get()->first();
        $data->pasien_id = $pasien->id;
        $data->name = $user->nama;
        $data->address = $pasien->address;
        $data->phone = $pasien->phone;
    }

    public function afterCreate(&$data)
    {
        $files = [
            "kk" => $this->request->getFile('kk'),
            "ktp" => $this->request->getFile('ktp'),
            "rujukan" => $this->request->getFile('rujukan'),
            "bpjs" => $this->request->getFile('bpjs'),
            "pasfoto" => $this->request->getFile('pasfoto'),
            "sktm" => $this->request->getFile('sktm'),
        ];
        foreach ($files as $idx => $file) {
            /** @var \CodeIgniter\HTTP\Files\UploadedFile $file */
            if ($file->isValid() && $file->isFile()) {
                $fileName = $idx . '.' . $file->getExtension();
                $file->move(FCPATH . "img/files/$data->id", $fileName, true);
                $data->{$idx} = base_url("img/files/$data->id/" . $fileName);
            }
        }
        $data->save();
    }

    public function check()
    {
        $q = (object) $this->request->getVar();
        $data = DataModel::where("status", "=", 1)->whereBetween('date_in', [$q->date_in, $q->date_out])->orWhereBetween('date_out', [$q->date_in, $q->date_out])->get();
        return $this->respond(["q" => $q, "data" => $data]);
    }
}
