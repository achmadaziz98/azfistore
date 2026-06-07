<?php

namespace App\Models;

use CodeIgniter\Model;

class WebsiteModel extends Model
{
    protected $table = 'settings_website';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'web_title',
        'web_icon',
        'web_logo',
        'web_author',
        'web_keywords',
        'web_description',
        'alamat',
        'whatsapp_admin',
        'whatsapp_cs',
        'email'
    ];

    protected $useAutoIncrement = true;

    public function getSettings()
    {
        return $this->first();
    }
}
