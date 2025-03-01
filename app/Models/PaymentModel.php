<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'payments';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = ['agent_id', 'payment_reference', 'amount', 'payment_date', 'status', 
    'name','email', 'phone', 'gateway' ];
}