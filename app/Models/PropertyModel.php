<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyModel extends Model
{
    protected $table = 'properties';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'category_id',
        'location_id',
        'title',
        'description',
        'price',
        'bedrooms',
        'bathrooms',
        'area',
        'status',
        'is_featured'
    ];

    protected $validationRules = [
        // 'user_id'     => 'required|integer',
        'category_id' => 'required|integer',
        'location_id' => 'required|integer',
        'title'       => 'required|min_length[3]|max_length[255]',
        // 'username' => 'required',
        'description' => 'required',
        'price'       => 'required|decimal',
        'bedrooms'    => 'integer',
        'bathrooms'   => 'integer',
        'area'        => 'integer',
        'status'      => 'in_list[available,sold,rented]'
    ];
}