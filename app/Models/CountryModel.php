<?php

namespace App\Models;


use CodeIgniter\Model;

class CountryModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'countries';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id', // Added the fields for the employers table
        'name', // Added the fields for the employers table
        'code', // Added the fields for the employers table
        'created_at',
    ];
}