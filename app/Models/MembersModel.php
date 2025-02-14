<?php

namespace App\Models;

use CodeIgniter\Model;

class MembersModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'members';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id',
        'firstname',
        'lastname',
        'country',
        'username',
        'address',
        'photo',
        'company_name',
        'email',
        'password',
        'phone',
        'status'
    ];
}
