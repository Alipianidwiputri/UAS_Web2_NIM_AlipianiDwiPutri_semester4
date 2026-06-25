<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\LoanModel;
use CodeIgniter\RESTful\ResourceController;

class LoanController extends ResourceController
{
    protected $modelName = 'App\Models\LoanModel';
    protected $format    = 'json';

    public function index()
    {
       $data = $this->model->getLoansWithDetail();
       return $this->respond($data, 200);
    }

    public function show($id = null)
    {
        $data = $this->model->find($id);
        if (!$data) {
            return $this->failNotFound('Data peminjaman tidak ditemukan');
        }
        return $this->respond($data, 200);
    }

    public function create()
    {
        $data = $this->request->getJSON(true);
        $this->model->insert($data);
        return $this->respondCreated($data, 'Peminjaman berhasil ditambahkan');
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        $this->model->update($id, $data);
        return $this->respond($data, 200, 'Data peminjaman berhasil diupdate');
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respondDeleted(['id' => $id], 'Data peminjaman berhasil dihapus');
    }
}