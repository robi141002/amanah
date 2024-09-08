<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Illuminate\Database\Eloquent\Model;
use Psr\Log\LoggerInterface;

class BaseApi extends BaseController
{
    use ResponseTrait;

    protected $modelName;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
    }

    public function index()
    {
        return $this->request->getVar('wrap') ? $this->respond([$this->request->getVar('wrap') => $this->modelName::all()]) : $this->respond($this->modelName::all());
    }

    /**
     * Return the properties of a resource object
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function show($id = null)
    {
        return $this->fail(lang('RESTful.notImplemented', ['show']), 501);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return ResponseInterface|string|void
     */
    public function new()
    {
        return $this->fail(lang('RESTful.notImplemented', ['new']), 501);
    }

    public function beforeCreate(&$data)
    {
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return ResponseInterface|string|void
     */
    public function create()
    {
        $data = new $this->modelName;
        $data->fill($this->request->getVar());

        $this->beforeCreate($data);
        $data->save();
        $this->afterCreate($data);
        return $this->respond([
            'messages' => [
                'success' => 'data baru berhasil di tambahkan',
            ],
            'data' => $data,
        ]);
    }

    public function afterCreate(&$data)
    {
    }

    /**
     * Return the editable properties of a resource object
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function edit($id = null)
    {
        return $this->fail(lang('RESTful.notImplemented', ['edit']), 501);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function update($id = null)
    {
        if ($data = $this->modelName::find($id)) {
            $data->fill($this->request->getVar());

            $this->beforeUpdate($data);
            $data->save();
            $this->afterUpdate($data);
            return $this->respond([
                'messages' => [
                    'success' => 'data berhasil di ubah',
                ],
            ]);
        }
        return $this->failNotFound('Data tidak ditemukan');
    }

    public function beforeUpdate(&$data)
    {
    }
    public function afterUpdate(&$data)
    {
    }

    /**
     * Delete the designated resource object from the model
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface|string|void
     */
    public function delete($id = null)
    {
        if ($data = $this->modelName::find($id)) {
            $data->delete();

            return $this->respondDeleted($data);
        }
        return $this->failNotFound('Data tidak ditemukan');
    }

    /**
     * Set/change the expected response representation for returned objects
     *
     * @param string $format json/xml
     *
     * @return void
     */
    public function setFormat(string $format = 'json')
    {
        if (in_array($format, ['json', 'xml'], true)) {
            $this->format = $format;
        }
    }
}