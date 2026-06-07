<?php

namespace App\Models;

use CodeIgniter\Model;

class ProviderModel extends Model
{
    protected $table = 'provider';
    protected $primaryKey = 'id';
    protected $allowedFields = ['provider', 'kode', 'api_id', 'api_key', 'private_key'];
}
