<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        "username",
        "nama",
        "email",
        "whatsapp",
        "callback_url",
        "password",
        "balance",
        "role",
        "api_id",
        "api_key",
        "whitelist_ip",
        "date_update",
        "date_create",
        "date_reset_password",

    ];
    protected $useTimestamps = true;
    protected $createdField = 'date_create';
    protected $updatedField = 'date_update';
    protected $returnType = 'array';

    public function findUserByApiKey($apiId, $apiKey)
    {
        return $this->where('api_id', $apiId)->where('api_key', $apiKey)->first();
    }
}
