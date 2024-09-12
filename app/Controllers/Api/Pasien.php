<?php

namespace App\Controllers\Api;

use App\Controllers\BaseApi;
use App\Entities\User;
use App\Models\Pasien as DataModel;

class Pasien extends BaseApi
{
    protected $modelName = DataModel::class;
    protected $load = ['user', 'user.identities'];

    public function beforeCreate(&$data)
    {
        $users = auth()->getProvider();
        $user = new User([
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ]);
        $users->save($user);
        $user = $users->findById($users->getInsertID());
        $user->addGroup('user');
        $data->user_id = $users->getInsertID();
    }

    public function afterCreate(&$data)
    {
        $client = \Config\Services::curlrequest();

        $response = $client->request('POST', 'https://app.saungwa.com/api/create-message', [
            'form_params' => [
                'appkey' => env('WA_APPKEY'),
                'authkey' => env('WA_AUTHKEY'),
                'to' => $data->phone,
                'message' => "Anda telah terdaftar pada sistem Rumah Singgah Amanah dengan detail akun sebagai berikut :
- Nama : " . $data->user->nama . "
- Username : " . $data->user->username . "
- Email : " . $data->user->email . "
- Nomor Whatsapp : " . $data->phone . "
Silahkan login dengan username dan password tersebut.
                ",
                'sandbox' => 'false',
            ]
        ]);
    }

    public function beforeUpdate(&$data)
    {
        $users = auth()->getProvider();
        $user = $users->findById($data->user_id);
        if ($this->request->getVar('password')) {
            $user->fill([
                'password' => $this->request->getVar('password'),
            ]);
        } else {
            $user->fill([
                'nama' => $this->request->getVar('nama'),
            ]);
        }
        $users->save($user);
    }

}
