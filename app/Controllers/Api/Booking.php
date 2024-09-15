<?php

namespace App\Controllers\Api;

use App\Controllers\BaseApi;
use App\Models\Bookings as DataModel;
use App\Models\Pasien;
use App\Models\PenggunaModel;
use Carbon\Carbon;

class Booking extends BaseApi
{
    protected $modelName = DataModel::class;

    public function index()
    {
        if (auth()->user()->inGroup('user')) {
            $pasien = Pasien::where('user_id', auth()->user()->id)->first();
            return $this->request->getVar('wrap') ? $this->respond([$this->request->getVar('wrap') => $this->modelName::where('pasien_id', $pasien->id)->with("kamar")->get()]) : $this->respond($this->modelName::where('pasien_id', $pasien->id)->with("kamar")->get());
        }

        $data = $this->modelName::with("kamar")->get();

        $dari = $this->request->getVar("dari");
        $ke = $this->request->getVar("ke");

        if (!empty($dari)) {
            $data = $data->filter(function ($q) use ($dari) {
                return Carbon::parse($q->date_in) >= Carbon::parse($dari);
            });
        }

        if (!empty($ke)) {
            $data = $data->filter(function ($q) use ($ke) {
                return Carbon::parse($q->date_in) <= Carbon::parse($ke);
            });
        }

        $data = $data->values()->all();
        
        return $this->request->getVar('wrap') ? $this->respond([$this->request->getVar('wrap') => $data]) : $this->respond($data);
    }

    public function beforeCreate(&$data)
    {
        $this->validate([
            'kk' => [
                'mime_in[kk,image/png,image/jpg,image/gif]',
                'ext_in[image,png,jpg,gif]',
            ],
            'ktp' => [
                'mime_in[ktp,image/png,image/jpg,image/gif]',
                'ext_in[image,png,jpg,gif]',
            ],
            'rujukan' => [
                'mime_in[rujukan,image/png,image/jpg,image/gif]',
                'ext_in[image,png,jpg,gif]',
            ],
            'bpjs' => [
                'mime_in[bpjs,image/png,image/jpg,image/gif]',
                'ext_in[image,png,jpg,gif]',
            ],
            'pasfoto' => [
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

    public function booked()
    {
        $data = DataModel::where("status", "=", 1)->get();
        $today = Carbon::today("Asia/Jakarta");
        $data = $data->filter(function ($q) use($today) {
            $date_in = Carbon::createFromFormat("Y-m-d", $q->date_in);
            $date_out = Carbon::createFromFormat("Y-m-d", $q->date_out);
            return  $today->isBetween($date_in,  $date_out);
        });
        return $this->respond($data);
    }
}
