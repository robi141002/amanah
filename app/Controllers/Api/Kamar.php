<?php

namespace App\Controllers\Api;

use App\Controllers\BaseApi;
use App\Models\Rooms as DataModel;
use Illuminate\Database\Eloquent\Model;

class Kamar extends BaseApi
{
    protected $modelName = DataModel::class;

    public function index()
    {
        return $this->request->getVar('wrap') ? $this->respond([$this->request->getVar('wrap') => $this->modelName::get()]) : $this->respond($this->modelName::get());
    }
}