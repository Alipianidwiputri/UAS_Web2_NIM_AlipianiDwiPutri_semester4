<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table            = 'books';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['judul', 'pengarang', 'penerbit', 'kategori_id', 'stok', 'status'];
    protected $useTimestamps    = false;

    public function getBooksWithCategory()
    {
        return $this->select('books.*, categories.nama_kategori')
                    ->join('categories', 'categories.id = books.kategori_id')
                    ->findAll();
    }
}