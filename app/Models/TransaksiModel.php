<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'transaction_id',
        'trx_id',
        'user_id',
        'username',
        'reference_id',
        'amount',
        'payment_method',
        'payment_code',
        'status',
        'fee',
        'kategori',
        'bank_name',
        'diterima',
        'nominal_to_topupku',
        'total',
        'customer_name',
        'customer_email',
        'customer_phone',
        'payment_guide',
        'item_details',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $returnType      = 'array';
    protected $useSoftDeletes = false;

    public function getHariIniByUser(int $userId, int $limit = 5): array
    {
        return $this->where('user_id', $userId)
            ->where('DATE(created_at)', date('Y-m-d'))
            ->orderBy('id', 'DESC')
            ->limit($limit)
            ->findAll();
    }
}
