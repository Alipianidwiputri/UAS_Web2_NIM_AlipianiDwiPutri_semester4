<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanModel extends Model
{
    protected $table            = 'loans';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $allowedFields    = ['member_id', 'book_id', 'tgl_pinjam', 'tgl_kembali', 'status'];
    protected $useTimestamps    = false;

    public function getLoansWithDetail()
    {
        return $this->select('loans.*, books.judul, members.nama as member_name')
                    ->join('books', 'books.id = loans.book_id')
                    ->join('members', 'members.id = loans.member_id')
                    ->findAll();
    }
}