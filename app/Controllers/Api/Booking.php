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
            'pendamping_ktp' => [
                'mime_in[pendamping_ktp,image/png,image/jpg,image/gif]',
                'ext_in[image,png,jpg,gif]',
            ],
            'pendamping_pasfoto' => [
                'mime_in[pendamping_pasfoto,image/png,image/jpg,image/gif]',
                'ext_in[image,png,jpg,gif]',
            ],
        ]);

        $user = PenggunaModel::find(auth()->user()->id);
        $pasien = Pasien::where('user_id', auth()->user()->id)->get()->first();
        $data->pasien_id = $pasien->id;
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
            "pendamping_ktp" => $this->request->getFile('pendamping_ktp'),
            "pendamping_pasfoto" => $this->request->getFile('pendamping_pasfoto'),
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

        $client = \Config\Services::curlrequest();
        $response = $client->request('POST', 'https://app.saungwa.com/api/create-message', [
            'form_params' => [
                'appkey' => env('WA_APPKEY'),
                'authkey' => env('WA_AUTHKEY'),
                'to' => $data->pasien->phone,
                'message' => "Booking anda telah berhasil dibuat dengan detail sebagai berikut :

- Nama Pasien : " . $data->name . "
- Alamat Pasien : " . $data->address . "
- Nomor Whatsapp : " . $data->phone . "
- Jenis Kelamin : " . $data->jenis_kelamin . "
- Tanggal Lahir : " . $data->birthdate . "
- Kriteria : " . $data->kriteria . "
- Tanggal Masuk : " . $data->date_in . "
- Tanggal Keluar : " . $data->date_out . "
- Kamar : " . $data->kamar->name . "
- Nama Pendamping : " . $data->pendamping_name . "
- Nomor Whatsapp Pendamping : " . $data->pendamping_phone . "
- Alamat Pendamping : " . $data->pendamping_address . "


Telah tersimpan, harap menunggu konfirmasi dari admin",
                'sandbox' => 'false',
            ],
        ]);
    }

    public function afterUpdate(&$data)
    {
        if ($this->request->getVar('status')) {
            $client = \Config\Services::curlrequest();
            switch ((int) $this->request->getVar('status')) {
                case 1:
                    $response = $client->request('POST', 'https://app.saungwa.com/api/create-message', [
                        'form_params' => [
                            'appkey' => env('WA_APPKEY'),
                            'authkey' => env('WA_AUTHKEY'),
                            'to' => $data->pasien->phone,
                            'message' => "Booking anda dengan detail sebagai berikut :

- Kode Invoice : " . $data->code . "
- Nama Pasien : " . $data->name . "
- Alamat Pasien : " . $data->address . "
- Nomor Whatsapp : " . $data->phone . "
- Jenis Kelamin : " . $data->jenis_kelamin . "
- Tanggal Lahir : " . $data->birthdate . "
- Kriteria : " . $data->kriteria . "
- Tanggal Masuk : " . $data->date_in . "
- Tanggal Keluar : " . $data->date_out . "
- Kamar : " . $data->kamar->name . "
- Nama Pendamping : " . $data->pendamping_name . "
- Nomor Whatsapp Pendamping : " . $data->pendamping_phone . "
- Alamat Pendamping : " . $data->pendamping_address . "

silahkan unduh booking invoice pada link dibawah kemudian cetak 1 lembar dan tunjukan pada admin saat datang ke Rumah Singgah Amanah.

" . base_url("invoice/download/$data->id"),
                            'sandbox' => 'false',
                        ],
                    ]);
                    break;
                case 11:
                    $response = $client->request('POST', 'https://app.saungwa.com/api/create-message', [
                        'form_params' => [
                            'appkey' => env('WA_APPKEY'),
                            'authkey' => env('WA_AUTHKEY'),
                            'to' => $data->pasien->phone,
                            'message' => "Booking anda dengan detail sebagai berikut :

- Nama Pasien : " . $data->name . "
- Alamat Pasien : " . $data->address . "
- Nomor Whatsapp : " . $data->phone . "
- Jenis Kelamin : " . $data->jenis_kelamin . "
- Tanggal Lahir : " . $data->birthdate . "
- Kriteria : " . $data->kriteria . "
- Tanggal Masuk : " . $data->date_in . "
- Tanggal Keluar : " . $data->date_out . "
- Kamar : " . $data->kamar->name . "
- Nama Pendamping : " . $data->pendamping_name . "
- Nomor Whatsapp Pendamping : " . $data->pendamping_phone . "
- Alamat Pendamping : " . $data->pendamping_address . "

Di tolak oleh admin dengan keterangan :
$data->keterangan

silahkan coba kembali dan periksa kembali informasi anda dan informasi kamar yang tersedia.",
                            'sandbox' => 'false',
                        ],
                    ]);
                    break;
            }
        }
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
        $data = $data->filter(function ($q) use ($today) {
            $date_in = Carbon::createFromFormat("Y-m-d", $q->date_in);
            $date_out = Carbon::createFromFormat("Y-m-d", $q->date_out);
            return $today->isBetween($date_in, $date_out);
        });
        return $this->respond($data);
    }
}
