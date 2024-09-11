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

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.saungwa.com/api/create-message',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'appkey' => '141e8a84-1999-45c7-affa-083e66821031',
                'authkey' => '7cKxLYc6ZGPsMWgJbU2scz0RBq31gxKxYEPNasJCn5EPz0YPMG',
                'to' => 'RECEIVER_NUMBER',
                'message' => 'Example message',
                'sandbox' => 'false',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

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
