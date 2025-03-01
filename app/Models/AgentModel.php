<?php

namespace App\Models;

use CodeIgniter\Model;

class AgentModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'agents';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id',
        'name',
        'username',
        'country',
        'photo',
        'company_name',
        'email',
        'password',
        'address',
        'govt_id',
        'phone',
        'status',
        'changed_by',
        'change_time',

        'role',
        'paid'
    ];
}