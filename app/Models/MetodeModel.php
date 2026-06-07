<?php

namespace App\Models;

use CodeIgniter\Model;

class MetodeModel extends Model
{
    protected $table = 'metode';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'keterangan', 'kode', 'pajak_persen', 'payment_guide', 'kategori'];

    protected $returnType = 'array';
    protected $useSoftDeletes = false;
}
