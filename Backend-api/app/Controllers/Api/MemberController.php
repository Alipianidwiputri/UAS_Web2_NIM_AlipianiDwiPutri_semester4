<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\MemberModel;
use CodeIgniter\RESTful\ResourceController;

class MemberController extends ResourceController
{
    protected $modelName = 'App\Models\MemberModel';
    protected $format    = 'json';

    public function index()
    {
        $data = $this->model->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound('Anggota tidak ditemukan');
        }
        return $this->respond($data, 200);
    }

    public function create()
    {
        $data = $this->request->getJSON(true);
        $this->model->insert($data);
        return $this->respondCreated($data, 'Anggota berhasil ditambahkan');
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        $this->model->update($id, $data);
        return $this->respond($data, 200, 'Anggota berhasil diupdate');
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['id' => $id], 'Anggota berhasil dihapus');
    }
}