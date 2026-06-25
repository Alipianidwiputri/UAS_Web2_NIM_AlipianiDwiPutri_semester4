<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\BookModel;
use CodeIgniter\RESTful\ResourceController;

class BookController extends ResourceController
{
    protected $modelName = 'App\Models\BookModel';
    protected $format    = 'json';

    public function index()
    {
        $data = $this->model->getBooksWithCategory();
        return $this->respond($data, 200);
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound('Buku tidak ditemukan');
        }
        return $this->respond($data, 200);
    }

    public function create()
    {
        $data = $this->request->getJSON(true);
        $this->model->insert($data);
        return $this->respondCreated($data, 'Buku berhasil ditambahkan');
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        $this->model->update($id, $data);
        return $this->respond($data, 200, 'Buku berhasil diupdate');
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['id' => $id], 'Buku berhasil dihapus');
    }
}