<?php

namespace App\Models;

use CodeIgniter\Model;

class DisbursementModel extends Model
{
    protected $table      = 'disbursement';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'user_id',
        'username',
        'transaction_id',
        'invoice_number',
        'amount',
        'fee',
        'type',
        'total',
        'diterima',
        'status',
        'payment_method',
        'nama_rekening',
        'nomor_rekening',
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
}
