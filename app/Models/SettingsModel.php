<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'settings';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id',
        'country',
        'address',
        'photo',
        'company_name',
        'email',
        'password',
        'facebook',
        'instagram',
        'twitter',
        'phone',
    ];
}
