<?php

namespace App\Models;

use CodeIgniter\Model;

class TagihanModel extends Model
{
    protected $table         = 'tagihan';
    protected $primaryKey    = 'id';
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $allowedFields = [
        'transaction_id',
        'user_id',
        'invoice_number', // dari topupku
        'payment_method',
        'payment_code',
        'fee',
        'kategori',
        'bank_name',
        'amount',
        'diterima',
        'nominal_to_topupku',
        'total_bayar',
        'customer_name',
        'customer_email',
        'customer_whatsapp',
        'item_details',
        'status',
        'expiry_time',
        'payment_link',
    ];
}
